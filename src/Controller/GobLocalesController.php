<?php

namespace App\Controller;

use App\Entity\GobLocales;
use App\Entity\Caso;
use App\Repository\CasoRepository;
use App\Form\GobLocalesType;
use App\Repository\GobLocalesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[Route('/gob_locales')]
class GobLocalesController extends AbstractController
{
    #[Route('/{idCaso}/show', name: 'gob_locales_show', methods: ['GET'])]
    public function show(
        int $idCaso,
        GobLocalesRepository $gobLocalesRepository,
        CasoRepository $casoRepository,
        EntityManagerInterface $entityManager,SessionInterface $session
    ): Response {

        $idCaso = $session->get('caso_id');

        $caso = null;
        $sinCaso = false;
        $parametros = [];
        if (!$idCaso) {
            $this->addFlash('error', 'Debe seleccionar un caso primero.');
            $sinCaso = true;
        } else {
            $caso = $entityManager->getRepository(Caso::class)->find($idCaso);
            $parametros['caso'] = $caso;
            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }

        $gobLocales = $gobLocalesRepository->findOneBy(['idCaso' => $idCaso]);

        if (!$gobLocales) {
            $this->addFlash('warning', 'No hay datos cargados de GobLocales para este caso');
            return $this->redirectToRoute('caso_index'); // o donde corresponda
        }

        $form = $this->createForm(GobLocalesType::class, $gobLocales, [
            'disabled' => true,
        ]);

        return $this->render('gob_locales/form.html.twig', [
            'form' => $form->createView(),
            'caso' => $caso,
        ]);
    }

    #[Route('/{idCaso}/edit', name: 'gob_locales_edit', methods: ['GET', 'POST'])]
    public function edit(
        int $idCaso,
        Request $request,
        GobLocalesRepository $gobLocalesRepository,
        CasoRepository $casoRepository,
        EntityManagerInterface $em
    ): Response {
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
        }

        $gobLocales = $gobLocalesRepository->findOneBy(['idCaso' => $idCaso]);

        if (!$gobLocales) {
            return $this->redirectToRoute('gob_locales_new', ['idCaso' => $idCaso]);
        }

        $form = $this->createForm(GobLocalesType::class, $gobLocales);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Datos actualizados correctamente.');
            return $this->redirectToRoute('gob_locales_show', ['idCaso' => $idCaso]);
        }

        return $this->render('gob_locales/form.html.twig', [
            'form' => $form->createView(),
            'caso' => $caso,
        ]);
    }

    #[Route('/new', name: 'gob_locales_new', methods: ['GET', 'POST'])]
    public function new(
         Request $request,
        CasoRepository $casoRepository,
        EntityManagerInterface $em,SessionInterface $session
    ): Response {
       
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

        $gobLocales = new GobLocales();
       // $gobLocales->setCaso($idCaso);
        $gobLocales->setFechaCarga(new \DateTimeImmutable());
        $gobLocales->setUsuarioCarga($this->getUser()?->getUserIdentifier() ?? 'sistema');

        $form = $this->createForm(GobLocalesType::class, $gobLocales);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($gobLocales);
            $em->flush();

           $this->addFlash('success_js', 'Seccion Area Local guardada correctamente');   
           return $this->redirectToRoute('app_caso_index');
        }

        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        return $this->render('gobLocal/new.html.twig', $parametros);
}
}