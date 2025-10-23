<?php

namespace App\Controller;

use App\Entity\Mjs;
use App\Entity\Caso;
use App\Entity\ArchivableInterface;
use App\Entity\MjsServicioPenitenciario;
use App\Form\MjsServicioPenitenciarioType;
use App\Repository\CasoRepository;
use App\Service\ArchivoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\Service\CasoTabsDataProvider;

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
    CasoRepository $casoRepository, 
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
        if (!empty($tabsData['mjs_sp'])) {
            // Llamar al método edit y devolver su Response
            return $this->edit($request, $casoRepository,  $tabsProvider, $em,$idCaso,);
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
/*
             // Manejo de archivos usando el servicio
             $archivosSubidos = $form->get('archivos')->getData();

             foreach ($archivosSubidos as $uploadedFile) {
                 $archivoEntity = $this->archivoService->guardarArchivoEntidad($uploadedFile, $mjs);
                 $em->persist($archivoEntity);
             }*/
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
    EntityManagerInterface $em,  int $idCaso,): Response
    {
        $idCaso = $session->get('caso_id');

        $sinCaso=false;
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
            $sinCaso=true;
        }
        $tabsData = $tabsProvider->getData($caso);
        $mjs_sp = $em->getRepository(MjsServicioPenitenciario::class)->findOneBy(['caso' => $caso]);

        if (!$mjs_sp) {
            return $this->redirectToRoute('app_mjs_servicio_penitenciario', ['idCaso' => $idCaso]);
        }

        $form = $this->createForm(MjsServicioPenitenciarioType::class, $mjs_sp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Mjs actualizada correctamente!');
            return $this->redirectToRoute('app_caso_index');
        }

             $parametros['form'] = $form->createView();
            $parametros['caso'] = $caso;
            $parametros['sinCaso'] = $sinCaso;
            foreach ($tabsData as $clave => $valor) {
                $parametros[$clave] = $valor;
            }
       
            $parametros['pestaña_activa'] = 'mjs_sp';

        return $this->render('mjs/edit.html.twig', $parametros);
    }

    #[Route('/{id}', name: 'mjs_sp_show', methods: ['GET'])]
    public function show(MjsServicioPenitenciario $mjs): Response
    {
        return $this->render('mjs/show_sp.html.twig', [
            'mjs' => $mjs,
        ]);
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
