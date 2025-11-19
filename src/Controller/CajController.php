<?php

namespace App\Controller;

use App\Entity\Archivo;
use App\Entity\Caj;
use App\Entity\Caso;
use App\Repository\CajRepository;
use App\Repository\CasoRepository;
use App\Form\CajType;
use App\Service\ArchivoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CasoTabsDataProvider;

#[Route('/caj')]
class CajController extends AbstractController
{
    private ArchivoService $archivoService;
    public function __construct(ArchivoService $archivoService)
{
    $this->archivoService = $archivoService;
}

    #[Route('/new', name: 'caj_new', methods: ['GET', 'POST'])]
    public function new(Request $request, 
    EntityManagerInterface $em, SessionInterface $session,CasoRepository $casoRepo,
    CasoTabsDataProvider $tabsProvider,
    FormFactoryInterface $formFactory,CajRepository $cajRepository,
    ArchivoService $archivoService
    ): Response
    {

        $idCaso = $session->get('caso_id');
        $caso = null;
        $sinCaso = false;
        $parametros = [];

        if (!$idCaso) {
            $this->addFlash('error', 'Debe seleccionar un caso primero.');
            $sinCaso = true;
        } else {
            $caso = $em->getRepository(Caso::class)->find($idCaso);
            $parametros['caso'] = $caso;
            $tabsData = $tabsProvider->getData($casoRepo->find($idCaso));

            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }
    
        if (!empty($tabsData['caj'])) {
            // Llamar al método edit y devolver su Response
            return $this->edit($request, $idCaso, $casoRepo, $cajRepository,$tabsProvider,$em,$archivoService);
        }
    
        $caj = new Caj();    
        $form = $this->createForm(CajType::class, $caj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $caj->setCaso($caso);
            $caj->setUsuarioCarga('prueba');
            $caj->setFechaCarga(new \DateTime());

             // Manejo de archivos usando el servicio
            $archivosSubidos = $form->get('archivos')->getData();

            foreach ($archivosSubidos as $uploadedFile) {
                $archivoEntity = $this->archivoService->guardarArchivoEntidad($uploadedFile, $caj);
                $em->persist($archivoEntity);
            }

            $em->persist($caj);
            $em->flush();

           // $this->addFlash('aviso', 'Datos guardados correctamente.');

           $this->addFlash('success_js', 'Seccion CAJ guardada correctamente');   
           return $this->redirectToRoute('app_caso_index');
        }
       $parametros['form'] = $form->createView();
       $parametros['sinCaso'] = $sinCaso;
        return $this->render('caj/new.html.twig', $parametros);
    }

    #[Route('/{idCaso}/ver_caj', name: 'caj_ver')]
    public function ver(CasoRepository $casoRepository,
    CajRepository $cajRepository,int $idCaso, 
    CasoTabsDataProvider $tabsProvider,FormFactoryInterface $formFactory,
    EntityManagerInterface $entityManager): Response
    {
          // Buscar el caso           
            $caso = $casoRepository->find($idCaso);
            if (!$caso) {
                throw $this->createNotFoundException('Caso no encontrado');
            }

            //busco si hay datos asociados para mostrar la pestaña desde el servicio
            $tabsData = $tabsProvider->getData($caso);

            $caj = $cajRepository->findOneBy(['caso' => $caso]);
            if (!$caj) {
                throw $this->createNotFoundException('No hay datos de CAJ para este caso');
            }

             // Creamos el form pero sin intención de editar
                $form = $formFactory->create(CajType::class, $caj, [
                    'disabled' => true, // importante: desactiva todos los campos
                ]);
                foreach ($tabsData as $clave => $valor) {
                    $parametros[$clave] = $valor;
                }
                $parametros['form'] = $form->createView();
                $parametros['caso'] = $caso;
                $parametros['pestaña_activa'] = 'caj';
                $archivos = $entityManager->getRepository(Archivo::class)
                ->findBy(['mjsServicioPenitenciario' => $caj]);
                $parametros['archivos'] = $archivos;
                return $this->render('caj/show.html.twig', $parametros);
            
            }

            #[Route('/{idCaso}/edit', name: 'app_caj_edit', methods: ['GET', 'POST'])]
            public function edit(Request $request, int $idCaso,
            CasoRepository $casoRepository, CajRepository $cajRepository,
            CasoTabsDataProvider $tabsProvider,
            EntityManagerInterface $entityManager,
            ArchivoService $archivoService): Response
            {

                // Buscar el caso           
                $caso = $casoRepository->find($idCaso);
                if (!$caso) {
                    throw $this->createNotFoundException('Caso no encontrado');
                }
                
                //busco si hay datos asociados para mostrar la pestaña desde el servicio
                $tabsData = $tabsProvider->getData($caso);
                $caj = $entityManager->getRepository(Caj::class)->findOneBy(['caso' => $caso]);
                if (!$caj) {
                    throw $this->createNotFoundException('No hay datos de CAJ para este caso');
                }
                $caj->setCaso($caso);


                $form = $this->createForm(CajType::class, $caj);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $archivosSubidos = $form->get('archivos')->getData();
                    foreach ($archivosSubidos as $uploadedFile) {
                        $archivoEntity = $archivoService->guardarArchivoEntidad($uploadedFile, $caj);
                        $entityManager->persist($archivoEntity);
                    }
                    $entityManager->flush();
                    //return $this->redirectToRoute('app_mpa_edit', [], Response::HTTP_SEE_OTHER);
                    $this->addFlash('success_js', 'Datos guardados correctamente');   
                return $this->redirectToRoute('app_caso_index');
                }

                foreach ($tabsData as $clave => $valor) {
                    $parametros[$clave] = $valor;
                }

                 // Archivos asociados al MPA (igual que en show)
                $archivos = $entityManager->getRepository(Archivo::class)->findBy(['caj' => $caj]);
                $parametros['form'] = $form->createView();
                $parametros['caso'] = $caso;
                $parametros['pestaña_activa'] = 'caj';
                $parametros['archivos'] = $archivos;

                return $this->render('caj/edit.html.twig', $parametros);
                
            }
    

}
