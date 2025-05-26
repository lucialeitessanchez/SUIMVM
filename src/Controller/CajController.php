<?php

namespace App\Controller;

use App\Entity\Caj;
use App\Entity\Caso;
use App\Form\CajType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caj')]
class CajController extends AbstractController
{
    #[Route('/new', name: 'caj_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, SessionInterface $session): Response
    {
        /*seteo el caso hasta mañana ver lo de lucia*/
      //  $caso=new Caso();
      
      //  $caso = $em->getRepository(Caso::class)->find(1);

        $idCaso = $session->get('caso_id');

        if (!$idCaso) {
            $this->addFlash('error', 'Debe seleccionar un caso primero.');
            return $this->redirectToRoute('app_caso_index');
        }
    
        $caso = $em->getRepository(Caso::class)->find($idCaso);
    
        if (!$caso) {
            throw $this->createNotFoundException("Caso no encontrado.");
        }

        $caj = new Caj();
        $caj->setCaso($caso);

        $form = $this->createForm(CajType::class, $caj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $caj->setCaso($caso);
            $caj->setUsuarioCarga('prueba');
            $caj->setFechaCarga(new \DateTime());
            $em->persist($caj);
            $em->flush();

            $this->addFlash('aviso', 'Datos guardados correctamente.');

            return $this->redirectToRoute('caj_new'); // puedes redirigir a otra ruta si lo deseas
        }
       
        return $this->render('caj/new.html.twig', [
            'form' => $form->createView(),
            'caso' => $caso,
        ]);
    }

   

}
