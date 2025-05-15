<?php

namespace App\Controller;

use App\Entity\Localidad;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class LocalidadController extends AbstractController
{
    #[Route('/localidad/{id}/info', name: 'localidad_info', methods: ['GET'])]
    public function getLocalidadInfo(int $id, EntityManagerInterface $em): JsonResponse
    {
        $localidad = $em->getRepository(Localidad::class)->find($id);
    
        if (!$localidad) {
            return $this->json(['error' => 'Localidad no encontrada'], 404);
        }
    
        return $this->json([
            'departamento' => $localidad->getDepartamento() ?? '',
            //'microregion' => $localidad->getMicroregion()?->getNombre() ?? '',
        ]);
    }
}
