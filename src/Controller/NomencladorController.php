<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Nomenclador;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/nomenclador')]
class NomencladorController extends AbstractController
{
    #[Route('/', name: 'nomenclador_index')]
    public function index(NomencladorRepository $repo): Response
    {
        $nomencladores = $repo->findBy([], ['nomenclador' => 'ASC']);

        return $this->render('nomenclador/index.html.twig', [
            'nomencladores' => $nomencladores
        ]);
    }

    #[Route('/new', name: 'app_nomenclador_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $nomenclador = new Nomenclador();
        $form = $this->createForm(NomencladorType::class, $nomenclador);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($nomenclador);
            $em->flush();

            return $this->redirectToRoute('app_nomenclador_index');
        }

        return $this->render('nomenclador/form.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/edit/{id}', name: 'app_nomenclador_edit')]
    public function edit(Nomenclador $nomenclador, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(NomencladorType::class, $nomenclador);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_nomenclador_index');
        }

        return $this->render('nomenclador/form.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/delete/{id}', name: 'app_nomenclador_delete')]
    public function delete(Nomenclador $nomenclador, EntityManagerInterface $em): Response
    {
        $em->remove($nomenclador);
        $em->flush();

        return $this->redirectToRoute('app_nomenclador_index');
    }
}