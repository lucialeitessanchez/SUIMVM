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
            $franjaEtaria=$request->request->get('franjaEtaria');
            $nacionalidad=$request->request->get('nacionalidad');
            $sexo=$request->request->get('sexo');
            $generoAud=$request->request->get('generoAutop');

            // Crear y asociar la persona
            $persona = new Persona();
            $persona->setApellido($apellido);
            $persona->setNombre($nombre);
            $persona->setNrodoc($dni);
            $persona->setNacionalidad($nacionalidad);
            $persona->setSexo($sexo);
            $persona->setGeneroAutop($generoAud);
            

            $caso->setPersonaIdPersona($persona);
            $caso->setFranjaEtaria($franjaEtaria);
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
        $nacionalidad = $persona?->getNacionalidad();

        //busco si hay datos asociados para mostrar la pestaña desde el servicio
        $tabsData = $tabsProvider->getData($caso);

        return $this->render('caso/show.html.twig', [
            'form' => $form,
            'caso' => $caso,
            'datosPersona'=>$datosPersona,
            'departamento'=>$departamento,
            'microregion'=>$microregion,
            'nacionalidad'=>$nacionalidad,
            'caj' => $tabsData['caj'],
            'sdh' => $tabsData['sdh'],
            'mpa' => $tabsData['mpa'],
            'pestaña_activa'=>'caso',
        ]);
    }
    

    #[Route('/{idCaso}/edit', name: 'app_caso_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $idCaso,
    PersonaService $personaService,CasoRepository $casoRepository, CasoTabsDataProvider $tabsProvider,
    EntityManagerInterface $entityManager): Response
    {

         // Buscar el caso           
         $caso = $casoRepository->find($idCaso);
         if (!$caso) {
             throw $this->createNotFoundException('Caso no encontrado');
         }

          //busco si hay datos asociados para mostrar la pestaña desde el servicio
          $tabsData = $tabsProvider->getData($caso);
/*
          $caso = $entityManager->getRepository(Caso::class)->findOneBy(['caso' => $caso]);
          if (!$caso) {
              throw $this->createNotFoundException('No hay datos de para este caso');
          }*/

            $persona= $caso->getPersonaIdPersona();
            $datosPersona = $personaService->getDatosPersona($persona);

            $localidad = $caso->getLocalidad();
            $departamento = $localidad?->getDepartamento();
            $microregion = $localidad?->getMicroregion();
            

            $form = $this->createForm(CasoType::class, $caso);
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success_js', 'Datos actualizados correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }
        $parametros['form'] = $form->createView();
        $parametros['mpa'] = $tabsData['mpa'];
        $parametros['caso'] = $caso;
        $parametros['datosPersona']= $datosPersona;
        $parametros['datosPersona']=$datosPersona;
        $parametros['departamento']=$departamento;
        $parametros['microregion']=$microregion;
        
        $parametros['caj'] = $tabsData['caj'];
        $parametros['sdh'] = $tabsData['sdh'];
        $parametros['pestaña_activa'] = 'caso';

        return $this->render('caso/edit.html.twig', $parametros);
        
    }

    
}
