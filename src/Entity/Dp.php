<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;

use App\Repository\DpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DpRepository::class)]
class Dp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_dp = null;

    #[ORM\Column(length: 2)]
    private ?string $dp_1_1 = null;

    // Relación ManyToOne con Caso
    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso', nullable: false)]
    private ?Caso $caso = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaCarga = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    public function getId(): ?int
    {
        return $this->id_dp;
    }

    public function getDp11(): ?string
    {
        return $this->dp_1_1;
    }

    public function setDp11(string $dp_1_1): static
    {
        $this->dp_1_1 = $dp_1_1;
        return $this;
    }

    // Getter y Setter para la relación
    public function getCaso(): ?Caso
    {
        return $this->caso;
    }

    public function setCaso(?Caso $caso): static
    {
        $this->caso = $caso;
        return $this;
    }

    public function getFechaCarga(): ?\DateTimeInterface
    {
        return $this->fechaCarga;
    }

    public function setFechaCarga(?\DateTimeInterface $fechaCarga): self
    {
        $this->fechaCarga = $fechaCarga;
        return $this;
    }

    public function getUsuarioCarga(): ?string
    {
        return $this->usuarioCarga;
    }

    public function setUsuarioCarga(?string $usuarioCarga): self
    {
        $this->usuarioCarga = $usuarioCarga;
        return $this;
    }


}
