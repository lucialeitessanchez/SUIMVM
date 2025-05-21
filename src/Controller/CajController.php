<?php

namespace App\Controller;

use App\Entity\Caj;
use App\Form\CajType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caj')]
class CajController extends AbstractController
{
    #[Route('/new', name: 'caj_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $caj = new Caj();
        $form = $this->createForm(CajType::class, $caj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($caj);
            $entityManager->flush();

            $this->addFlash('success', 'CAJ creado correctamente.');

            return $this->redirectToRoute('caj_new'); // puedes redirigir a otra ruta si lo deseas
        }

        return $this->render('caj/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
