<?php
namespace App\Controller;

use App\Entity\Sdh;
use App\Entity\Caso;
use App\Entity\Nomenclador;
use App\Entity\SdhTipoTrata;
use App\Form\SdhType;
use App\Repository\CasoRepository;
use App\Repository\SdhRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\Service\CasoTabsDataProvider;
#[Route('/sdh')]
class SdhController extends AbstractController
{
    #[Route('/new_sdh', name: 'sdh_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, CasoRepository $casoRepo, SessionInterface $session): Response
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
            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }

        $sdh = new Sdh();
       
        $sdh->setFechaCarga(new \DateTime());
       // $sdh->setUsuarioCarga($this->getUser()?->getUserIdentifier());

        $form = $this->createForm(SdhType::class, $sdh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          
            //seteo usuario carga
            $sdh->setUsuarioCarga("prueba");
            $sdh->setFechaCarga(new \DateTime());
            if (!$sinCaso)
                    $sdh->setCasoIdCaso($caso); 
                    
            $em->persist($sdh);
            $em->flush();       
           
            
            $this->addFlash('success_js', 'Seccion SDH guardada correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }
   
        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        return $this->render('sdh/new.html.twig', $parametros);
    }

    #[Route('/{idCaso}/show', name: 'app_sdh_show', methods: ['GET'])]
    public function show(CasoRepository $casoRepository,
    SdhRepository $sdhRepository,int $idCaso, 
    CasoTabsDataProvider $tabsProvider,FormFactoryInterface $formFactory): Response
    {
         // Buscar el caso           
         $caso = $casoRepository->find($idCaso);
         if (!$caso) {
             throw $this->createNotFoundException('Caso no encontrado');
         }

          //busco si hay datos asociados para mostrar la pestaña desde el servicio
          $tabsData = $tabsProvider->getData($caso);

          $sdh = $sdhRepository->findOneBy(['caso' => $caso]);
          if (!$sdhRepository) {
              throw $this->createNotFoundException('No hay datos de SDH para este caso');
          }
        
          
           // Creamos el form pero sin intención de editar
              $form = $formFactory->create(SdhType::class, $sdh, [
                  'disabled' => true, // importante: desactiva todos los campos
              ]);
              
          return $this->render('sdh/show.html.twig', [
            'form' =>$form,
            'caso' => $caso,
            'caj' => $tabsData['caj'],
            'sdh' => $tabsData['sdh'],
            'mpa' => $tabsData['mpa'],
            'gl' => $tabsData['gl'],   
            'smgyd' => $tabsData['smgyd'],      
            'pestaña_activa'=>'sdh',
        ]);
            
    }

    #[Route('/{idCaso}/edit', name: 'app_sdh_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $idCaso,
    CasoRepository $casoRepository, CasoTabsDataProvider $tabsProvider,
    EntityManagerInterface $entityManager): Response
    {

         // Buscar el caso           
         $caso = $casoRepository->find($idCaso);
         if (!$caso) {
             throw $this->createNotFoundException('Caso no encontrado');
         }

          //busco si hay datos asociados para mostrar la pestaña desde el servicio
          $tabsData = $tabsProvider->getData($caso);

          $sdh = $entityManager->getRepository(Sdh::class)->findOneBy(['caso' => $caso]);
          if (!$sdh) {
              throw $this->createNotFoundException('No hay datos de SDH para este caso');
          }

        $form = $this->createForm(SdhType::class, $sdh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            //return $this->redirectToRoute('app_mpa_edit', [], Response::HTTP_SEE_OTHER);
            $this->addFlash('success_js', 'Datos guardados correctamente');   
           return $this->redirectToRoute('app_caso_index');
        }
        $parametros['form'] = $form->createView();
        $parametros['mpa'] = $tabsData['mpa'];
        $parametros['caso'] = $caso;
        $parametros['caj'] = $tabsData['caj'];
        $parametros['sdh'] = $sdh;
        $parametros['gl'] = $tabsData['gl'];     
        $parametros['smgyd'] = $tabsData['smgyd'];           
        $parametros['pestaña_activa'] = 'sdh';

        return $this->render('sdh/edit.html.twig', $parametros);
        
    }
    
}
