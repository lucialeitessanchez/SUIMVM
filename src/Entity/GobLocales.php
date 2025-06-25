<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'gob_locales')]
class GobLocales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_gob_locales', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'gobloc_1_1', type: 'boolean', nullable: true)]
    private ?bool $gobloc11 = null;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "goblocal_gobloc_1_2",
        joinColumns: [new ORM\JoinColumn(name: "goblocal_id", referencedColumnName: "id_gob_locales")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $gobloc12;

    #[ORM\Column(name: 'gobloc_1_3', type: 'string', nullable: true)]
    private ?string $gobloc13 = null;

   #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "goblocal_gobloc_1_4",
        joinColumns: [new ORM\JoinColumn(name: "goblocal_id", referencedColumnName: "id_gob_locales")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $gobloc14;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "goblocal_gobloc_1_5",
        joinColumns: [new ORM\JoinColumn(name: "goblocal_id", referencedColumnName: "id_gob_locales")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $gobloc15;

    #[ORM\Column(name: 'gobloc_1_6', type: 'boolean', nullable: true)]
    private ?bool $gobloc16 = null;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "goblocal_gobloc_1_6a",
        joinColumns: [new ORM\JoinColumn(name: "goblocal_id", referencedColumnName: "id_gob_locales")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $gobloc16a;

    #[ORM\Column(name: 'gobloc_1_7', type: 'boolean', nullable: true)]
    private ?bool $gobloc17 = null;

  #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "goblocal_gobloc_1_8",
        joinColumns: [new ORM\JoinColumn(name: "goblocal_id", referencedColumnName: "id_gob_locales")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $gobloc18;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "goblocal_gobloc_1_9",
        joinColumns: [new ORM\JoinColumn(name: "goblocal_id", referencedColumnName: "id_gob_locales")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $gobloc19;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "caso_id_caso", referencedColumnName: "id_caso", nullable: false)]
    private Caso $caso;

    #[ORM\Column(name: 'fecha_carga', type: 'datetime')]
    private \DateTimeInterface $fechaCarga;

    #[ORM\Column(name: 'usuario_carga', type: 'string', length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    // getters y setters...
    public function getId(): ?int
{
    return $this->id;
}

public function getGobloc11(): ?bool
{
    return $this->gobloc11;
}

public function setGobloc11(?bool $gobloc11): self
{
    $this->gobloc11 = $gobloc11;
    return $this;
}

public function __construct()
{
     $this->gobloc12 = new ArrayCollection();
     $this->gobloc14 = new ArrayCollection();
     $this->gobloc15 = new ArrayCollection();
     $this->gobloc16a = new ArrayCollection();
     $this->gobloc18 = new ArrayCollection();
     $this->gobloc19 = new ArrayCollection();
}

// Getter
public function getGobloc12(): Collection
{
    return $this->gobloc12;
}

// Add
public function addGobloc12(Nomenclador $nomenclador): self
{
    if (!$this->gobloc12->contains($nomenclador)) {
        $this->gobloc12->add($nomenclador);
    }

    return $this;
}

// Remove
public function removeGobloc12(Nomenclador $nomenclador): self
{
    $this->gobloc12->removeElement($nomenclador);
    return $this;
}


public function getGobloc13(): ?string
{
    return $this->gobloc13;
}

public function setGobloc13(?string $gobloc13): self
{
    $this->gobloc13 = $gobloc13;
    return $this;
}

public function getGobloc14(): Collection
{
    return $this->gobloc14;
}

// Add
public function addGobloc14(Nomenclador $nomenclador): self
{
    if (!$this->gobloc14->contains($nomenclador)) {
        $this->gobloc14->add($nomenclador);
    }

    return $this;
}

// Remove
public function removeGobloc14(Nomenclador $nomenclador): self
{
    $this->gobloc14->removeElement($nomenclador);
    return $this;
}


public function getGobloc15(): Collection
{
    return $this->gobloc15;
}

// Add
public function addGobloc15(Nomenclador $nomenclador): self
{
    if (!$this->gobloc15->contains($nomenclador)) {
        $this->gobloc15->add($nomenclador);
    }

    return $this;
}

// Remove
public function removeGobloc15(Nomenclador $nomenclador): self
{
    $this->gobloc15->removeElement($nomenclador);
    return $this;
}

public function getGobloc16(): ?bool
{
    return $this->gobloc16;
}

public function setGobloc16(?bool $gobloc16): self
{
    $this->gobloc16 = $gobloc16;
    return $this;
}

public function getGobloc16a(): Collection
{
    return $this->gobloc16a;
}

// Add
public function addGobloc16a(Nomenclador $nomenclador): self
{
    if (!$this->gobloc16a->contains($nomenclador)) {
        $this->gobloc16a->add($nomenclador);
    }

    return $this;
}

// Remove
public function removeGobloc16a(Nomenclador $nomenclador): self
{
    $this->gobloc16a->removeElement($nomenclador);
    return $this;
}

public function getGobloc17(): ?bool
{
    return $this->gobloc17;
}

public function setGobloc17(?bool $gobloc17): self
{
    $this->gobloc17 = $gobloc17;
    return $this;
}

public function getGobloc18(): Collection
{
    return $this->gobloc18;
}

// Add
public function addGobloc18(Nomenclador $nomenclador): self
{
    if (!$this->gobloc18->contains($nomenclador)) {
        $this->gobloc18->add($nomenclador);
    }

    return $this;
}

// Remove
public function removeGobloc18(Nomenclador $nomenclador): self
{
    $this->gobloc18->removeElement($nomenclador);
    return $this;
}

public function getGobloc19(): Collection
{
    return $this->gobloc19;
}

// Add
public function addGobloc19(Nomenclador $nomenclador): self
{
    if (!$this->gobloc19->contains($nomenclador)) {
        $this->gobloc19->add($nomenclador);
    }

    return $this;
}

// Remove
public function removeGobloc19(Nomenclador $nomenclador): self
{
    $this->gobloc19->removeElement($nomenclador);
    return $this;
}

public function getCaso(): Caso { return $this->caso; }
public function setCaso(Caso $caso): self { $this->caso = $caso; return $this; }

public function getFechaCarga(): \DateTimeInterface
{
    return $this->fechaCarga;
}

public function setFechaCarga(\DateTimeInterface $fechaCarga): self
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
