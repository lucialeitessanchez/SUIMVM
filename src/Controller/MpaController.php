<?php

namespace App\Controller;

use App\Entity\Archivo;
use App\Entity\Caso;
use App\Entity\Mpa;
use App\Entity\MpaTipoViolencia;
use App\Entity\Nomenclador;
use App\Repository\MpaRepository;
use App\Repository\CasoRepository;
use App\Form\MpaForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CasoTabsDataProvider;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/mpa')]
final class MpaController extends AbstractController
{
    #[Route(name: 'app_mpa_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $mpas = $entityManager
            ->getRepository(Mpa::class)
            ->findAll();

        return $this->render('mpa/index.html.twig', [
            'mpas' => $mpas,
        ]);
    }

    #[Route('/new', name: 'app_mpa_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SessionInterface $session,SluggerInterface $slugger): Response
    {
        $idCaso = $session->get('caso_id');

        $caso = null;
        $sinCaso = false;
        $parametros = [];


        if (!$idCaso) {
            $this->addFlash('error', 'Debe seleccionar un caso primero.');
            $sinCaso = true;
        } else {
            $caso = $entityManager->getRepository(Caso::class)->find($idCaso);
            $parametros['caso'] = $caso;
            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }

        $mpa = new Mpa();
         // Agregamos al menos un campo vacío
        
        $form = $this->createForm(MpaForm::class, $mpa);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //seteo usuario carga
            $mpa->setUsuarioCarga("Usuario 1");
            // Obtener los archivos
            /** @var UploadedFile[] $uploadedFiles */ // Esto ayuda con la auto-completación del IDE
            $uploadedFiles = $form->get('archivos')->getData(); //un array de objetos UploadedFiles

            foreach ($uploadedFiles as $file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('archivos_directory'),
                        $newFilename
                    );

                    // Crea una nueva instancia de la entidad Archivo
                    $archivoEntity = new Archivo();
                    $archivoEntity->setNombreArchivo($newFilename);
                    $archivoEntity->setOriginalFilename($originalFilename);
                    $archivoEntity->setMimeType($file->getMimeType());
                    $archivoEntity->setSize($file->getSize());
                    
                    // Añade la entidad Archivo a la colección de Mpa
                    $mpa->addArchivo($archivoEntity);

                } catch (FileException $e) {
                    $this->addFlash('error', 'Problemas al subir el archivo ' . $originalFilename . ': ' . $e->getMessage());
                }
            }
            $mpa->setUsuarioCarga("usuario 1");
            if (!$sinCaso)
                $mpa->setCaso($caso);
            $entityManager->persist($mpa);
            $entityManager->flush();

            // Obtener el array desde el campo hidden
            $tiposViolenciaJson = $request->request->get('tiposViolencia');
        
            $tiposViolenciaArray = json_decode($tiposViolenciaJson, true);

            // Guardar los tipos de violencia
            if (is_array($tiposViolenciaArray)) {
                foreach ($tiposViolenciaArray as $texto) {
                    $tipo = new MpaTipoViolencia();
                    $tipo->setMpa($mpa);
                    $tipo->setDescripcionViolencia($texto);
                    $entityManager->persist($tipo);
                    $entityManager->flush(); // Este flush guarda los MpaTipoViolencia
                }
                
        }
           // $this->addFlash('success', 'MPA guardado correctamente.');
        $this->addFlash('success_js', 'Seccion MPA guardada correctamente');   
        return $this->redirectToRoute('app_caso_index');
        }
        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        return $this->render('mpa/new.html.twig', $parametros);
    }
    

    #[Route('/{idCaso}/show', name: 'app_mpa_show')]
    public function show(
        CasoRepository $casoRepository,
        MpaRepository $mpaRepository,
        int $idCaso, 
        CasoTabsDataProvider $tabsProvider,
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager // necesitas esto para chequear si está gestionado
    ): Response {
        // Buscar el caso
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
        }
        // Buscar datos asociados para mostrar las pestañas
        $tabsData = $tabsProvider->getData($caso);
    
        // Buscar el MPA por caso
        $mpa = $mpaRepository->findOneBy(['caso' => $caso]);
        if (!$mpa) {
            throw $this->createNotFoundException('No hay datos de mpa para este caso');
        }
    
        // 🔧 Asegurar que mpa_9c (Nomenclador) esté gestionado
        $original = $mpa->getMpa9c();
        if ($original && !$entityManager->contains($original)) {
            $reloaded = $entityManager->getRepository(\App\Entity\Nomenclador::class)->find($original->getId());
            $mpa->setMpa9c($reloaded);
        }
    
        // Crear el formulario en modo solo lectura
        $form = $formFactory->create(MpaForm::class, $mpa, [
            'disabled' => true,
        ]);
        
        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
        $parametros['form'] = $form->createView();
        $parametros['caso'] = $caso;     
        $parametros['pestaña_activa'] = 'mpa';

        return $this->render('mpa/show.html.twig', $parametros);
       
    }

    #[Route('/{idCaso}/edit', name: 'app_mpa_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $idCaso,
    CasoRepository $casoRepository, CasoTabsDataProvider $tabsProvider,
    EntityManagerInterface $entityManager): Response
    {

         // Buscar el caso           
         $caso = $casoRepository->find($idCaso);
         if (!$caso) {
             throw $this->createNotFoundException('Caso no encontrado');
         }

          //busco si hay datos asociados para mostrar la pestaña desde el servicio
          $tabsData = $tabsProvider->getData($caso);

          $mpa = $entityManager->getRepository(Mpa::class)->findOneBy(['caso' => $caso]);
          if (!$mpa) {
              throw $this->createNotFoundException('No hay datos de CAJ para este caso');
          }

        $form = $this->createForm(MpaForm::class, $mpa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             /** @var UploadedFile[] $archivosSubidos */
        $archivosSubidos = $form['archivoAdjunto']->getData();

        if ($archivosSubidos) {
            foreach ($archivosSubidos as $archivo) {
                $nuevoArchivo = new Archivo();

                $nombreArchivo = uniqid().'.'.$archivo->guessExtension();
                $archivo->move($this->getParameter('directorio_archivos'), $nombreArchivo);

                $nuevoArchivo->setNombreArchivo($nombreArchivo);
                $nuevoArchivo->setOriginalFilename($archivo->getClientOriginalName());
                $nuevoArchivo->setMimeType($archivo->getMimeType());
                $nuevoArchivo->setSize($archivo->getSize());
                $nuevoArchivo->setMpa($mpa); // Enlaza con el objeto actual

                $entityManager->persist($nuevoArchivo);
            }
        }

            $entityManager->flush();

            //return $this->redirectToRoute('app_mpa_edit', [], Response::HTTP_SEE_OTHER);
            $this->addFlash('success_js', 'Datos guardados correctamente');   
           return $this->redirectToRoute('app_caso_index');
        }

        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
        $parametros['form'] = $form->createView();
        $parametros['caso'] = $caso;     
        $parametros['pestaña_activa'] = 'mpa';

        return $this->render('mpa/edit.html.twig', $parametros);
        
    }

    #[Route('/{id_mpa}', name: 'app_mpa_delete', methods: ['POST'])]
    public function delete(Request $request, Mpa $mpa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mpa->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($mpa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_mpa_index', [], Response::HTTP_SEE_OTHER);
    }
}
