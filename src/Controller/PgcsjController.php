<?php

namespace App\Controller;

use App\Entity\Pgcsj;
use App\Entity\Caso;
use App\Form\PgcsjType;
use App\Repository\PgcsjRepository;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Service\CasoTabsDataProvider;

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
    public function new(Request $request, EntityManagerInterface $em,
    CasoRepository $casoRepo, SessionInterface $session,
    CasoTabsDataProvider $tabsProvider
    ): Response
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
            
            $tabsData = $tabsProvider->getData($casoRepo->find($idCaso));
            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }
        
       
        if (!empty($tabsData['pgcsj'])) {
            // Llamar al método edit y devolver su Response

            return $this->edit($request, $idCaso, $casoRepo, $tabsProvider, $em);
        }



        $pgcsj = new Pgcsj();
        $form = $this->createForm(PgcsjType::class, $pgcsj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pgcsj->setFechacarga(new \DateTime());
            $pgcsj->setUsuariocarga($this->getUser()?->getUserIdentifier());

            $em->persist($pgcsj);
            $em->flush();

            $this->addFlash('success_js', 'Seccion PGCSJ guardada correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }

        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        $parametros['modo'] = 'edit';
        return $this->render('pgcsj/new.html.twig', $parametros);
    
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
