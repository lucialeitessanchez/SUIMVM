<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\SecurityBundle\Security;



class DefaultController extends AbstractController {

    #[Route('/acceso-denegado', name: 'app_acceso_denegado')]
    public function accesoDenegado(): Response
    {
        return $this->render('security/acceso_denegado.html.twig');
    }

    #[Route('/secure/test', name: 'secure_test')]
    public function testSecure(): Response
    {
        $usuario = $this->getUser();
        return $this->render('index.html.twig', array('' => $usuario));
    }
    #[IsGranted('ROLE_MIGYD_ADMIN')]
    #[Route('/', name: 'app_default', methods: ['GET'])]
    public function default(EntityManagerInterface $entityManager): Response {
        //$biens = $entityManager
        //  ->getRepository(Bien::class)
        //  ->findAll();
        $usuario = $this->getUser();
        if (!$this->isGranted('ROLE_MIGYD_ADMIN')) {
        return $this->redirectToRoute('app_acceso_denegado');
        }
        // return $this->render('index.html.twig');
        return $this->render('index.html.twig', array('usuario' => $usuario));
    }


}
