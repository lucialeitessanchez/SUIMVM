<?php

namespace App\Controller;

use App\Entity\Pgcsj;
use App\Entity\Caso;
use App\Form\PgcsjType;
use App\Repository\PgcsjRepository;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\Service\CasoTabsDataProvider;

#[Route('/pgcsj')]
class PgcsjController extends AbstractController
{
    #[Route('/', name: 'app_pgcsj_index', methods: ['GET'])]
    public function index(PgcsjRepository $pgcsjRepository): Response
    {
        return $this->render('pgcsj/index.html.twig', [
            'pgcsjs' => $pgcsjRepository->findAll(),
        ]);
    }

//---------------------------------------------------

    #[Route('/new', name: 'app_pgcsj_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em,
    CasoRepository $casoRepo, SessionInterface $session,
    CasoTabsDataProvider $tabsProvider
    ): Response
    {
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
        
       /*
        if (!empty($tabsData['pgcsj'])) {
            // Llamar al método edit y devolver su Response

            return $this->edit($request, $idCaso, $casoRepo, $tabsProvider, $em);
        }
*/

        $pgcsj = new Pgcsj();
        $form = $this->createForm(PgcsjType::class, $pgcsj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pgcsj->setCaso($caso); 
            $pgcsj->setFechacarga(new \DateTime());
            $pgcsj->setUsuariocarga($this->getUser()?->getUserIdentifier());

            $em->persist($pgcsj);
            $em->flush();

            $this->addFlash('success_js', 'Seccion PGCSJ guardada correctamente');   
            return $this->redirectToRoute('app_caso_index');
        }

        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        $parametros['modo'] = 'edit';
        return $this->render('pgcsj/new.html.twig', $parametros);
    
    }
//--------------------------------------------------------------------
    #[Route('/{idCaso}', name: 'app_pgcsj_show', methods: ['GET'])]
    public function show(
    CasoRepository $casoRepository,
    PgcsjRepository $pgcsjRepository,int $idCaso, 
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

         $pgcsj = $pgcsjRepository->findOneBy(['caso' => $caso]);
         if (!$pgcsjRepository) {
             throw $this->createNotFoundException('No hay datos de SDH para este caso');
         }

           // Creamos el form pero sin intención de editar
        $form = $formFactory->create(PgcsjType::class, $pgcsj, [
            'disabled' => true, // importante: desactiva todos los campos
        ]);

        $parametros['form'] = $form->createView();
        $parametros['caso'] = $caso;
        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
        $parametros['sinCaso'] = $sinCaso;
        $parametros['pestaña_activa'] = 'pgcsj';

        return $this->render('pgcsj/show.html.twig', $parametros);
    }
//---------------------------------------------------------------------
    #[Route('/{idCaso}/edit', name: 'app_pgcsj_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        int $idCaso,
        CasoRepository $casoRepository,
        CasoTabsDataProvider $tabsProvider,
        EntityManagerInterface $em): Response
        {
        $sinCaso=false;
        $caso = $casoRepository->find($idCaso);

        if (!$caso) {
            throw $this->createNotFoundException('Caso no encontrado.');
        } else {
    
        $tabsData = $tabsProvider->getData($caso);
        $pgcsj = $em->getRepository(Pgcsj::class)->findOneBy(['caso' => $caso]);
        }

        if (!$pgcsj) {
            return $this->redirectToRoute('app_pgcsj_new', ['idCaso' => $idCaso]);
        }

        $form = $this->createForm(PgcsjType::class, $pgcsj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            $this->addFlash('success_js', 'Formulario actualizado correctamente.');    
            return $this->redirectToRoute('app_caso_index');
        }

        $parametros['form'] = $form->createView();
        $parametros['caso'] = $caso;
        foreach ($tabsData as $clave => $valor) {
            $parametros[$clave] = $valor;
        }
        $parametros['sinCaso'] = $sinCaso;
        $parametros['pestaña_activa'] = 'pgcsj';

        return $this->render('pgcsj/edit.html.twig', $parametros);
    }

    #[Route('/{id}', name: 'app_pgcsj_delete', methods: ['POST'])]
    public function delete(Request $request, Pgcsj $pgcsj, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pgcsj->getId(), $request->request->get('_token'))) {
            $em->remove($pgcsj);
            $em->flush();
        }

        return $this->redirectToRoute('app_pgcsj_index');
    }
}
