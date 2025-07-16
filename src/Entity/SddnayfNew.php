<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Nomenclador;
use App\Entity\SddnayfHijosVictima;

#[ORM\Entity]
#[ORM\Table(name: 'sddnayf_new')]
class SddnayfNew
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $sddnayf_1a = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sddnayf_1d = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $sddnayf_1fa = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $sddnayf_1fb = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sddnayf_1g = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sddnayf_1h = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $sddnayf_1i = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sddnayf_2a = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sddnayf_2d = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $sddnayf_2fa = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $sddnayf_2fb = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sddnayf_2g = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sddnayf_2h = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $sddnayf_2i = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso', nullable: false, onDelete: 'CASCADE')]
    private ?Caso $caso = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $fechacarga = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $usuariocarga = null;

    //oneTomany
    #[ORM\OneToMany(mappedBy: 'sddnayfNew', targetEntity: SddnayfHijosVictima::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $hijosVictima;

    //manyTomany
    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_1b',
        joinColumns: [new ORM\JoinColumn(name: 'sddnayf_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf_1b;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_1c',
        joinColumns: [new ORM\JoinColumn(name: 'sddnayf_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf_1c;

    //item 2
    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_2b',
        joinColumns: [new ORM\JoinColumn(name: 'sddnayf_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf_2b;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_2c',
        joinColumns: [new ORM\JoinColumn(name: 'sddnayf_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf_2c;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_2e',
        joinColumns: [new ORM\JoinColumn(name: 'sddnayf_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf_2e;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_1e',
        joinColumns: [new ORM\JoinColumn(name: 'sddnayf_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf_1e;

    public function __construct()
        {
            $this->sddnayf_1b = new ArrayCollection();
            $this->sddnayf_1c = new ArrayCollection();
            $this->sddnayf_1e = new ArrayCollection();
            $this->sddnayf_2b = new ArrayCollection();
            $this->sddnayf_2c = new ArrayCollection();
            $this->sddnayf_2e = new ArrayCollection();
            $this->hijosVictima = new ArrayCollection();
        }

    /**
     * @return Collection|SddnayfHijosVictima[]
     */

    // Getters y Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSddnayf1a(): ?string
    {
        return $this->sddnayf_1a;
    }

    public function setSddnayf1a(?string $sddnayf_1a): self
    {
        $this->sddnayf_1a = $sddnayf_1a;
        return $this;
    }

    public function getSddnayf1d(): ?int
    {
        return $this->sddnayf_1d;
    }

    public function setSddnayf1d(?int $sddnayf_1d): self
    {
        $this->sddnayf_1d = $sddnayf_1d;
        return $this;
    }

    public function getSddnayf1fa(): ?\DateTimeInterface
    {
        return $this->sddnayf_1fa;
    }

    public function setSddnayf1fa(?\DateTimeInterface $sddnayf_1fa): self
    {
        $this->sddnayf_1fa = $sddnayf_1fa;
        return $this;
    }

    public function getSddnayf1fb(): ?\DateTimeInterface
    {
        return $this->sddnayf_1fb;
    }

    public function setSddnayf1fb(?\DateTimeInterface $sddnayf_1fb): self
    {
        $this->sddnayf_1fb = $sddnayf_1fb;
        return $this;
    }

    public function getSddnayf1g(): ?int
    {
        return $this->sddnayf_1g;
    }

    public function setSddnayf1g(?int $sddnayf_1g): self
    {
        $this->sddnayf_1g = $sddnayf_1g;
        return $this;
    }

    public function getSddnayf1h(): ?int
    {
        return $this->sddnayf_1h;
    }

    public function setSddnayf1h(?int $sddnayf_1h): self
    {
        $this->sddnayf_1h = $sddnayf_1h;
        return $this;
    }

    public function getSddnayf1i(): ?bool
    {
        return $this->sddnayf_1i;
    }

    public function setSddnayf1i(?bool $sddnayf_1i): self
    {
        $this->sddnayf_1i = $sddnayf_1i;
        return $this;
    }

    public function getSddnayf2a(): ?int
    {
        return $this->sddnayf_2a;
    }

    public function setSddnayf2a(?int $sddnayf_2a): self
    {
        $this->sddnayf_2a = $sddnayf_2a;
        return $this;
    }

    public function getSddnayf2d(): ?int
    {
        return $this->sddnayf_2d;
    }

    public function setSddnayf2d(?int $sddnayf_2d): self
    {
        $this->sddnayf_2d = $sddnayf_2d;
        return $this;
    }

    public function getSddnayf2fa(): ?\DateTimeInterface
    {
        return $this->sddnayf_2fa;
    }

    public function setSddnayf2fa(?\DateTimeInterface $sddnayf_2fa): self
    {
        $this->sddnayf_2fa = $sddnayf_2fa;
        return $this;
    }

    public function getSddnayf2fb(): ?\DateTimeInterface
    {
        return $this->sddnayf_2fb;
    }

    public function setSddnayf2fb(?\DateTimeInterface $sddnayf_2fb): self
    {
        $this->sddnayf_2fb = $sddnayf_2fb;
        return $this;
    }

    public function getSddnayf2g(): ?int
    {
        return $this->sddnayf_2g;
    }

    public function setSddnayf2g(?int $sddnayf_2g): self
    {
        $this->sddnayf_2g = $sddnayf_2g;
        return $this;
    }

    public function getSddnayf2h(): ?int
    {
        return $this->sddnayf_2h;
    }

    public function setSddnayf2h(?int $sddnayf_2h): self
    {
        $this->sddnayf_2h = $sddnayf_2h;
        return $this;
    }

    public function getSddnayf2i(): ?bool
    {
        return $this->sddnayf_2i;
    }

    public function setSddnayf2i(?bool $sddnayf_2i): self
    {
        $this->sddnayf_2i = $sddnayf_2i;
        return $this;
    }

    public function getCaso(): ?Caso { return $this->caso; }
    public function setCaso(?Caso $caso): self { $this->caso = $caso; return $this; }

    public function getFechacarga(): ?\DateTimeInterface { return $this->fechacarga; }
    public function setFechacarga(?\DateTimeInterface $fechacarga): self { $this->fechacarga = $fechacarga; return $this; }

    public function getUsuariocarga(): ?string { return $this->usuariocarga; }
    public function setUsuariocarga(?string $usuariocarga): self { $this->usuariocarga = $usuariocarga; return $this; }

    //add remove
    // sddnayf_1b
    public function getSddnayf1b(): Collection
    {
        return $this->sddnayf_1b;
    }

    public function addSddnayf1b(Nomenclador $item): self
    {
        if (!$this->sddnayf_1b->contains($item)) {
            $this->sddnayf_1b->add($item);
        }
        return $this;
    }

    public function removeSddnayf1b(Nomenclador $item): self
    {
        $this->sddnayf_1b->removeElement($item);
        return $this;
    }

    // sddnayf_1c
    public function getSddnayf1c(): Collection
    {
        return $this->sddnayf_1c;
    }

    public function addSddnayf1c(Nomenclador $item): self
    {
        if (!$this->sddnayf_1c->contains($item)) {
            $this->sddnayf_1c->add($item);
        }
        return $this;
    }

    public function removeSddnayf1c(Nomenclador $item): self
    {
        $this->sddnayf_1c->removeElement($item);
        return $this;
    }

    // sddnayf_1e
    public function getSddnayf1e(): Collection
    {
        return $this->sddnayf_1e;
    }

    public function addSddnayf1e(Nomenclador $item): self
    {
        if (!$this->sddnayf_1e->contains($item)) {
            $this->sddnayf_1e->add($item);
        }
        return $this;
    }

    public function removeSddnayf1e(Nomenclador $item): self
    {
        $this->sddnayf_1e->removeElement($item);
        return $this;
    }

    // sddnayf_2b
    public function getSddnayf2b(): Collection
    {
        return $this->sddnayf_2b;
    }

    public function addSddnayf2b(Nomenclador $item): self
    {
        if (!$this->sddnayf_2b->contains($item)) {
            $this->sddnayf_2b->add($item);
        }
        return $this;
    }

    public function removeSddnayf2b(Nomenclador $item): self
    {
        $this->sddnayf_2b->removeElement($item);
        return $this;
    }

    // sddnayf_2c
    public function getSddnayf2c(): Collection
    {
        return $this->sddnayf_2c;
    }

    public function addSddnayf2c(Nomenclador $item): self
    {
        if (!$this->sddnayf_2c->contains($item)) {
            $this->sddnayf_2c->add($item);
        }
        return $this;
    }

    public function removeSddnayf2c(Nomenclador $item): self
    {
        $this->sddnayf_2c->removeElement($item);
        return $this;
    }

    // sddnayf_2e
    public function getSddnayf2e(): Collection
    {
        return $this->sddnayf_2e;
    }

    public function addSddnayf2e(Nomenclador $item): self
    {
        if (!$this->sddnayf_2e->contains($item)) {
            $this->sddnayf_2e->add($item);
        }
        return $this;
    }

    public function removeSddnayf2e(Nomenclador $item): self
    {
        $this->sddnayf_2e->removeElement($item);
        return $this;
    }

    //hijosVictima
    public function getHijosVictima(): Collection
    {
        return $this->hijosVictima;
    }

    public function addHijoVictima(SddnayfHijosVictima $hijo): self
    {
        if (!$this->hijosVictima->contains($hijo)) {
            $this->hijosVictima[] = $hijo;
            $hijo->setSddnayfNew($this);
        }

        return $this;
    }

    public function removeHijoVictima(SddnayfHijosVictima $hijo): self
    {
        if ($this->hijosVictima->removeElement($hijo)) {
            // set the owning side to null (unless already changed)
            if ($hijo->getSddnayfNew() === $this) {
                $hijo->setSddnayfNew(null);
            }
        }

        return $this;
    }
}
