<?php

namespace App\Controller;

use App\Entity\Pgcsj;
use App\Form\PgcsjType;
use App\Repository\PgcsjRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pgcsj')]
class PgcsjController extends AbstractController
{
    #[Route('/', name: 'app_pgcsj_index', methods: ['GET'])]
    public function index(PgcsjRepository $pgcsjRepository): Response
    {
        return $this->render('pgcsj/index.html.twig', [
            'pgcsjs' => $pgcsjRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pgcsj_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $pgcsj = new Pgcsj();
        $form = $this->createForm(PgcsjType::class, $pgcsj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($pgcsj);
            $em->flush();

            return $this->redirectToRoute('app_pgcsj_index');
        }

        return $this->render('pgcsj/new.html.twig', [
            'pgcsj' => $pgcsj,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_pgcsj_show', methods: ['GET'])]
    public function show(Pgcsj $pgcsj): Response
    {
        return $this->render('pgcsj/show.html.twig', [
            'pgcsj' => $pgcsj,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pgcsj_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pgcsj $pgcsj, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(PgcsjType::class, $pgcsj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_pgcsj_index');
        }

        return $this->render('pgcsj/edit.html.twig', [
            'pgcsj' => $pgcsj,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_pgcsj_delete', methods: ['POST'])]
    public function delete(Request $request, Pgcsj $pgcsj, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pgcsj->getId(), $request->request->get('_token'))) {
            $em->remove($pgcsj);
            $em->flush();
        }

        return $this->redirectToRoute('app_pgcsj_index');
    }
}
