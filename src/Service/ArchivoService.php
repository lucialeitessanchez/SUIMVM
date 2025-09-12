<?php
namespace App\Service;

use App\Entity\ArchivableInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Archivo;
use App\Entity\Mpa;
use Doctrine\ORM\EntityManagerInterface;

class ArchivoService
{
    public function __construct(
        private string $archivosDirectory,
        private SluggerInterface $slugger,
        private EntityManagerInterface $entityManager
    ) {}

    public function guardarArchivoEntidad(UploadedFile $uploadedFile, ArchivableInterface $entidad): Archivo
{
    $nombreSeguro = $this->slugger->slug(pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME));
    $nuevoNombre = $nombreSeguro . '-' . uniqid() . '.' . $uploadedFile->guessExtension();

    // OBTENER METADATOS ANTES DEL MOVE
    $originalFilename = $uploadedFile->getClientOriginalName();
    $mimeType = $uploadedFile->getMimeType();
    $size = $uploadedFile->getSize();

    $uploadedFile->move($this->archivosDirectory, $nuevoNombre);

    $archivoEntity = new Archivo();
    $archivoEntity->setNombreArchivo($nuevoNombre);
    $archivoEntity->setOriginalName($originalFilename);
    $archivoEntity->setMimeType($mimeType);
    $archivoEntity->setSize($size);

    // Relacionar con la entidad concreta
    $entidad->addArchivo($archivoEntity);

    return $archivoEntity;
}
    public function getArchivosDirectory(): string
    {
        return $this->archivosDirectory;
    }

    public function eliminarArchivo(Archivo $archivo): void
    {
        // Borrar archivo físico
        $rutaArchivo = $this->archivosDirectory . '/' . $archivo->getNombreArchivo();
        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo);
        }

        // Borrar en la BD
        $this->entityManager->remove($archivo);
        $this->entityManager->flush();
    }

}
