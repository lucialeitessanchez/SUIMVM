<?php

namespace App\Controller;

use App\Entity\Smgyd;
use App\Entity\Caso;
use App\Entity\SmgydFamiliar;
use App\Entity\SmgydOrganizacion;
use App\Entity\SmgydProcesoJudicial;
use App\Form\SmgydType;
use App\Repository\SmgydRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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

    #[Route('/{id}', name: 'app_smgyd_show', methods: ['GET'])]
    public function show(Smgyd $smgyd): Response
    {
        return $this->render('smgyd/show.html.twig', [
            'smgyd' => $smgyd,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_smgyd_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Smgyd $smgyd, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SmgydType::class, $smgyd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_smgyd_index');
        }

        return $this->render('smgyd/edit.html.twig', [
            'form' => $form->createView(),
            'smgyd' => $smgyd,
        ]);
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
