<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Nomenclador;

#[ORM\Entity]
#[ORM\Table(name: 'sddnayf_hijos_victima')]
class SddnayfHijosVictima
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'id_vinculado')]
    private ?int $idVinculado = null;

    #[ORM\Column(type: 'string', length: 55, nullable: true)]
    private ?string $apenom = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fnac = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private ?string $nrodocu = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $vinculoAgresor = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'sddnayf_3a')]
    private ?bool $sddnayf3a = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'sddnayf_3fa')]
    private ?\DateTimeInterface $sddnayf3fa = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'sddnayf_3fb')]
    private ?\DateTimeInterface $sddnayf3fb = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sddnayf_3g", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sddnayf3g = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sddnayf_3h", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sddnayf3h = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'sddnayf_3i')]
    private ?bool $sddnayf3i = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'sddnayf_3j')]
    private ?bool $sddnayf3j = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'sddnayf_3k')]
    private ?bool $sddnayf3k = null;
  
    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sddnayf_3d", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sddnayf3d = null;

    // Relación ManyToOne hacia SddnayfNew

    #[ORM\ManyToOne(targetEntity: SddnayfNew::class, inversedBy: 'hijosVictima')]
    #[ORM\JoinColumn(name: 'sddnayf_new_id', referencedColumnName: 'id', nullable: false)]
    private ?SddnayfNew $sddnayfNew = null;


    //ManyToMany
    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3b',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf3b;
   
    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3c',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf3c;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3e',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf3e;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3l',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $sddnayf3l;

    public function __construct()
{
    $this->sddnayf3b = new ArrayCollection();
    $this->sddnayf3c = new ArrayCollection();
    $this->sddnayf3e = new ArrayCollection();
    $this->sddnayf3l = new ArrayCollection();
}

    // Getters y Setters

    public function getIdVinculado(): ?int
    {
        return $this->idVinculado;
    }

    public function getApenom(): ?string
    {
        return $this->apenom;
    }

    public function setApenom(?string $apenom): self
    {
        $this->apenom = $apenom;
        return $this;
    }

    public function getFnac(): ?\DateTimeInterface
    {
        return $this->fnac;
    }

    public function setFnac(?\DateTimeInterface $fnac): self
    {
        $this->fnac = $fnac;
        return $this;
    }

    public function getNrodocu(): ?string
    {
        return $this->nrodocu;
    }

    public function setNrodocu(?string $nrodocu): self
    {
        $this->nrodocu = $nrodocu;
        return $this;
    }

    public function getVinculoAgresor(): ?int
    {
        return $this->vinculoAgresor;
    }

    public function setVinculoAgresor(?int $vinculoAgresor): self
    {
        $this->vinculoAgresor = $vinculoAgresor;
        return $this;
    }

    public function getSddnayf3a(): ?bool
    {
        return $this->sddnayf3a;
    }

    public function setSddnayf3a(?bool $sddnayf3a): self
    {
        $this->sddnayf3a = $sddnayf3a;
        return $this;
    }

    public function getSddnayf3d(): ?Nomenclador
    {
        return $this->sddnayf3d;
    }

    public function setSddnayf3d(?Nomenclador $sddnayf3d): self
    {
        $this->sddnayf3d = $sddnayf3d;
        return $this;
    }

    public function getSddnayf3fa(): ?\DateTimeInterface
    {
        return $this->sddnayf3fa;
    }

    public function setSddnayf3fa(?\DateTimeInterface $sddnayf3fa): self
    {
        $this->sddnayf3fa = $sddnayf3fa;
        return $this;
    }

    public function getSddnayf3fb(): ?\DateTimeInterface
    {
        return $this->sddnayf3fb;
    }

    public function setSddnayf3fb(?\DateTimeInterface $sddnayf3fb): self
    {
        $this->sddnayf3fb = $sddnayf3fb;
        return $this;
    }

    public function getSddnayf3g(): ?Nomenclador
    {
        return $this->sddnayf3g;
    }

    public function setSddnayf3g(?Nomenclador $sddnayf3g): self
    {
        $this->sddnayf3g = $sddnayf3g;
        return $this;
    }

    public function getSddnayf3h(): ?Nomenclador
    {
        return $this->sddnayf3h;
    }

    public function setSddnayf3h(?Nomenclador $sddnayf3h): self
    {
        $this->sddnayf3h = $sddnayf3h;
        return $this;
    }

    public function getSddnayf3i(): ?bool
    {
        return $this->sddnayf3i;
    }

    public function setSddnayf3i(?bool $sddnayf3i): self
    {
        $this->sddnayf3i = $sddnayf3i;
        return $this;
    }

    public function getSddnayf3j(): ?bool
    {
        return $this->sddnayf3j;
    }

    public function setSddnayf3j(?bool $sddnayf3j): self
    {
        $this->sddnayf3j = $sddnayf3j;
        return $this;
    }

    public function getSddnayf3k(): ?bool
    {
        return $this->sddnayf3k;
    }

    public function setSddnayf3k(?bool $sddnayf3k): self
    {
        $this->sddnayf3k = $sddnayf3k;
        return $this;
    }

    public function getSddnayfNew(): ?SddnayfNew
    {
        return $this->sddnayfNew;
    }

    public function setSddnayfNew(?SddnayfNew $sddnayfNew): self
    {
        $this->sddnayfNew = $sddnayfNew;
        return $this;
    }

    //Add y remove
        public function getSddnayf3b(): Collection
    {
        return $this->sddnayf3b;
    }

    public function addSddnayf3b(Nomenclador $nomenclador): self
    {
        if (!$this->sddnayf3b->contains($nomenclador)) {
            $this->sddnayf3b->add($nomenclador);
        }
        return $this;
    }

    public function removeSddnayf3b(Nomenclador $nomenclador): self
    {
        $this->sddnayf3b->removeElement($nomenclador);
        return $this;
    }
    //----
        public function getSddnayf3c(): Collection
    {
        return $this->sddnayf3c;
    }

    public function addSddnayf3c(Nomenclador $nomenclador): self
    {
        if (!$this->sddnayf3c->contains($nomenclador)) {
            $this->sddnayf3c->add($nomenclador);
        }
        return $this;
    }

    public function removeSddnayf3c(Nomenclador $nomenclador): self
    {
        $this->sddnayf3c->removeElement($nomenclador);
        return $this;
    }

    //---
    public function getSddnayf3e(): Collection
    {
        return $this->sddnayf3e;
    }

    public function addSddnayf3e(Nomenclador $nomenclador): self
    {
        if (!$this->sddnayf3e->contains($nomenclador)) {
            $this->sddnayf3e->add($nomenclador);
        }
        return $this;
    }

    public function removeSddnayf3e(Nomenclador $nomenclador): self
    {
        $this->sddnayf3e->removeElement($nomenclador);
        return $this;
    }
    //-----
    public function getSddnayf3l(): Collection
    {
        return $this->sddnayf3l;
    }

    public function addSddnayf3l(Nomenclador $nomenclador): self
    {
        if (!$this->sddnayf3l->contains($nomenclador)) {
            $this->sddnayf3l->add($nomenclador);
        }
        return $this;
    }

    public function removeSddnayf3l(Nomenclador $nomenclador): self
    {
        $this->sddnayf3l->removeElement($nomenclador);
        return $this;
    }

}
