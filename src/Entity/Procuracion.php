<?php

namespace App\Entity;

use App\Enum\TipoProcedimientosAsociados;
use App\Repository\ProcuracionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ProcuracionRepository::class)]
class Procuracion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $proc_1 = null;

    #[ORM\Column(length: 2)]
    private ?string $proc_2 = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $proc_3 = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $proc_4 = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $proc_5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proc_6 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $proc_7 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $proc_8 = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $proc_9 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $proc_11 = null;

    #[ORM\Column(enumType: TipoProcedimientosAsociados::class, nullable: true)]
    private ?TipoProcedimientosAsociados $proc_12 = null;

    #[ORM\Column]
    private ?int $proc_13 = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaCarga = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProc1(): ?string
    {
        return $this->proc_1;
    }

    public function setProc1(?string $proc_1): static
    {
        $this->proc_1 = $proc_1;

        return $this;
    }

    public function getProc2(): ?string
    {
        return $this->proc_2;
    }

    public function setProc2(string $proc_2): static
    {
        $this->proc_2 = $proc_2;

        return $this;
    }

    public function getProc3(): ?string
    {
        return $this->proc_3;
    }

    public function setProc3(?string $proc_3): static
    {
        $this->proc_3 = $proc_3;

        return $this;
    }

    public function getProc4(): ?string
    {
        return $this->proc_4;
    }

    public function setProc4(?string $proc_4): static
    {
        $this->proc_4 = $proc_4;

        return $this;
    }

    public function getProc5(): ?string
    {
        return $this->proc_5;
    }

    public function setProc5(?string $proc_5): static
    {
        $this->proc_5 = $proc_5;

        return $this;
    }

    public function getProc6(): ?string
    {
        return $this->proc_6;
    }

    public function setProc6(?string $proc_6): static
    {
        $this->proc_6 = $proc_6;

        return $this;
    }

    public function getProc7(): ?\DateTimeInterface
    {
        return $this->proc_7;
    }

    public function setProc7(?\DateTimeInterface $proc_7): static
    {
        $this->proc_7 = $proc_7;

        return $this;
    }

    public function getProc8(): ?\DateTimeInterface
    {
        return $this->proc_8;
    }

    public function setProc8(?\DateTimeInterface $proc_8): static
    {
        $this->proc_8 = $proc_8;

        return $this;
    }

    public function getProc9(): ?string
    {
        return $this->proc_9;
    }

    public function setProc9(?string $proc_9): static
    {
        $this->proc_9 = $proc_9;

        return $this;
    }

    public function getProc11(): ?string
    {
        return $this->proc_11;
    }

    public function setProc11(?string $proc_11): static
    {
        $this->proc_11 = $proc_11;

        return $this;
    }

    public function getProc12(): ?TipoProcedimientosAsociados
    {
        return $this->proc_12;
    }

    public function setProc12(?TipoProcedimientosAsociados $proc_12): static
    {
        $this->proc_12 = $proc_12;
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
