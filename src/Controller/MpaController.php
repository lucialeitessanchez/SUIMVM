<?php

namespace App\Controller;

use App\Entity\Caso;
use App\Entity\Mpa;
use App\Form\MpaForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/mpa')]
final class MpaController extends AbstractController
{
    #[Route(name: 'app_mpa_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $mpas = $entityManager
            ->getRepository(Mpa::class)
            ->findAll();

        return $this->render('mpa/index.html.twig', [
            'mpas' => $mpas,
        ]);
    }

    #[Route('/new', name: 'app_mpa_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
{
    $idCaso = $session->get('caso_id');

    if (!$idCaso) {
        $this->addFlash('error', 'Debe seleccionar un caso primero.');
    }

    $caso = $entityManager->getRepository(Caso::class)->find($idCaso);

    if (!$caso) {
        throw $this->createNotFoundException("Caso no encontrado.");
    }

    $mpa = new Mpa();
    $mpa->setCaso($caso);

    $form = $this->createForm(MpaForm::class, $mpa);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($mpa);
        $entityManager->flush();

        return $this->redirectToRoute('app_mpa_index');
    }

    return $this->render('mpa/new.html.twig', [
        'mpa' => $mpa,
        'form' => $form,
        'caso' => $caso,
    ]);
}


    #[Route('/{id_mpa}', name: 'app_mpa_show', methods: ['GET'])]
    public function show(Mpa $mpa): Response
    {
        return $this->render('mpa/show.html.twig', [
            'mpa' => $mpa,
        ]);
    }

    #[Route('/{id_mpa}/edit', name: 'app_mpa_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Mpa $mpa, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MpaForm::class, $mpa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_mpa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mpa/edit.html.twig', [
            'mpa' => $mpa,
            'form' => $form,
        ]);
    }

    #[Route('/{id_mpa}', name: 'app_mpa_delete', methods: ['POST'])]
    public function delete(Request $request, Mpa $mpa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mpa->getIdMpa(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($mpa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_mpa_index', [], Response::HTTP_SEE_OTHER);
    }
}
