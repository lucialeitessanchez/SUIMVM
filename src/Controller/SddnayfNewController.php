<?php
namespace App\Controller;

use App\Entity\SddnayfNew;
use App\Entity\SddnayfHijosVictima;
use App\Entity\Caso;
use App\Form\SddnayfNewType;
use App\Repository\SddnayfNewRepository;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\Service\CasoTabsDataProvider;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Route('/sddnayf')]
class SddnayfNewController extends AbstractController
{
    #[Route('/new_sddnayf', name: 'app_sddnayf_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,CasoRepository $casoRepo, SessionInterface $session,
        CasoTabsDataProvider $tabsProvider
    ): Response {
        
        $idCaso = $session->get('caso_id');
        $caso = null;
        $sinCaso = false;
        $parametros = [];

        if (!$idCaso) {
            $this->addFlash('error', 'Debe seleccionar un caso primero.');
            $sinCaso = true;
            
        } else {
            $caso = $em->getRepository(Caso::class)->find($idCaso);
            $parametros['caso'] = $caso;
            
            $tabsData = $tabsProvider->getData($casoRepo->find($idCaso));
            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }
        
       
        if (!empty($tabsData['sddnayf'])) {
            // Llamar al método edit y devolver su Response

            return $this->edit($request, $idCaso, $casoRepo, $tabsProvider, $em);
        }
       
                $sddnayf = new SddnayfNew();

                $form = $this->createForm(SddnayfNewType::class, $sddnayf);
                $form->handleRequest($request);

                // Al menos un hijo vacío para inicializar
                $sddnayf->addHijoVictima(new \App\Entity\SddnayfHijosVictima());

                $form = $this->createForm(SddnayfNewType::class, $sddnayf);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $sddnayf->setCaso($caso); 
                    $sddnayf->setFechacarga(new \DateTime());
                    $sddnayf->setUsuariocarga($this->getUser()?->getUserIdentifier());

                    $em->persist($sddnayf);
                    $em->flush();

                    $this->addFlash('success_js', 'Seccion SDDNAyF guardada correctamente');   
                    return $this->redirectToRoute('app_caso_index');
                }

                $parametros['form'] = $form->createView();
                $parametros['sinCaso'] = $sinCaso;
                $parametros['modo'] = 'edit';
                return $this->render('sddnayf/new.html.twig', $parametros);
            
    }

    //edit de gpt

    #[Route('/{idCaso}/edit', name: 'app_sddnayf_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        int $idCaso,
        CasoRepository $casoRepository,
        CasoTabsDataProvider $tabsProvider,
        EntityManagerInterface $em
    ): Response {

        $sinCaso=false;
        $caso = $casoRepository->find($idCaso);
    
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado.');
        } else {
    
        $tabsData = $tabsProvider->getData($caso);

        $sddnayfNew = $em->getRepository(SddnayfNew::class)->findOneBy(['caso' => $caso]);
        }
        
        if (!$sddnayfNew) {
            return $this->redirectToRoute('app_sddnayf_new', ['idCaso' => $idCaso]);
        }
        // importante: mantener hijos existentes, no reemplazarlos
        foreach ($sddnayfNew->getHijosVictima() as $hijo) {
            $hijo->setSddnayfNew($sddnayfNew); // opcional, si no está hecho en cascada
        }
    
        $form = $this->createForm(SddnayfNewType::class, $sddnayfNew);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
    
            // asegurar hijos válidos y que no se borren si no se tocaron
            foreach ($sddnayfNew->getHijosVictima() as $hijo) {
                $hijo->setSddnayfNew($sddnayfNew); // aseguramos relación bidireccional
            }
    
            $em->persist($sddnayfNew);
            $em->flush();
    
            $this->addFlash('success_js', 'Formulario actualizado correctamente.');
    
    //        return $this->redirectToRoute('app_sddnayf_edit', ['idCaso' => $idCaso]);
            return $this->redirectToRoute('app_caso_index');
        }
    
        $parametros['form'] = $form->createView();
        $parametros['caso'] = $caso;
        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
        $parametros['sinCaso'] = $sinCaso;
        $parametros['pestaña_activa'] = 'sddnayf';

        return $this->render('sddnayf/edit.html.twig', $parametros);
    }
    
    //-----------------------------------
   
    

    #[Route('/{idCaso}/show', name: 'app_sddnayf_show', methods: ['GET'])]
    public function show(CasoRepository $casoRepository,
    SddnayfNewRepository $sddnayfNewRepository,int $idCaso, 
    CasoTabsDataProvider $tabsProvider,FormFactoryInterface $formFactory): Response
    {
        $caso = null;
        $sinCaso = false;
        $parametros = [];

        // Buscar el caso           
        $caso = $casoRepository->find($idCaso);
        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado');
        }

         //busco si hay datos asociados para mostrar la pestaña desde el servicio
         $tabsData = $tabsProvider->getData($caso);

         $sddnayf = $sddnayfNewRepository->findOneBy(['caso' => $caso]);
         if (!$sddnayfNewRepository) {
             throw $this->createNotFoundException('No hay datos de SDH para este caso');
         }
       
         
          // Creamos el form pero sin intención de editar
             $form = $formFactory->create(SddnayfNewType::class, $sddnayf, [
                 'disabled' => true, // importante: desactiva todos los campos
             ]);

            $parametros['form'] = $form->createView();
            $parametros['caso'] = $caso;
            foreach ($tabsData as $clave => $valor) {
                $parametros[$clave] = $valor;
            }
            $parametros['sinCaso'] = $sinCaso;
            $parametros['pestaña_activa'] = 'sddnayf';
    
            return $this->render('sddnayf/show.html.twig', $parametros);
        
    }

}
