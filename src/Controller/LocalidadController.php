<?php
// src/Controller/LocalidadController.php

namespace App\Controller;

use App\Entity\Localidad;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/localidad')]
class LocalidadController extends AbstractController
{
    #[Route('/{id}/info', name: 'localidad_info')]
    public function info(int $id, EntityManagerInterface $em): JsonResponse
    {
        $localidad = $em->getRepository(Localidad::class)->find($id);

        if (!$localidad) {
            return new JsonResponse(['error' => 'Localidad no encontrada'], 404);
        }

        $departamento = $localidad->getDepartamento();
        $microregion=$localidad->getMicroregion();

        return new JsonResponse([
            'departamento' => $departamento ,
            'microregion'=>$microregion,
        ]);
    }
}
