<?php

namespace App\Controller;

use App\Entity\Mjs;
use App\Entity\Caso;
use App\Entity\ArchivableInterface;
use App\Entity\Archivo;
use App\Entity\MjsServicioPenitenciario;
use App\Form\MjsServicioPenitenciarioType;
use App\Repository\CasoRepository;
use App\Repository\MjsServicioPenitenciarioRepository;
use App\Service\ArchivoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\Service\CasoTabsDataProvider;
use Doctrine\ORM\EntityManager;

#[Route('/mjs/servicio-penitenciario')]
class MjsServicioPenitenciarioController extends AbstractController
{
    private ArchivoService $archivoService;

    public function __construct(ArchivoService $archivoService)
    {
        $this->archivoService = $archivoService;
    }

    #[Route('/', name: 'mjs_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        $mjsList = $em->getRepository(MjsServicioPenitenciario::class)->findAll();

        return $this->render('smgyd/mjs/index.html.twig', [
            'mjsList' => $mjsList,
        ]);
    }

    #[Route('/new', name: 'app_mjs_servicio_penitenciario', methods: ['GET', 'POST'])]
    public function new(Request $request,  CasoTabsDataProvider $tabsProvider, 
    CasoRepository $casoRepository, MjsServicioPenitenciarioRepository $mjsRepository,
    EntityManagerInterface $em,SessionInterface $session,CasoRepository $casoRepo,
    ArchivoService $archivoService): Response
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
      
        $mjs = new MjsServicioPenitenciario();

        $mjs->setFechaCarga(new \DateTimeImmutable());
        $mjs->setUsuarioCarga($this->getUser()?->getUserIdentifier() ?? 'sistema');

        $form = $this->createForm(MjsServicioPenitenciarioType::class, $mjs);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
          
            if (!$sinCaso)
            $mjs->setCaso($caso); 

            $em->persist($mjs);

            // Manejo de archivos usando el servicio
            $archivosSubidos = $form->get('archivos')->getData();

            foreach ($archivosSubidos as $uploadedFile) {
                $archivoEntity = $this->archivoService->guardarArchivoEntidad($uploadedFile, $mjs);
                $em->persist($archivoEntity);
            }

            $em->flush();
       
            $this->addFlash('success_js', 'Seccion MJyS-Servicio Penitenciario guardada correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }
        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        $parametros['modo'] = 'edit';
        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
   
        $parametros['pestaña_activa'] = 'mjs_sp';
            return $this->render('mjs/new.html.twig',$parametros);
    }

    #[Route('/{idCaso}/edit', name: 'app_mjs_servicio_penitenciario_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request,
    CasoRepository $casoRepository,
    CasoTabsDataProvider $tabsProvider,SessionInterface $session,
    EntityManagerInterface $em,  int $idCaso,
    ArchivoService $archivoService): Response
    {

         // Buscar el caso
            $caso = $casoRepository->find($idCaso);
            if (!$caso) {
                throw $this->createNotFoundException('Caso no encontrado');
            }

            // Datos de pestañas
            $tabsData = $tabsProvider->getData($caso);


        $mjs_sp = $em->getRepository(MjsServicioPenitenciario::class)->findOneBy(['caso' => $caso]);

        if (!$mjs_sp) {
            return $this->redirectToRoute('app_mjs_servicio_penitenciario', ['idCaso' => $idCaso]);
        }

        $form = $this->createForm(MjsServicioPenitenciarioType::class, $mjs_sp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
               // --- Manejo de archivos nuevos ---
        $archivosSubidos = $form->get('archivos')->getData();
        foreach ($archivosSubidos as $uploadedFile) {
            $archivoEntity = $archivoService->guardarArchivoEntidad($uploadedFile, $mjs_sp);
            $em->persist($archivoEntity);
        }
            $em->flush();
            $this->addFlash('success', 'Mjs actualizada correctamente!');
            return $this->redirectToRoute('app_caso_index');
        }

             // Archivos asociados al MPA (igual que en show)
            $archivos = $em->getRepository(Archivo::class)->findBy(['mjsServicioPenitenciario' => $mjs_sp]);

            $parametros['form'] = $form->createView();
            $parametros['caso'] = $caso;
            $parametros['archivos'] = $archivos;
            foreach ($tabsData as $clave => $valor) {
                $parametros[$clave] = $valor;
            }
    
            $parametros['pestaña_activa'] = 'mjs_sp';

        return $this->render('mjs/edit.html.twig', $parametros);
    }

    #[Route('/{idCaso}/show', name: 'mjs_sp_show')]
    public function show(
        MjsServicioPenitenciarioRepository $mjsRepository,
        CasoRepository $casoRepository,
        int $idCaso,
        FormFactoryInterface $formFactory,
        CasoTabsDataProvider $tabsProvider,
        EntityManagerInterface $entityManager
    ): Response
    {
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
        }
    
        $tabsData = $tabsProvider->getData($caso);
    
        $mjs = $mjsRepository->findOneBy(['caso' => $caso]);
        if (!$mjs) {
            throw $this->createNotFoundException('No hay datos de MJS-SP para este caso');
        }
    
        $form = $formFactory->create(MjsServicioPenitenciarioType::class, $mjs, [
            'disabled' => true,
        ]);
    
        $archivos = $entityManager->getRepository(Archivo::class)
            ->findBy(['mjsServicioPenitenciario' => $mjs]);
    
        // ✅ Variables para Twig
        $parametros = [
            'form' => $form->createView(),
            'caso' => $caso,
            'archivos' => $archivos,
            'pestaña_activa' => 'mjs_sp',
            'mjs' => $mjs, // 👈 necesario para tu include
        ];
    
        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
    
        return $this->render('mjs/show.html.twig', $parametros);
    }
    

    

    #[Route('/{id}/delete', name: 'mjs_delete', methods: ['POST'])]
    public function delete(Request $request, MjsServicioPenitenciario $mjs, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mjs->getId(), $request->request->get('_token'))) {
            $em->remove($mjs);
            $em->flush();
            $this->addFlash('success', 'Mjs eliminada correctamente!');
        }

        return $this->redirectToRoute('mjs_index');
    }
}
