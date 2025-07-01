<?php

namespace App\Controller;

use App\Entity\Smgyd;
use App\Entity\Caso;
use App\Entity\SmgydFamiliar;
use App\Entity\SmgydOrganizacion;
use App\Entity\SmgydProcesoJudicial;
use App\Form\SmgydType;
use App\Repository\SmgydRepository;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\Service\CasoTabsDataProvider;

#[Route('/smgyd')]
class SmgydController extends AbstractController
{
    #[Route('/', name: 'app_smgyd_index', methods: ['GET'])]
    public function index(SmgydRepository $smgydRepository): Response
    {
        return $this->render('smgyd/index.html.twig', [
            'smgyds' => $smgydRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_smgyd_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em,SessionInterface $session): Response
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

        $smgyd = new Smgyd();
        $smgyd->addFamiliar(new SmgydFamiliar());
        $smgyd->addProcesoJudicial(new SmgydProcesoJudicial());
        $smgyd->addOrganizacion(new SmgydOrganizacion());
        
        $form = $this->createForm(SmgydType::class, $smgyd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$sinCaso)
            $smgyd->setCaso($caso); 

            $em->persist($smgyd);
            $em->flush();

            $this->addFlash('success_js', 'Seccion SMGyD guardada correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }

        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        $parametros['modo'] = 'edit';
        return $this->render('smgyd/new.html.twig', $parametros);
    }


    #[Route('/{idCaso}/show', name: 'app_smgyd_show', methods: ['GET'])]
    public function show(CasoRepository $casoRepository,
    SmgydRepository $smgydRepository,int $idCaso, 
    CasoTabsDataProvider $tabsProvider,FormFactoryInterface $formFactory): Response
    {
        $caso = null;
        $sinCaso = false;
        $parametros = [];

        // Buscar el caso           
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
        }

         //busco si hay datos asociados para mostrar la pestaña desde el servicio
         $tabsData = $tabsProvider->getData($caso);

         $smgyd = $smgydRepository->findOneBy(['caso' => $caso]);
         if (!$smgydRepository) {
             throw $this->createNotFoundException('No hay datos de SDH para este caso');
         }
       
         
          // Creamos el form pero sin intención de editar
             $form = $formFactory->create(SmgydType::class, $smgyd, [
                 'disabled' => true, // importante: desactiva todos los campos
             ]);
        return $this->render('smgyd/show.html.twig', [
            'form' =>$form,
            'caso' => $caso,
            'sinCaso'=>$sinCaso,
            'caj' => $tabsData['caj'],
            'sdh' => $tabsData['sdh'],
            'mpa' =>  $tabsData['mpa'],
            'gl' => $tabsData['gl'],
            'smgyd' => $smgyd,
            'pestaña_activa'=>'smgyd',
        ]);
    }


    #[Route('/{idCaso}/edit', name: 'app_smgyd_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, 
    int $idCaso,
    CasoRepository $casoRepository,
    CasoTabsDataProvider $tabsProvider,
    EntityManagerInterface $em): Response
    {
        $sinCaso = false;
        
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
        }
        $tabsData = $tabsProvider->getData($caso);
        $smgyd = $em->getRepository(Smgyd::class)->findOneBy(['caso' => $caso]);

        if (!$smgyd) {
            return $this->redirectToRoute('app_smgyd_new', ['idCaso' => $idCaso]);

        }

        $form = $this->createForm(SmgydType::class, $smgyd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success_js', 'Seccion SMGyD guardada correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }

        $parametros['form'] = $form->createView();
            $parametros['mpa'] = $tabsData['mpa'];
            $parametros['caso'] = $caso;
            $parametros['caj'] = $tabsData['caj'];
            $parametros['sdh'] = $tabsData['sdh'];
            $parametros['gl'] = $tabsData['gl'];
            $parametros['smgyd'] = $smgyd;
            $parametros['sinCaso'] = $sinCaso;
            $parametros['pestaña_activa'] = 'smgyd';

        return $this->render('smgyd/edit.html.twig', $parametros);
    }

    #[Route('/{id}', name: 'app_smgyd_delete', methods: ['POST'])]
    public function delete(Request $request, Smgyd $smgyd, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$smgyd->getId(), $request->request->get('_token'))) {
            $em->remove($smgyd);
            $em->flush();
        }

        return $this->redirectToRoute('app_smgyd_index');
    }
}
