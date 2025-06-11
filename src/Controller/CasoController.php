<?php

namespace App\Controller;

use App\Entity\Caso;
use App\Entity\Persona;
use App\Entity\Organismo;
use App\Entity\OrganismoOrigen;
use App\Form\CasoType;
use App\Repository\CasoRepository;
use App\Repository\CajRepository;
use App\Repository\MpaRepository;
use App\Repository\SdhRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PersonaService;
use App\Service\CasoTabsDataProvider;

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

            //seteo usuario carga
            $caso->setUsuarioCarga("prueba");

            $em->persist($persona);
            $em->persist($caso);
            $em->flush();

            $id=$caso->getIdCaso();
        // ✅ Mensaje flash
           // $this->addFlash('aviso', 'El caso fue guardado exitosamente con el número '.$id);
           $this->addFlash('success_js', 'Datos guardados correctamente');   
           return $this->redirectToRoute('app_caso_index');
        }
    
        return $this->render('casoAlta.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/caso/guardar-caso-sesion', name: 'guardar_caso_sesion', methods: ['POST'])]
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
    
    
        
    #[Route('/{id}/ver', name: 'caso_ver')]
    public function ver(Caso $caso, PersonaService $personaService, FormFactoryInterface $formFactory,
    CasoTabsDataProvider $tabsProvider): Response
    {
        // Creamos el form pero sin intención de editar
        $form = $formFactory->create(CasoType::class, $caso, [
            'disabled' => true, // importante: desactiva todos los campos
        ]);
        
        $persona= $caso->getPersonaIdPersona();
        $datosPersona = $personaService->getDatosPersona($persona);

        $localidad = $caso->getLocalidad();
        $departamento = $localidad?->getDepartamento();
        $microregion = $localidad?->getMicroregion();

        //busco si hay datos asociados para mostrar la pestaña desde el servicio
        $tabsData = $tabsProvider->getData($caso);

        return $this->render('caso/show.html.twig', [
            'form' => $form,
            'caso' => $caso,
            'datosPersona'=>$datosPersona,
            'departamento'=>$departamento,
            'microregion'=>$microregion,
            'caj' => $tabsData['caj'],
            'sdh' => $tabsData['sdh'],
            'mpa' => $tabsData['mpa'],
            'pestaña_activa'=>'caso',
        ]);
    }
    
}
