<?php
// src/Controller/LocalidadController.php

namespace App\Controller;

use App\Entity\Localidad;
use App\Repository\LocalidadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

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


    // src/Controller/LocalidadController.php
        #[Route('/buscar-localidades', name: 'buscar_localidades')]
        public function buscarLocalidades(Request $request, LocalidadRepository $repo): JsonResponse
        {
            $term = $request->query->get('term');
            $resultados = $repo->createQueryBuilder('l')
                ->where('l.localidad LIKE :term')
                ->setParameter('term', '%' . $term . '%')
                ->setMaxResults(20)
                ->getQuery()
                ->getResult();

            $json = [];
            foreach ($resultados as $localidad) {
                $json[] = [
                    'id' => $localidad->getIdLocalidad(),
                    'text' => $localidad->getLocalidad(),
                ];
            }

            return $this->json(['results' => $json]);
        }

}
