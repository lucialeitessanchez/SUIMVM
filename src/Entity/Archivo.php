<?php

namespace App\Entity;

use App\Repository\ArchivoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArchivoRepository::class)]
class Archivo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreArchivo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $originalFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mimeType = null;

    #[ORM\Column(nullable: true)]
    private ?int $size = null;

    #[ORM\ManyToOne(inversedBy: 'archivos')]
    private ?Mpa $mpa = null;

    #[ORM\ManyToOne(inversedBy: 'archivos')]
    private ?Smgyd $smgyd = null;

    #[ORM\ManyToOne(inversedBy: 'archivos')]
    private ?Caj $caj = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreArchivo(): ?string
    {
        return $this->nombreArchivo;
    }

    public function setNombreArchivo(string $nombreArchivo): static
    {
        $this->nombreArchivo = $nombreArchivo;

        return $this;
    }

    public function getOriginalFilename(): ?string
    {
        return $this->originalFilename;
    }

    public function setOriginalFilename(?string $originalFilename): static
    {
        $this->originalFilename = $originalFilename;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(?string $mimeType): static
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getMpa(): ?Mpa
    {
        return $this->mpa;
    }

    public function setMpa(?Mpa $mpa): static
    {
        $this->mpa = $mpa;

        return $this;
    }

    public function getSmgyd(): ?Smgyd
    {
        return $this->smgyd;
    }

    public function setSmgyd(?Smgyd $smgyd): static
    {
        $this->smgyd = $smgyd;

        return $this;
    }

    public function getCaj(): ?Caj
    {
        return $this->caj;
    }

    public function setCaj(?Caj $caj): static
    {
        $this->caj = $caj;

        return $this;
    }
}
