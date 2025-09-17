<?php

namespace App\Entity;

use App\Repository\ArchivoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArchivoRepository::class)]
#[ORM\Table(name: "archivos")]
class Archivo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreArchivo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $originalName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mimeType = null;

    #[ORM\Column(nullable: true)]
    private ?int $size = null;
    
    #[ORM\ManyToOne(targetEntity: Mpa::class, inversedBy: 'archivos')]
    #[ORM\JoinColumn(name: 'mpa_id', referencedColumnName: 'id_mpa', nullable: true, onDelete: 'SET NULL')]
    private ?Mpa $mpa = null;
   // Relación con Smgyd
    #[ORM\ManyToOne(targetEntity: Smgyd::class, inversedBy: 'archivos')]
    #[ORM\JoinColumn(name: 'smgyd_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private ?Smgyd $smgyd = null;

    #[ORM\ManyToOne(targetEntity: Caj::class, inversedBy: 'archivos')]
    #[ORM\JoinColumn(name: 'caj_id', referencedColumnName: 'id_caj', nullable: true, onDelete: 'SET NULL')]
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

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(?string $originalName): static
    {
        $this->originalName = $originalName;

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
