<?php
namespace App\Controller;

use App\Entity\SddnayfNew;
use App\Entity\Caso;
use App\Form\SddnayfNewType;
use App\Repository\SddnayfNewRepository;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\Service\CasoTabsDataProvider;

#[Route('/sddnayf')]
class SddnayfNewController extends AbstractController
{
    #[Route('/new_sddnayf', name: 'app_sddnayf_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,CasoRepository $casoRepo, SessionInterface $session
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
        $sddnayf = new SddnayfNew();

        // Al menos un hijo vacío para inicializar
        $sddnayf->addHijoVictima(new \App\Entity\SddnayfHijosVictima());

        $form = $this->createForm(SddnayfNewType::class, $sddnayf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sddnayf->setFechacarga(new \DateTime());
            $sddnayf->setUsuariocarga($this->getUser()?->getUserIdentifier());

            $em->persist($sddnayf);
            $em->flush();

            $this->addFlash('success', 'Formulario guardado correctamente.');
            return $this->redirectToRoute('caso_ver', ['id' => $idCaso]);
        }

        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        $parametros['modo'] = 'new';
        return $this->render('sddnayf/new.html.twig', $parametros);
    }
/*

    #[Route('/edit/{id}', name: 'app_sddnayf_edit', methods: ['GET', 'POST'])]
    public function edit(
        SddnayfNew $sddnayf,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(SddnayfNewType::class, $sddnayf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Formulario actualizado correctamente.');
            return $this->redirectToRoute('caso_ver', ['id' => $sddnayf->getCaso()->getIdCaso()]);
        }

        return $this->render('sddnayf/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
        */
}
