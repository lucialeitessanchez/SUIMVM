<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NomencladorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Nomenclador;
use App\Form\NomencladorType;

#[Route('/nomenclador')]
class NomencladorController extends AbstractController
{

    #[Route('/', name: 'nomenclador_index', methods: ['GET'])]
    public function index(NomencladorRepository $repo): Response
    {
        $nomencladores = $repo->findBy([], [
            'nomenclador' => 'ASC',
            'valor_nomenclador' => 'ASC'
        ]);


        $agrupados = [];

        foreach ($nomencladores as $n) {
            $agrupados[$n->getNomenclador()][] = $n;
        }
    
        return $this->render('nomenclador/index.html.twig', [
            'agrupados' => $agrupados
        ]);
    }


    #[Route('/new', name: 'app_nomenclador_new')]
public function new(Request $request, EntityManagerInterface $em): Response
{
    $nomenclador = new Nomenclador();

    // 👇 esto es la magia
    if ($request->query->get('tipo')) {
        $nomenclador->setNomenclador($request->query->get('tipo'));
    }

    $form = $this->createForm(NomencladorType::class, $nomenclador);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($nomenclador);
        $em->flush();

        return $this->redirectToRoute('nomenclador_index');
    }

    return $this->render('nomenclador/new.html.twig', [
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

            return $this->redirectToRoute('nomenclador_index');
        }

        return $this->render('nomenclador/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/delete/{id}', name: 'app_nomenclador_delete')]
    public function delete(Nomenclador $nomenclador, EntityManagerInterface $em): Response
    {
        $em->remove($nomenclador);
        $em->flush();
        // 👇 mensaje flash
        $this->addFlash('success', 'Eliminado correctamente');

        return $this->redirectToRoute('nomenclador_index');
    }
}