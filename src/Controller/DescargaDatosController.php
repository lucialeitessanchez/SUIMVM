<?php

namespace App\Controller;

use App\Repository\OrganismoRepository;
use App\Repository\MpaRepository;
use App\Repository\CajRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;

#[Route('/descarga')]
class DescargaDatosController extends AbstractController
{
    #[Route('/', name: 'app_descarga')]
    public function index(
        OrganismoRepository $organismoRepository,
        Security $security
    ): Response {
        $user = $this->getUser();

        if ($security->isGranted('ROLE_MIGYD_ADMIN')) {
            $organismos = $organismoRepository->findAll();
        } else {
            $organismos = [[
                'idOrganismo' => $user->getIdOrganismo(),
                'nombreOrganismo' => $user->getNombreOrganismo()
            ]];
        }

        return $this->render('descargaDatos/index.html.twig', [
            'organismos' => $organismos
        ]);
    }

    #[Route('/export', name: 'app_descarga_export')]
    public function export(
        Request $request,
        OrganismoRepository $organismoRepository,
        MpaRepository $mpaRepository,
        CajRepository $cajRepository,
        Security $security
    ): Response {

        $user = $this->getUser();
        $organismoId = $request->query->get('organismo');
        
        // 🔐 Seguridad
        if (!$security->isGranted('ROLE_MIGYD_ADMIN')) {
            $organismoId = $user->getIdOrganismo();
        } else {
            $organismo = $organismoRepository->find($organismoId);
        }
            // 👉 SIEMPRE traemos el objeto
        $organismo = $organismoRepository->find($organismoId);

        if (!$organismo) {
            throw $this->createNotFoundException('Organismo no encontrado');
        }

        $organismoNombre = $organismo->getNombreOrganismo();

        $datos = [];

        // 🧠 Resolución por organismo (simple y clara)
        if ($organismoId == 2) {
            // MPA
            $mpas = $mpaRepository->findByOrganismo($organismo);
   
            foreach ($mpas as $mpa) {
                $caso = $mpa->getCaso();

                $datos[] = [
                    'Caso ID' => $caso->getIdCaso(),
                    'Fecha' => $mpa->getFechaCarga()?->format('Y-m-d'),
                  //  'Campo X' => $mpa->getMpa3(),
                ];
            }
        }

        if ($organismoId == 1) {
            // CAJ
            $cajs = $cajRepository->findByOrganismo($organismoId);

            foreach ($cajs as $caj) {
                $caso = $caj->getCaso();

                $datos[] = [
                    'Caso ID' => $caso->getIdCaso(),
                    'Campo CAJ' => $caj->getOtroCampo(),
                ];
            }
        }

        // ⚠️ Podés seguir agregando organismos acá sin romper nada

        // 📥 CSV
        $output = fopen('php://temp', 'r+');

        if (!empty($datos)) {
            fputcsv($output, array_keys($datos[0]));
            foreach ($datos as $fila) {
                fputcsv($output, $fila);
            }
        }

        rewind($output);
        $contenido = stream_get_contents($output);
        fclose($output);

        return new Response($contenido, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="reporte_'.$organismoNombre.'.csv"',
        ]);
    }
}