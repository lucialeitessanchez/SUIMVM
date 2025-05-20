<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PersonaRepository;

#[Route('/persona')]
class PersonaController extends AbstractController
{
    #[Route('/verificar-dni', name: 'persona_verificar_dni', methods: ['GET'])]
    public function verificarDni(Request $request, PersonaRepository $personaRepository): JsonResponse
    {
        $nrodoc = $request->query->get('nrodoc');

        $persona = $personaRepository->findOneBy(['nrodoc' => $nrodoc]);

        return new JsonResponse([
            'existe' => $persona !== null,
        ]);
    }
}