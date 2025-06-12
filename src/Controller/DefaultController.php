<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DefaultController extends AbstractController {

    #[Route('/index', name: 'app_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response {
        $usuario = $this->getUser();
        //$biens = $entityManager
        //  ->getRepository(Bien::class)
        //  ->findAll();

        return $this->render('index.html.twig', array('usuario' => $usuario));
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

    #[Route('/logout', name: 'logout')]
    public function logout(): Response
    {
        return $this->render('default/logout.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }



    #[Route('/failure', name: 'failure', methods: ['GET'])]
    public function failure()
    {
        return new Response("No Estás logueado ");
    }

}
