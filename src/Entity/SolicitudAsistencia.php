<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "solicitud_asistencia")]
class SolicitudAsistencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id_solicitud_asistencia = null;

    #[ORM\ManyToOne(targetEntity: Dp::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dp $dp_id_dp = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $dp_1_2 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $dp_1_3_id_nomenclador = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $dp_1_4_id_nomenclador = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_1_5 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_1_6 = null;

    #[ORM\Column(type: "text")]
    private ?string $dp_1_7 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_1_8 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_2_1 = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $dp_2_2 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_2_3 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $dp_2_4_id_nomenclador = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_2_5 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_2_6 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_3_1 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_3_2 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_3_3 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_3_4 = null;

    #[ORM\Column(type: "text")]
    private ?string $dp_3_5 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_4_1 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $dp_4_2_id_nomenclador = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $dp_4_3_id_nomenclador = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_4_4 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_4_5 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_5_1 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_5_2 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_5_3 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_5_4 = null;

    #[ORM\Column(type: "text")]
    private ?string $dp_5_5 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $dp_6_1 = null;

    #[ORM\Column(type: "text")]
    private ?string $dp_6_2 = null;

    #[ORM\Column(type: "text")]
    private ?string $dp_6_3 = null;

    // Getters y Setters
    public function getIdSolicitudAsistencia(): ?int { return $this->id_solicitud_asistencia; }
    public function getDpIdDp(): ?Dp { return $this->dp_id_dp; }
    public function setDpIdDp(?Dp $dp_id_dp): self { $this->dp_id_dp = $dp_id_dp; return $this; }
    public function getDp12(): ?\DateTimeInterface { return $this->dp_1_2; }
    public function setDp12(?\DateTimeInterface $dp_1_2): self { $this->dp_1_2 = $dp_1_2; return $this; }
    public function getDp13IdNomenclador(): ?Nomenclador { return $this->dp_1_3_id_nomenclador; }
    public function setDp13IdNomenclador(?Nomenclador $dp_1_3_id_nomenclador): self { $this->dp_1_3_id_nomenclador = $dp_1_3_id_nomenclador; return $this; }
    public function getDp14IdNomenclador(): ?Nomenclador { return $this->dp_1_4_id_nomenclador; }
    public function setDp14IdNomenclador(?Nomenclador $dp_1_4_id_nomenclador): self { $this->dp_1_4_id_nomenclador = $dp_1_4_id_nomenclador; return $this; }
    public function getDp15(): ?string { return $this->dp_1_5; }
    public function setDp15(string $dp_1_5): self {$this->dp_1_5 = $dp_1_5; return $this; }
    public function getDp16(): ?string { return $this->dp_1_6; }
    public function setDp16(string $dp_1_6): self {$this->dp_1_6 = $dp_1_6; return $this; }
    public function getDp17(): ?string { return $this->dp_1_7; }
    public function setDp17(string $dp_1_7): self {$this->dp_1_7 = $dp_1_7; return $this; }
    public function getDp18(): ?string { return $this->dp_1_8; }
    public function setDp18(string $dp_1_8): self {$this->dp_1_8 = $dp_1_8; return $this; }
    public function getDp21(): ?string { return $this->dp_2_1; }
    public function setDp21(string $dp_2_1): self {$this->dp_2_1 = $dp_2_1; return $this; }
    public function getDp22(): ?string { return $this->dp_2_2; }
    public function setDp22(string $dp_2_2): self {$this->dp_2_2 = $dp_2_2; return $this; }
    public function getDp23(): ?string { return $this->dp_2_3; }
    public function setDp23(string $dp_2_3): self {$this->dp_2_3 = $dp_2_3; return $this; }
    public function getDp24IdNomenclador(): ?Nomenclador { return $this->dp_2_4_id_nomenclador; }
    public function setDp24IdNomenclador(?Nomenclador $dp_2_4_id_nomenclador): self { $this->dp_2_4_id_nomenclador = $dp_2_4_id_nomenclador; return $this; }
    public function getDp25(): ?string { return $this->dp_2_5; }
    public function setDp25(string $dp_2_5): self {$this->dp_2_5 = $dp_2_5; return $this; }
    public function getDp26(): ?string { return $this->dp_2_6; }
    public function setDp26(string $dp_2_6): self {$this->dp_2_6 = $dp_2_6; return $this; }
    public function getDp31(): ?string { return $this->dp_3_1; }
    public function setDp31(string $dp_3_1): self {$this->dp_3_1 = $dp_3_1; return $this; }
    public function getDp32(): ?string { return $this->dp_3_2; }
    public function setDp32(string $dp_3_2): self {$this->dp_3_2 = $dp_3_2; return $this; }
    public function getDp33(): ?string { return $this->dp_3_3; }
    public function setDp33(string $dp_3_3): self {$this->dp_3_3 = $dp_3_3; return $this; }
    public function getDp34(): ?string { return $this->dp_3_4; }
    public function setDp34(string $dp_3_4): self {$this->dp_3_4 = $dp_3_4; return $this; }
    public function getDp35(): ?string { return $this->dp_3_5; }
    public function setDp35(string $dp_3_5): self {$this->dp_3_5 = $dp_3_5; return $this; }
    public function getDp41(): ?string { return $this->dp_4_1; }
    public function setDp41(string $dp_4_1): self {$this->dp_4_1 = $dp_4_1; return $this; }
    public function getDp42IdNomenclador(): ?Nomenclador { return $this->dp_4_2_id_nomenclador; }
    public function setDp42IdNomenclador(?Nomenclador $dp_4_2_id_nomenclador): self { $this->dp_4_2_id_nomenclador = $dp_4_2_id_nomenclador; return $this; }    
    public function getDp43IdNomenclador(): ?Nomenclador { return $this->dp_4_3_id_nomenclador; }
    public function setDp43IdNomenclador(?Nomenclador $dp_4_3_id_nomenclador): self { $this->dp_4_3_id_nomenclador = $dp_4_3_id_nomenclador; return $this; }    
    public function getDp44(): ?string { return $this->dp_4_4; }
    public function setDp44(string $dp_4_4): self {$this->dp_4_4 = $dp_4_4; return $this; }
    public function getDp45(): ?string { return $this->dp_4_5; }
    public function setDp45(string $dp_4_5): self {$this->dp_4_5 = $dp_4_5; return $this; }
    public function getDp51(): ?string { return $this->dp_5_1; }
    public function setDp51(string $dp_5_1): self {$this->dp_5_1 = $dp_5_1; return $this; }
    public function getDp52(): ?string { return $this->dp_5_2; }
    public function setDp52(string $dp_5_2): self {$this->dp_5_2 = $dp_5_2; return $this; }
    public function getDp53(): ?string { return $this->dp_5_3; }
    public function setDp53(string $dp_5_3): self {$this->dp_5_3 = $dp_5_3; return $this; }
    public function getDp54(): ?string { return $this->dp_5_4; }
    public function setDp54(string $dp_5_4): self {$this->dp_5_4 = $dp_5_4; return $this; }
    public function getDp55(): ?string { return $this->dp_5_5; }
    public function setDp55(string $dp_5_5): self {$this->dp_5_5 = $dp_5_5; return $this; }
    public function getDp61(): ?string { return $this->dp_6_1; }
    public function setDp61(string $dp_6_1): self {$this->dp_6_1 = $dp_6_1; return $this; }
    public function getDp62(): ?string { return $this->dp_6_2; }
    public function setDp62(string $dp_6_2): self {$this->dp_6_2 = $dp_6_2; return $this; }
    public function getDp63(): ?string { return $this->dp_6_3; }
    public function setDp63(string $dp_6_3): self {$this->dp_6_3 = $dp_6_3; return $this; }
    
}
