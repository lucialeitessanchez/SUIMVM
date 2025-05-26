<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SmgydRepository;

#[ORM\Entity(repositoryClass: SmgydRepository::class)]
#[ORM\Table(name: 'smgyd')]
class Smgyd
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $idSmgyd;

    #[ORM\Column(type: 'string')]
    private string $smgyd1;

    #[ORM\Column(type: 'string')]
    private string $smgyd2;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd3 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd4 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd5 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd6 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'smgyd_7_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $smgyd7IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'smgyd_8_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $smgyd8IdNomenclador = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd9 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd10 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $smgyd11 = null;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private ?string $smgyd12 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'smgyd_13_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $smgyd13IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'smgyd_14_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $smgyd14IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'smgyd_15_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $smgyd15IdNomenclador = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd16 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd17 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd18 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd19 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd20 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'smgyd_21_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $smgyd21IdNomenclador = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $smgyd22 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd23 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd24 = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso', nullable: true)]
    private ?Caso $casoIdCaso = null;


    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $fechaCarga = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    // Getters and Setters

    public function getIdSmgyd(): int
    {
        return $this->idSmgyd;
    }

    public function getSmgyd1(): string
    {
        return $this->smgyd1;
    }

    public function setSmgyd1(string $smgyd1): self
    {
        $this->smgyd1 = $smgyd1;
        return $this;
    }

    public function getSmgyd2(): string
    {
        return $this->smgyd2;
    }

    public function setSmgyd2(string $smgyd2): self
    {
        $this->smgyd2 = $smgyd2;
        return $this;
    }

    public function getSmgyd3(): ?string
    {
        return $this->smgyd3;
    }

    public function setSmgyd3(?string $smgyd3): self
    {
        $this->smgyd3 = $smgyd3;
        return $this;
    }

    public function getSmgyd4(): ?string
    {
        return $this->smgyd4;
    }

    public function setSmgyd4(?string $smgyd4): self
    {
        $this->smgyd4 = $smgyd4;
        return $this;
    }

    public function getSmgyd5(): ?string
    {
        return $this->smgyd5;
    }

    public function setSmgyd5(?string $smgyd5): self
    {
        $this->smgyd5 = $smgyd5;
        return $this;
    }

    public function getSmgyd6(): ?string
    {
        return $this->smgyd6;
    }

    public function setSmgyd6(?string $smgyd6): self
    {
        $this->smgyd6 = $smgyd6;
        return $this;
    }

    public function getSmgyd7IdNomenclador(): ?Nomenclador
    {
        return $this->smgyd7IdNomenclador;
    }

    public function setSmgyd7IdNomenclador(?Nomenclador $smgyd7IdNomenclador): self
    {
        $this->smgyd7IdNomenclador = $smgyd7IdNomenclador;
        return $this;
    }

    public function getSmgyd8IdNomenclador(): ?Nomenclador
    {
        return $this->smgyd8IdNomenclador;
    }

    public function setSmgyd8IdNomenclador(?Nomenclador $smgyd8IdNomenclador): self
    {
        $this->smgyd8IdNomenclador = $smgyd8IdNomenclador;
        return $this;
    }

    public function getSmgyd9(): ?string
    {
        return $this->smgyd9;
    }

    public function setSmgyd9(?string $smgyd9): self
    {
        $this->smgyd9 = $smgyd9;
        return $this;
    }

    public function getSmgyd10(): ?string
    {
        return $this->smgyd10;
    }

    public function setSmgyd10(?string $smgyd10): self
    {
        $this->smgyd10 = $smgyd10;
        return $this;
    }

    public function getSmgyd11(): ?string
    {
        return $this->smgyd11;
    }

    public function setSmgyd11(?string $smgyd11): self
    {
        $this->smgyd11 = $smgyd11;
        return $this;
    }

    public function getSmgyd12(): ?string
    {
        return $this->smgyd12;
    }

    public function setSmgyd12(?string $smgyd12): self
    {
        $this->smgyd12 = $smgyd12;
        return $this;
    }

    public function getSmgyd13IdNomenclador(): ?Nomenclador
    {
        return $this->smgyd13IdNomenclador;
    }

    public function setSmgyd13IdNomenclador(?Nomenclador $smgyd13IdNomenclador): self
    {
        $this->smgyd13IdNomenclador = $smgyd13IdNomenclador;
        return $this;
    }

    public function getSmgyd14IdNomenclador(): ?Nomenclador
    {
        return $this->smgyd14IdNomenclador;
    }

    public function setSmgyd14IdNomenclador(?Nomenclador $smgyd14IdNomenclador): self
    {
        $this->smgyd14IdNomenclador = $smgyd14IdNomenclador;
        return $this;
    }

    public function getSmgyd15IdNomenclador(): ?Nomenclador
    {
        return $this->smgyd15IdNomenclador;
    }

    public function setSmgyd15IdNomenclador(?Nomenclador $smgyd15IdNomenclador): self
    {
        $this->smgyd15IdNomenclador = $smgyd15IdNomenclador;
        return $this;
    }

    public function getSmgyd16(): ?string
    {
        return $this->smgyd16;
    }

    public function setSmgyd16(?string $smgyd16): self
    {
        $this->smgyd16 = $smgyd16;
        return $this;
    }

    public function getSmgyd17(): ?string
    {
        return $this->smgyd17;
    }

    public function setSmgyd17(?string $smgyd17): self
    {
        $this->smgyd17 = $smgyd17;
        return $this;
    }

    public function getSmgyd18(): ?string
    {
        return $this->smgyd18;
    }

    public function setSmgyd18(?string $smgyd18): self
    {
        $this->smgyd18 = $smgyd18;
        return $this;
    }

    public function getSmgyd19(): ?string
    {
        return $this->smgyd19;
    }

    public function setSmgyd19(?string $smgyd19): self
    {
        $this->smgyd19 = $smgyd19;
        return $this;
    }

    public function getSmgyd20(): ?string
    {
        return $this->smgyd20;
    }

    public function setSmgyd20(?string $smgyd20): self
    {
        $this->smgyd20 = $smgyd20;
        return $this;
    }

    public function getSmgyd21IdNomenclador(): ?Nomenclador
    {
        return $this->smgyd21IdNomenclador;
    }

    public function setSmgyd21IdNomenclador(?Nomenclador $smgyd21IdNomenclador): self
    {
        $this->smgyd21IdNomenclador = $smgyd21IdNomenclador;
        return $this;
    }

    public function getSmgyd22(): ?string
    {
        return $this->smgyd22;
    }

    public function setSmgyd22(?string $smgyd22): self
    {
        $this->smgyd22 = $smgyd22;
        return $this;
    }

    public function getSmgyd23(): ?string
    {
        return $this->smgyd23;
    }

    public function setSmgyd23(?string $smgyd23): self
    {
        $this->smgyd23 = $smgyd23;
        return $this;
    }

    public function getSmgyd24(): ?string
    {
        return $this->smgyd24;
    }

    public function setSmgyd24(?string $smgyd24): self
    {
        $this->smgyd24 = $smgyd24;
        return $this;
    }

    public function getCasoIdCaso(): ?Caso
    {
        return $this->casoIdCaso;
    }

    public function setCasoIdCaso(?Caso $casoIdCaso): self
    {
        $this->casoIdCaso = $casoIdCaso;
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
