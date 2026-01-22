<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ArchivoController extends AbstractController
{
    #[Route('/archivos/{nombre}', name: 'ver_archivo')]
    public function verArchivo(string $nombre): BinaryFileResponse
    {
        // Usamos el parámetro que ya tienes en tu services.yaml
        $directorio = $this->getParameter('archivos_directory');
        $rutaCompleta = $directorio . '/' . $nombre;

        if (!file_exists($rutaCompleta)) {
            throw $this->createNotFoundException('Buscando en: ' . $rutaCompleta);
        }

        $response = new BinaryFileResponse($rutaCompleta);
        
        // Esto permite que el PDF se abra en el navegador en lugar de descargarse
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $nombre
        );

        return $response;
    }
}