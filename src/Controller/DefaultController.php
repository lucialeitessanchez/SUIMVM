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

class DefaultController extends AbstractController {

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

    #[Route('/', name: 'app_default', methods: ['GET'])]
    public function default(EntityManagerInterface $entityManager): Response {
        //$biens = $entityManager
        //  ->getRepository(Bien::class)
        //  ->findAll();
        $usuario = $this->getUser();

        // return $this->render('index.html.twig');
        return $this->render('index.html.twig', array('usuario' => $usuario));
    }


    #[Route('/secure/logout', name: 'app_logout')]
    public function logout()
    {
    }



    #[Route('/failure', name: 'failure', methods: ['GET'])]
    public function failure()
    {
        return new Response("No Estás logueado ");
    }

}
