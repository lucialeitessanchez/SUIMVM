<?php

namespace App\Controller;

use App\Repository\OrganismoRepository;
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

        if ($security->isGranted('ROLE_ADMIN')) {
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
        Security $security
    ): Response {
        $user = $this->getUser();
        $organismoId = $request->query->get('organismo');

        if (!$security->isGranted('ROLE_ADMIN')) {
            $organismo = $user->getOrganismo();
        } else {
            $organismo = $organismoRepository->find($organismoId);
        }

        return new Response('Descargando datos de: ' . $organismo->getNombre());
    }
}