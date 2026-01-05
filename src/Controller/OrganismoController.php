<?php

namespace App\Controller;

use App\Entity\Organismo;
use App\Entity\OrganismoOrigen;
use App\Form\OrganismoType;
use App\Repository\OrganismoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/organismo')]
class OrganismoController extends AbstractController
{
    #[Route('/', name: 'organismo_index', methods: ['GET'])]
    public function index(OrganismoRepository $organismoRepository): Response
    {
        return $this->render('organismo/index.html.twig', [
            'organismos' => $organismoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'organismo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $organismo = new Organismo();
        $form = $this->createForm(OrganismoType::class, $organismo);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($organismo);
            $esIniciador = $form->get('esIniciador')->getData();
            if ($esIniciador) {
                // Suponiendo que tenés una entidad OrganismoPublico
                $organismoOrigen = new OrganismoOrigen();
                $organismoOrigen->setOrganismo($organismo);
               // $organismoOrigen->setFechaAlta(new \DateTime());
    
                $em->persist($organismoOrigen);
            }

            $em->flush();

            $this->addFlash('success', 'Organismo creado correctamente');

            //return $this->redirectToRoute('organismo_index');
            $this->addFlash('success_js', 'El organismo se guardó correctamente');   
            return $this->redirectToRoute('organismo_index');
        }

        return $this->render('organismo/new.html.twig', [
            'form' => $form->createView(),
            'modo'=>'new',
        ]);
    }

    #[Route('/{idOrganismo}', name: 'organismo_show', methods: ['GET'])]
    public function show(Organismo $organismo,EntityManagerInterface $em): Response
    {
        $esIniciador = $em->getRepository(OrganismoOrigen::class)
        ->findOneBy(['organismo' => $organismo]) !== null;

        return $this->render('organismo/show.html.twig', [
            'organismo' => $organismo,
            'esIniciador' => $esIniciador,
        ]);
    }

    #[Route('/{idOrganismo}/edit', name: 'organismo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Organismo $organismo, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(OrganismoType::class, $organismo);

          // 🔑 Setear el valor del campo NO mapeado
        $esIniciador = $em->getRepository(OrganismoOrigen::class)
        ->findOneBy(['organismo' => $organismo]) !== null;

        $form->get('esIniciador')->setData($esIniciador);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Organismo actualizado correctamente');

            return $this->redirectToRoute('organismo_index');
        }

        return $this->render('organismo/edit.html.twig', [
            'form' => $form->createView(),
            'organismo' => $organismo,
            'modo'=>'edit',
        ]);
    }

    #[Route('/{idOrganismo}', name: 'organismo_delete', methods: ['POST'])]
    public function delete(Request $request, Organismo $organismo, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organismo->getIdOrganismo(), $request->request->get('_token'))) {
            $em->remove($organismo);
            $em->flush();

            $this->addFlash('success', 'Organismo eliminado');
        }

        return $this->redirectToRoute('organismo_index');
    }
}
