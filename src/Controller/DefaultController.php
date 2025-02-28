<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


#[Route(path: '/')]
class DefaultController extends AbstractController {

    #[Route('/index', name: 'app_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response {
        $usuario = $this->getUser();
        //$biens = $entityManager
        //  ->getRepository(Bien::class)
        //  ->findAll();

        return $this->render('index.html', array('' => $usuario));
    }

    #[Route('/', name: 'app_default', methods: ['GET'])]
    public function default(EntityManagerInterface $entityManager): Response {
        //$biens = $entityManager
        //  ->getRepository(Bien::class)
        //  ->findAll();
        $usuario = $this->getUser();

        // return $this->render('index.html.twig');
        return $this->render('index.html', array('' => $usuario));
    }

}
