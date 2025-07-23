<?php

namespace App\Entity;

use App\Repository\SddnayfHijosVictimaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use phpDocumentor\Reflection\Types\Boolean;

#[ORM\Entity(repositoryClass: SddnayfHijosVictimaRepository::class)]
class SddnayfHijosVictima
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_vinculado')]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $apenom = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fnac = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $nrodocu = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'vinculo_agresor', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $vinculoAgresor = null;
    
    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'sddnayf_3d', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $sddnayf3d = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'sddnayf_3g', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $sddnayf3g = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'sddnayf_3h', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $sddnayf3h = null;

    #[ORM\Column(name: 'sddnayf_3a', type: "boolean", nullable: true)]
    private ?bool $sddnayf3a = null;

    #[ORM\Column(name:'sddnayf_3fa',type: 'date', nullable: true)]
    private ?\DateTimeInterface $sddnayf3fa = null;

    #[ORM\Column(name:'sddnayf_3fb',type: 'date', nullable: true)]
    private ?\DateTimeInterface $sddnayf3fb = null;

    #[ORM\Column(name:'sddnayf_3i',type: 'boolean', nullable: true)]
    private ?bool $sddnayf3i = null;

    #[ORM\Column(name:'sddnayf_3j',type: 'boolean', nullable: true)]
    private ?bool $sddnayf3j = null;

    #[ORM\Column(name:'sddnayf_3k',type: 'boolean', nullable: true)]
    private ?bool $sddnayf3k = null;

    #[ORM\ManyToOne(targetEntity: SddnayfNew::class, inversedBy: 'hijosVictima')]
    #[ORM\JoinColumn(name: 'sddnayf_new_id', referencedColumnName: 'id', nullable: false)]
    private ?SddnayfNew $sddnayfNew = null;

    //****ManyToMany */
    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3b',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado', onDelete: 'CASCADE')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador', onDelete: 'CASCADE')]
    )]
    private Collection $sddnayf_3b;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3c',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado', onDelete: 'CASCADE')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador', onDelete: 'CASCADE')]
    )]
    private Collection $sddnayf_3c;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3e',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado', onDelete: 'CASCADE')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador', onDelete: 'CASCADE')]
    )]
    private Collection $sddnayf_3e;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sddnayf_3l',
        joinColumns: [new ORM\JoinColumn(name: 'hijo_id', referencedColumnName: 'id_vinculado', onDelete: 'CASCADE')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador', onDelete: 'CASCADE')]
    )]
    private Collection $sddnayf_3l;

    public function __construct()
{
    $this->sddnayf_3b = new ArrayCollection();
    $this->sddnayf_3c = new ArrayCollection();
    $this->sddnayf_3e = new ArrayCollection();
    $this->sddnayf_3l = new ArrayCollection();
    
}

    // Getters y Setters

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVinculoAgresor(): ?Nomenclador
    {
        return $this->vinculoAgresor;
    }

    public function setVinculoAgresor(?Nomenclador $vinculoAgresor): self
    {
        $this->vinculoAgresor = $vinculoAgresor;
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

    public function getSddnayf3a(): ?bool
    {
        return $this->sddnayf3a;
    }

    public function setSddnayf3a(?bool $sddnayf3a): self
    {
        $this->sddnayf3a = $sddnayf3a;
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

    //get,add,remove

    //sddnayf_3b

    public function getSddnayf3b(): Collection
    {
        return $this->sddnayf_3b;
    }

    public function addSddnayf3b(Nomenclador $nomenclador): static
    {
        if (!$this->sddnayf_3b->contains($nomenclador)) {
            $this->sddnayf_3b->add($nomenclador);
        }

        return $this;
    }

    public function removeSddnayf3b(Nomenclador $nomenclador): static
    {
        $this->sddnayf_3b->removeElement($nomenclador);

        return $this;
    }

    //sddnayf_3c

    public function getSddnayf3c(): Collection
    {
        return $this->sddnayf_3c;
    }
    
    public function addSddnayf3c(Nomenclador $nomenclador): static
    {
        if (!$this->sddnayf_3c->contains($nomenclador)) {
            $this->sddnayf_3c->add($nomenclador);
        }
    
        return $this;
    }
    
    public function removeSddnayf3c(Nomenclador $nomenclador): static
    {
        $this->sddnayf_3c->removeElement($nomenclador);
    
        return $this;
    }

    //sddnayf_3e

    public function getSddnayf3e(): Collection
    {
        return $this->sddnayf_3e;
    }

    public function addSddnayf3e(Nomenclador $nomenclador): static
    {
        if (!$this->sddnayf_3e->contains($nomenclador)) {
            $this->sddnayf_3e->add($nomenclador);
        }

        return $this;
    }

    public function removeSddnayf3e(Nomenclador $nomenclador): static
    {
        $this->sddnayf_3e->removeElement($nomenclador);

        return $this;
    }

    //sddnayf_3l

    public function getSddnayf3l(): Collection
    {
        return $this->sddnayf_3l;
    }

    public function addSddnayf3l(Nomenclador $nomenclador): static
    {
        if (!$this->sddnayf_3l->contains($nomenclador)) {
            $this->sddnayf_3l->add($nomenclador);
        }

        return $this;
    }

    public function removeSddnayf3l(Nomenclador $nomenclador): static
    {
        $this->sddnayf_3l->removeElement($nomenclador);

        return $this;
    }

}
