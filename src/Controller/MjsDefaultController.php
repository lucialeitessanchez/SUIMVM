<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\MjsServicioPenitenciario;
use App\Form\MjsServicioPenitenciarioType;
use App\Entity\Caso;
use App\Service\CasoTabsDataProvider;
use App\Repository\CasoRepository;

class MjsDefaultController extends AbstractController {

#[Route('/mjs')]
    #[Route('/index', name: 'app_index', methods: ['GET'])]
    public function index(Security $security): Response {
        $user = $security->getUser();
        $token = $security->getToken();

        if ($user instanceof \App\Security\User && method_exists($token, 'getAttributes')) {
            $attrs = $token->getAttributes();

            $user->setUid($attrs['uid'] ?? '');
            $user->setCuil($attrs['cuil'] ?? '');
            $user->setNombre($attrs['givenName'] ?? '');
        }

        return $this->render('index.html.twig', array('usuario' => $user));
    }

    #[Route('/secure/test', name: 'secure_test')]
    public function testSecure(): Response
    {
        $usuario = $this->getUser();
        return $this->render('index.html.twig', array('' => $usuario));
    }

    #[Route('/mjs_defaul', name: 'mjs_app_default', methods: ['GET'] )]
    public function default(
        Request $request,
        EntityManagerInterface $em,
        SessionInterface $session,
        CasoTabsDataProvider $tabsProvider,
        CasoRepository $casoRepository,

    ): Response {
        $usuario = $this->getUser();
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
            $tabsData = $tabsProvider->getData($casoRepository->find($idCaso));
    
            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }
    
        // ✅ definimos SIEMPRE mjs_sp, aunque no exista
        $parametros['mjs_sp'] = $tabsData['mjs_sp'] ?? [];
        $parametros['sinCaso'] = $sinCaso;
        
        return $this->render('mjs/justiciayseguridad_form.html.twig', $parametros);
    }
  }