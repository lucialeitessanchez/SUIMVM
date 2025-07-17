<?php

namespace App\Controller;


use App\Entity\Caso;
use App\Entity\GobLocales;
use App\Repository\CasoRepository;
use App\Form\GobLocalesType;
use App\Repository\GobLocalesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Service\CasoTabsDataProvider;

#[Route('/gob_locales')]
class GobLocalesController extends AbstractController
{
    #[Route('/{idCaso}/show', name: 'gob_locales_show', methods: ['GET'])]
    public function show(
        int $idCaso,
        GobLocalesRepository $gobLocalesRepository,
        CasoRepository $casoRepository,
        CasoTabsDataProvider $tabsProvider,
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
        $tabsData = $tabsProvider->getData($caso);
        $gobLocales = $gobLocalesRepository->findOneBy(['caso' => $caso]);

        if (!$gobLocales) {
            $this->addFlash('warning', 'No hay datos cargados de GobLocales para este caso');
            return $this->redirectToRoute('caso_index'); // o donde corresponda
        }

        $form = $this->createForm(GobLocalesType::class, $gobLocales, [
            'disabled' => true,
        ]);

        $parametros['form'] = $form->createView();
        $parametros['caso'] = $caso;

        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
   
        $parametros['pestaña_activa'] = 'gl';

        return $this->render('gobLocal/show.html.twig', $parametros);
         
    }

    #[Route('/{idCaso}/edit', name: 'gob_locales_edit', methods: ['GET', 'POST'])]
    public function edit(
        int $idCaso,
        Request $request,
        GobLocalesRepository $gobLocalesRepository,
        CasoRepository $casoRepository,
        CasoTabsDataProvider $tabsProvider,
        EntityManagerInterface $em
    ): Response {
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
        }
        $tabsData = $tabsProvider->getData($caso);
        $gobLocales = $em->getRepository(GobLocales::class)->findOneBy(['caso' => $caso]);

        if (!$gobLocales) {
            return $this->redirectToRoute('gob_locales_new', ['idCaso' => $idCaso]);
        }

        $form = $this->createForm(GobLocalesType::class, $gobLocales);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success_js', 'Seccion AL guardada correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }
        
            $parametros['form'] = $form->createView();
            $parametros['caso'] = $caso;

            foreach ($tabsData as $clave => $valor) {
                $parametros[$clave] = $valor;
            }
       
            $parametros['pestaña_activa'] = 'gl';

        return $this->render('gobLocal/edit.html.twig', $parametros);
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
   
        $gobLocales->setFechaCarga(new \DateTimeImmutable());
        $gobLocales->setUsuarioCarga($this->getUser()?->getUserIdentifier() ?? 'sistema');
        $gobLocales->setCaso($caso);
        $form = $this->createForm(GobLocalesType::class, $gobLocales);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $em->persist($gobLocales);
            $em->flush();
          // dd($idCaso);
          //  dd($gobLocales->getCaso()->getIdCaso());
           $this->addFlash('success_js', 'Seccion Area Local guardada correctamente');   
           return $this->redirectToRoute('app_caso_index');
        }

        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        $parametros['modo'] = 'edit';
        return $this->render('gobLocal/new.html.twig', $parametros);
}
}