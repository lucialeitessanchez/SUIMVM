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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caso')]
class CasoController extends AbstractController
{
    #[Route(name: 'app_caso_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $casos = $entityManager
        ->getRepository(Caso::class)
        ->findAll();

    return $this->render('/caso/casoList.html.twig', [
        'casos' => $casos,
    ]);
    }

    #[Route('/nuevo', name: 'caso_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
     //seteo el origen (hasta que reciba usuario)
     $organismo=new Organismo();
     $organismo = $em->getRepository(Organismo::class)->find(1);
     $organismo->getIdOrganismo();
    // var_dump($organismo->getIdOrganismo());
     $organismoOrigen=new OrganismoOrigen();
     $organismoOrigen=$em->getRepository(OrganismoOrigen::class)->findOneBy(['organismo' => $organismo]);
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
            $caso->setOrganismoOrigenIdOrigen($organismoOrigen);

            $em->persist($persona);
            $em->persist($caso);
            $em->flush();
        // ✅ Mensaje flash
            $this->addFlash('aviso', 'El caso fue guardado exitosamente.');
            return $this->redirectToRoute('caso_new');
        }
    
        return $this->render('casoAlta.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/guardar-caso-sesion', name: 'guardar_caso_sesion', methods: ['POST'])]
    public function guardarCasoSesion(Request $request, SessionInterface $session): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $idCaso = $data['idCaso'] ?? null;

        if ($idCaso) {
            $session->set('caso_id', $idCaso);
            return new JsonResponse(['success' => true]);
        }

        return new JsonResponse(['success' => false, 'error' => 'ID no válido'], 400);
    }
    
    #[Route('/listado', name: 'caso_listar')]
    public function listar(CasoRepository $casoRepository): Response
    {
        $casos = $casoRepository->findAll();
    
        return $this->render('casoList.html.twig', [
            'casos' => $casos,
        ]);
    }
    
    
}
