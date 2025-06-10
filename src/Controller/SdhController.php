<?php
namespace App\Controller;

use App\Entity\Sdh;
use App\Entity\Caso;
use App\Entity\Nomenclador;
use App\Entity\SdhTipoTrata;
use App\Form\SdhType;
use App\Repository\CasoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[Route('/sdh')]
class SdhController extends AbstractController
{
    #[Route('/new_sdh', name: 'sdh_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, CasoRepository $casoRepo, SessionInterface $session): Response
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
            if (!$caso) {
                $this->addFlash('error', 'El caso seleccionado no existe.');
                $sinCaso = true;
            }
        }

        $sdh = new Sdh();
       
        $sdh->setFechaCarga(new \DateTime());
       // $sdh->setUsuarioCarga($this->getUser()?->getUserIdentifier());

        $form = $this->createForm(SdhType::class, $sdh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            //seteo usuario carga
            $sdh->setUsuarioCarga("prueba");
            $sdh->setFechaCarga(new \DateTime());
            if (!$sinCaso)
                    $sdh->setCasoIdCaso($caso); 
            
            $valoresSeleccionadosArray = $data->getSdh12IdNomenclador(); // Collection o array
            if (is_array($valoresSeleccionadosArray)) {
                foreach ($valoresSeleccionadosArray as $valor) {
                    // hacer algo con cada $valor
                    $tipo = new SdhTipoTrata();
                    $nomenclador=$em->getRepository(Nomenclador::class)->find($valor);
                    $tipo->setSdh($sdh);
                    $tipo->setNomenclador($nomenclador);
                    $em->persist($tipo);
                    $em->flush(); // Este flush guarda los MpaTipoViolencia
                }
            }
            $em->persist($sdh);
            $em->flush();

                // Obtener el array desde el campo hidden
        $tiposTrataJson = $request->request->get('tiposTrata');
       
        $tiposTratarray = json_decode($tiposTrataJson, true);

        // Guardar los tipos de violencia
        if (is_array($tiposTratarray)) {
            foreach ($tiposTratarray as $int) {
                $tipo = new SdhTipoTrata();
                $tipo->setSdh($sdh);
                $tipo->setNomenclador($int);
                $em->persist($tipo);
                $em->flush(); // Este flush guarda los SdhTipoTrata
            }
        
            return $this->redirectToRoute('sdh_new', [ 'mensaje' => 'Registro guardado']);
        }
    }
        $parametros['form'] = $form->createView();
        $parametros['sinCaso'] = $sinCaso;
        return $this->render('sdh/new.html.twig', $parametros);
        
    }
}
