<?php

namespace App\Controller;

use App\Entity\Caso;
use App\Entity\Persona;
use App\Entity\Organismo;
use App\Entity\OrganismoOrigen;
use App\Form\CasoType;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caso')]
class CasoController extends AbstractController
{
    #[Route('/', name: 'caso_index', methods: ['GET'])]
    public function index(CasoRepository $casoRepository): Response
    {
        return $this->render('casoAlta.html.twig', [
            'casos' => $casoRepository->findAll(),
        ]);
    }

    #[Route('/nuevo', name: 'caso_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
     //seteo el origen (hasta que reciba usuario)
     $organismo=new Organismo();
     $organismo = $em->getRepository(Organismo::class)->find(1);
    // var_dump($organismo->getIdOrganismo());
     $organismoOrigen=new OrganismoOrigen();
     $organismoOrigen=$em->getRepository(OrganismoOrigen::class)->findOneBy(['organismoIdOrganismo' => $organismo]);
        // dd('Estoy en el método new');
        $caso = new Caso();
        $form = $this->createForm(CasoType::class, $caso);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {

            // Obtener datos sueltos desde la request
            $apellido = $request->request->get('apellido');
            $nombre = $request->request->get('nombre');
            $dni = $request->request->get('nrodoc');

            // Crear y asociar la persona
            $persona = new Persona();
            $persona->setApellido($apellido);
            $persona->setNombre($nombre);
            $persona->setNrodoc($dni);

            $caso->setPersonaIdPersona($persona);
            // Setear el organismo en el caso
          //  $caso->setOrganismoOrigenIdOrigen($organismo);

            $em->persist($persona);
            $em->persist($caso);
            $em->flush();
    
            return $this->redirectToRoute('caso_new');
        }
    
        return $this->render('casoAlta.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/editar', name: 'caso_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Caso $caso, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CasoType::class, $caso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('caso_index');
        }

        return $this->render('caso/edit.html.twig', [
            'form' => $form->createView(),
            'caso' => $caso,
        ]);
    }
}
