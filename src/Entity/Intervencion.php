<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "intervencion")]
class Intervencion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id_intervencion = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_1a = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sddnayf_2a_id_nomenclador", referencedColumnName: "id", nullable: false)]
    private ?Nomenclador $sddnayf_2a = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_2b = null;

    #[ORM\Column(type: "text")]
    private ?string $sddnayf_2c = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_3_1a = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $sddnayf_3_1b = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_3_1c = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_3_1d = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_3_2a = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_3_2b = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_3_2c = null;

    // Getters y Setters
    public function getIdIntervencion(): ?int
    {
        return $this->id_intervencion;
    }

    public function getSddnayf1a(): ?string
    {
        return $this->sddnayf_1a;
    }

    public function setSddnayf1a(string $sddnayf_1a): self
    {
        $this->sddnayf_1a = $sddnayf_1a;
        return $this;
    }

    public function getSddnayf2a(): ?Nomenclador
    {
        return $this->sddnayf_2a;
    }

    public function setSddnayf2a(?Nomenclador $sddnayf_2a): self
    {
        $this->sddnayf_2a = $sddnayf_2a;
        return $this;
    }

    public function getSddnayf2b(): ?string
    {
        return $this->sddnayf_2b;
    }

    public function setSddnayf2b(string $sddnayf_2b): self
    {
        $this->sddnayf_2b = $sddnayf_2b;
        return $this;
    }

    public function getSddnayf2c(): ?string
    {
        return $this->sddnayf_2c;
    }

    public function setSddnayf2c(string $sddnayf_2c): self
    {
        $this->sddnayf_2c = $sddnayf_2c;
        return $this;
    }

    public function getSddnayf31a(): ?string
    {
        return $this->sddnayf_3_1a;
    }

    public function setSddnayf31a(string $sddnayf_3_1a): self
    {
        $this->sddnayf_3_1a = $sddnayf_3_1a;
        return $this;
    }

    public function getSddnayf31b(): ?\DateTimeInterface
    {
        return $this->sddnayf_3_1b;
    }

    public function setSddnayf31b(\DateTimeInterface $sddnayf_3_1b): self
    {
        $this->sddnayf_3_1b = $sddnayf_3_1b;
        return $this;
    }

    public function getSddnayf31c(): ?string
    {
        return $this->sddnayf_3_1c;
    }

    public function setSddnayf31c(string $sddnayf_3_1c): self
    {
        $this->sddnayf_3_1c = $sddnayf_3_1c;
        return $this;
    }

    public function getSddnayf31d(): ?string
    {
        return $this->sddnayf_3_1d;
    }

    public function setSddnayf31d(string $sddnayf_3_1d): self
    {
        $this->sddnayf_3_1d = $sddnayf_3_1d;
        return $this;
    }

    public function getSddnayf32a(): ?string
    {
        return $this->sddnayf_3_2a;
    }

    public function setSddnayf32a(string $sddnayf_3_2a): self
    {
        $this->sddnayf_3_2a = $sddnayf_3_2a;
        return $this;
    }

    public function getSddnayf32b(): ?string
    {
        return $this->sddnayf_3_2b;
    }

    public function setSddnayf32b(string $sddnayf_3_2b): self
    {
        $this->sddnayf_3_2b = $sddnayf_3_2b;
        return $this;
    }

    public function getSddnayf32c(): ?string
    {
        return $this->sddnayf_3_2c;
    }

    public function setSddnayf32c(string $sddnayf_3_2c): self
    {
        $this->sddnayf_3_2c = $sddnayf_3_2c;
        return $this;
    }
}
