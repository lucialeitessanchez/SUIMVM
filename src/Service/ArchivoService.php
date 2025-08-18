<?php
namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Archivo;
use App\Entity\Mpa;

class ArchivoService
{
    public function __construct(
        private string $archivosDirectory,
        private SluggerInterface $slugger
    ) {}

    public function guardarArchivoEntidad(UploadedFile $uploadedFile, Mpa $mpa): Archivo
    {
        $nombreSeguro = $this->slugger->slug(pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME));
        $nuevoNombre = $nombreSeguro . '-' . uniqid() . '.' . $uploadedFile->guessExtension();

        $uploadedFile->move($this->archivosDirectory, $nuevoNombre);

        $archivoEntity = new Archivo();
        $archivoEntity->setNombreArchivo($nuevoNombre);
        $archivoEntity->setOriginalFilename($uploadedFile->getClientOriginalName());
        $archivoEntity->setMimeType($uploadedFile->getMimeType());
        $archivoEntity->setSize($uploadedFile->getSize());
        $archivoEntity->setMpa($mpa);

        return $archivoEntity;
    }
}
