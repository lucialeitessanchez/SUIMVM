<?php

namespace App\Controller;

use App\Entity\Caso;
use App\Form\CasoType;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caso')]
class CasoController extends AbstractController
{
    #[Route('/', name: 'caso_index', methods: ['GET'])]
    public function index(CasoRepository $casoRepository): Response
    {
        return $this->render('casoAlta.html.twig', [
            'casos' => $casoRepository->findAll(),
        ]);
    }

    #[Route('/nuevo', name: 'caso_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
       // dd('Estoy en el método new');
        $caso = new Caso();
        $form = $this->createForm(CasoType::class, $caso);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($caso);
            $em->flush();
    
            return $this->redirectToRoute('caso_new');
        }
    
        return $this->render('casoAlta.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/editar', name: 'caso_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Caso $caso, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CasoType::class, $caso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('caso_index');
        }

        return $this->render('caso/edit.html.twig', [
            'form' => $form->createView(),
            'caso' => $caso,
        ]);
    }
}
