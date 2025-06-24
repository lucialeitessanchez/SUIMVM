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

    #[ORM\Column(name: 'gobloc_1_1', type: 'string', nullable: true)]
    private ?string $gobloc11 = null;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "goblocal_gobloc_1_2",
        joinColumns: [new ORM\JoinColumn(name: "goblocal_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $gobloc12;

    #[ORM\Column(name: 'gobloc_1_3', type: 'string', nullable: true)]
    private ?string $gobloc13 = null;

    #[ORM\Column(name: 'gobloc_1_4', type: 'string', nullable: true)]
    private ?string $gobloc14 = null;

    #[ORM\Column(name: 'gobloc_1_5', type: 'string', nullable: true)]
    private ?string $gobloc15 = null;

    #[ORM\Column(name: 'gobloc_1_6', type: 'boolean', nullable: true)]
    private ?bool $gobloc16 = null;

    #[ORM\Column(name: 'gobloc_1_6a', type: 'string', nullable: true)]
    private ?string $gobloc16a = null;

    #[ORM\Column(name: 'gobloc_1_7', type: 'boolean', nullable: true)]
    private ?bool $gobloc17 = null;

    #[ORM\Column(name: 'gobloc_1_8', type: 'string', nullable: true)]
    private ?string $gobloc18 = null;

    #[ORM\Column(name: 'gobloc_1_9', type: 'string', nullable: true)]
    private ?string $gobloc19 = null;

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

public function getGobloc11(): ?string
{
    return $this->gobloc11;
}

public function setGobloc11(?string $gobloc11): self
{
    $this->gobloc11 = $gobloc11;
    return $this;
}

public function __construct()
{
    $this->gobloc12 = new ArrayCollection();
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

public function getGobloc14(): ?string
{
    return $this->gobloc14;
}

public function setGobloc14(?string $gobloc14): self
{
    $this->gobloc14 = $gobloc14;
    return $this;
}

public function getGobloc15(): ?string
{
    return $this->gobloc15;
}

public function setGobloc15(?string $gobloc15): self
{
    $this->gobloc15 = $gobloc15;
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

public function getGobloc16a(): ?string
{
    return $this->gobloc16a;
}

public function setGobloc16a(?string $gobloc16a): self
{
    $this->gobloc16a = $gobloc16a;
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

public function getGobloc18(): ?string
{
    return $this->gobloc18;
}

public function setGobloc18(?string $gobloc18): self
{
    $this->gobloc18 = $gobloc18;
    return $this;
}

public function getGobloc19(): ?string
{
    return $this->gobloc19;
}

public function setGobloc19(?string $gobloc19): self
{
    $this->gobloc19 = $gobloc19;
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
