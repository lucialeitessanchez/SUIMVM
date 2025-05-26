<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "sddnayf")]
class Sddnayf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id_sddnayf = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_6a = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_6c = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_7_1 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $sddnayf_7_3a_id_nomenclador = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_7_3b = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_7_3c = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_7_3d = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_7_3e = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_8a = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_8b = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_8c = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_8d = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_8e = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_8f = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_9_1 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_9_2 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_9_2a = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $sddnayf_9_2b = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_9_2c = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_10_1 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $sddnayf_10_2a_id_nomenclador = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_10_2b1 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_10_2b2 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_10_2b3 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_10_3a = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $sddnayf_10_3b = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caso $caso_id_caso = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaCarga = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    // Getters y Setters
    public function getIdSddnayf(): ?int { return $this->id_sddnayf; }
    public function getSddnayf6a(): ?string { return $this->sddnayf_6a; }
    public function setSddnayf6a(?string $sddnayf_6a): self { $this->sddnayf_6a = $sddnayf_6a; return $this; }
    public function getSddnayf6c(): ?string { return $this->sddnayf_6c; }
    public function setSddnayf6c(?string $sddnayf_6c): self { $this->sddnayf_6c = $sddnayf_6c; return $this; }
    public function getSddnayf71(): ?string { return $this->sddnayf_7_1; }
    public function setSddnayf71(?string $sddnayf_7_1): self { $this->sddnayf_7_1 = $sddnayf_7_1; return $this; }
    public function getSddnayf73aIdNomenclador(): ?Nomenclador { return $this->sddnayf_7_3a_id_nomenclador; }
    public function setSddnayf73aIdNomenclador(?Nomenclador $sddnayf_7_3a_id_nomenclador): self { $this->sddnayf_7_3a_id_nomenclador = $sddnayf_7_3a_id_nomenclador; return $this; }
    public function getSddnayf73b(): ?string { return $this->sddnayf_7_3b; }
    public function setSddnayf73b(?string $sddnayf_7_3b): self { $this->sddnayf_7_3b = $sddnayf_7_3b; return $this; }
    public function getSddnayf73c(): ?string { return $this->sddnayf_7_3c; }
    public function setSddnayf73c(?string $sddnayf_7_3c): self { $this->sddnayf_7_3c = $sddnayf_7_3c; return $this; }
    public function getSddnayf73d(): ?string { return $this->sddnayf_7_3d; }
    public function setSddnayf73d(?string $sddnayf_7_3d): self { $this->sddnayf_7_3d = $sddnayf_7_3d; return $this; }
    public function getSddnayf73e(): ?string { return $this->sddnayf_7_3e; }
    public function setSddnayf73e(?string $sddnayf_7_3e): self { $this->sddnayf_7_3e = $sddnayf_7_3e; return $this; }
    public function getSddnayf8a(): ?string { return $this->sddnayf_8a; }
    public function setSddnayf8a(?string $sddnayf_8a): self { $this->sddnayf_8a = $sddnayf_8a; return $this; }
    public function getSddnayf8b(): ?string { return $this->sddnayf_8b; }
    public function setSddnayf8b(?string $sddnayf_8b): self { $this->sddnayf_8b = $sddnayf_8b; return $this; }
    public function getSddnayf8c(): ?string { return $this->sddnayf_8c; }
    public function setSddnayf8c(?string $sddnayf_8c): self { $this->sddnayf_8c = $sddnayf_8c; return $this; }
    public function getSddnayf8d(): ?string { return $this->sddnayf_8d; }
    public function setSddnayf8d(?string $sddnayf_8d): self { $this->sddnayf_8d = $sddnayf_8d; return $this; }
    public function getSddnayf8e(): ?string { return $this->sddnayf_8e; }
    public function setSddnayf8e(?string $sddnayf_8e): self { $this->sddnayf_8e = $sddnayf_8e; return $this; }
    public function getSddnayf8f(): ?string { return $this->sddnayf_8f; }
    public function setSddnayf8f(?string $sddnayf_8f): self { $this->sddnayf_8f = $sddnayf_8f; return $this; }
    public function getSddnayf91(): ?string { return $this->sddnayf_9_1; }
    public function setSddnayf91(?string $sddnayf_9_1): self { $this->sddnayf_9_1 = $sddnayf_9_1; return $this; }
    public function getSddnayf92(): ?string { return $this->sddnayf_9_2; }
    public function setSddnayf92(?string $sddnayf_9_2): self { $this->sddnayf_9_2 = $sddnayf_9_2; return $this; }
    public function getSddnayf92a(): ?string { return $this->sddnayf_9_2a; }
    public function setSddnayf92a(?string $sddnayf_9_2a): self { $this->sddnayf_9_2a = $sddnayf_9_2a; return $this; }
    public function getSddnayf92b(): ?string { return $this->sddnayf_9_2b; }
    public function setSddnayf92b(?string $sddnayf_9_2b): self { $this->sddnayf_9_2b = $sddnayf_9_2b; return $this; }
    public function getSddnayf92c(): ?string { return $this->sddnayf_9_2c; }
    public function setSddnayf92c(?string $sddnayf_9_2c): self { $this->sddnayf_9_2c = $sddnayf_9_2c; return $this; }
    public function getSddnayf101(): ?string { return $this->sddnayf_10_1; }
    public function setSddnayf101(?string $sddnayf_10_1): self { $this->sddnayf_10_1 = $sddnayf_10_1; return $this; }
    public function getSddnayf102aIdNomenclador(): ?Nomenclador { return $this->sddnayf_10_2a_id_nomenclador; }
    public function setSddnayf102aIdNomenclador(?Nomenclador $sddnayf_10_2a_id_nomenclador): self { $this->sddnayf_10_2a_id_nomenclador = $sddnayf_10_2a_id_nomenclador; return $this; }
    
    public function getSddnayf102b1(): ?string { return $this->sddnayf_10_2b1; }
    public function setSddnayf102b1(?string $sddnayf_10_2b1): self { $this->sddnayf_10_2b1 = $sddnayf_10_2b1; return $this; }
    public function getSddnayf102b2(): ?string { return $this->sddnayf_10_2b2; }
    public function setSddnayf102b2(?string $sddnayf_10_2b2): self { $this->sddnayf_10_2b2 = $sddnayf_10_2b2; return $this; }
    public function getSddnayf102b3(): ?string { return $this->sddnayf_10_2b3; }
    public function setSddnayf102b3(?string $sddnayf_10_2b3): self { $this->sddnayf_10_2b3 = $sddnayf_10_2b3; return $this; }

    public function getSddnayf103a(): ?string { return $this->sddnayf_10_3a; }
    public function setSddnayf103a(?string $sddnayf_10_3a): self { $this->sddnayf_10_3a = $sddnayf_10_3a; return $this; }
    public function getSddnayf103b(): ?string { return $this->sddnayf_10_3b; }
    public function setSddnayf103b(?string $sddnayf_10_3b): self { $this->sddnayf_10_3b = $sddnayf_10_3b; return $this; }

    public function getCasoIdCaso(): ?Caso { return $this->caso_id_caso; }
    public function setCasoIdCaso(?Caso $caso_id_caso): self { $this->caso_id_caso = $caso_id_caso; return $this; }
    
    public function getFechaCarga(): ?\DateTimeInterface { return $this->fechaCarga; }
    public function setFechaCarga(?\DateTimeInterface $fechaCarga): self { $this->fechaCarga = $fechaCarga; return $this; }

    public function getUsuarioCarga(): ?string { return $this->usuarioCarga; }
    public function setUsuarioCarga(?string $usuarioCarga): self { $this->usuarioCarga = $usuarioCarga; return $this; }

    // Agregar los demás getters y setters aquí...
}
