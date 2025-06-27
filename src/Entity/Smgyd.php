<?php

namespace App\Entity;

use App\Repository\SmgydRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: SmgydRepository::class)]
class Smgyd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    // Relaciones a Nomenclador
    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd2 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd3 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd4 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd7 = null;

    //Relaciones oneToMany
    #[ORM\ManyToMany(targetEntity: SmgydFamiliar::class, cascade: ['persist'])]
    #[ORM\JoinTable(name: 'smgyd_familiares_smgyd')]
    private Collection $familiares;

    #[ORM\ManyToMany(targetEntity: SmgydOrganizacion::class, cascade: ['persist'])]
    #[ORM\JoinTable(name: 'smgyd_organizaciones_smgyd')]
    private Collection $organizaciones;

    #[ORM\ManyToMany(targetEntity: SmgydProcesoJudicial::class, cascade: ['persist'])]
    #[ORM\JoinTable(name: 'smgyd_procesos_smgyd')]
    private Collection $procesosJudiciales;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd8 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd8a = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd9 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd9a = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd10 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd11 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd12 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd13 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd14 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd15 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd15a = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd15b = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $smgyd15c = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd16 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $smgyd16b = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $smgyd16c = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd17 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $smgyd18 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    private ?Nomenclador $smgyd19 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd20 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smgyd21 = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Caso $caso = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $fechacarga = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $usuariocarga = null;

    public function __construct()
    {
        $this->familiares = new ArrayCollection();
        $this->organizaciones = new ArrayCollection();
        $this->procesosJudiciales = new ArrayCollection();
    }

    // Generación de getters y setters
    public function getId(): ?int { return $this->id; }

    public function getSmgyd2(): ?Nomenclador { return $this->smgyd2; }
    public function setSmgyd2(?Nomenclador $smgyd2): self { $this->smgyd2 = $smgyd2; return $this; }

    public function getSmgyd3(): ?Nomenclador { return $this->smgyd3; }
    public function setSmgyd3(?Nomenclador $smgyd3): self { $this->smgyd3 = $smgyd3; return $this; }

    public function getSmgyd4(): ?Nomenclador { return $this->smgyd4; }
    public function setSmgyd4(?Nomenclador $smgyd4): self { $this->smgyd4 = $smgyd4; return $this; }

    public function getSmgyd7(): ?Nomenclador { return $this->smgyd7; }
    public function setSmgyd7(?Nomenclador $smgyd7): self { $this->smgyd7 = $smgyd7; return $this; }

    //Collection
    public function getFamiliares(): Collection { return $this->familiares; }
    public function addFamiliar(SmgydFamiliar $familiar): self 
    { 
            if (!$this->familiares->contains($familiar)) { 
                $this->familiares[] = $familiar; 
                $familiar->setSmgyd($this); 
            } 
            return $this; 
    }
    public function removeFamiliar(SmgydFamiliar $familiar): self
    {
        if ($this->familiares->removeElement($familiar)) {
            if ($familiar->getSmgyd() === $this) {
                $familiar->setSmgyd(null);
            }
        }    
        return $this;
    }
    public function getOrganizaciones(): Collection { return $this->organizaciones; }
    public function addOrganizacion(SmgydOrganizacion $organizacion): self 
    { 
            if (!$this->organizaciones->contains($organizacion)) { 
                $this->organizaciones[] = $organizacion; 
                $organizacion->setSmgyd($this); 
            } 
            return $this; 
    }
    public function removeOrganizacion(SmgydOrganizacion $organizacion): self
    {
        if ($this->organizaciones->removeElement($organizacion)) {
            if ($organizacion->getSmgyd() === $this) {
                $organizacion->setSmgyd(null);
            }
        }    
        return $this;
    }

    public function getProcesoJudicial(): Collection { return $this->procesosJudiciales; }
    public function addProcesoJudicial(SmgydProcesoJudicial $procesoJudicial): self 
    { 
            if (!$this->procesosJudiciales->contains($procesoJudicial)) { 
                $this->procesosJudiciales[] = $procesoJudicial; 
                $procesoJudicial->setSmgyd($this); 
            } 
            return $this; 
    }
    public function removeProcesoJudicial(SmgydProcesoJudicial $procesoJudicial): self
    {
        if ($this->procesosJudiciales->removeElement($procesoJudicial)) {
            if ($procesoJudicial->getSmgyd() === $this) {
                $procesoJudicial->setSmgyd(null);
            }
        }    
        return $this;
    }

    public function getSmgyd8(): ?bool { return $this->smgyd8; }
    public function setSmgyd8(?bool $smgyd8): self { $this->smgyd8 = $smgyd8; return $this; }

    public function getSmgyd8a(): ?string { return $this->smgyd8a; }
    public function setSmgyd8a(?string $smgyd8a): self { $this->smgyd8a = $smgyd8a; return $this; }

    public function getSmgyd9(): ?bool { return $this->smgyd9; }
    public function setSmgyd9(?bool $smgyd9): self { $this->smgyd9 = $smgyd9; return $this; }

    public function getSmgyd9a(): ?bool { return $this->smgyd9a; }
    public function setSmgyd9a(?bool $smgyd9a): self { $this->smgyd9a = $smgyd9a; return $this; }

    public function getSmgyd10(): ?Nomenclador { return $this->smgyd10; }
    public function setSmgyd10(?Nomenclador $smgyd10): self { $this->smgyd10 = $smgyd10; return $this; }

    public function getSmgyd11(): ?bool { return $this->smgyd11; }
    public function setSmgyd11(?bool $smgyd11): self { $this->smgyd11 = $smgyd11; return $this; }

    public function getSmgyd12(): ?bool { return $this->smgyd12; }
    public function setSmgyd12(?bool $smgyd12): self { $this->smgyd12 = $smgyd12; return $this; }

    public function getSmgyd13(): ?bool { return $this->smgyd13; }
    public function setSmgyd13(?bool $smgyd13): self { $this->smgyd13 = $smgyd13; return $this; }

    public function getSmgyd14(): ?bool { return $this->smgyd14; }
    public function setSmgyd14(?bool $smgyd14): self { $this->smgyd14 = $smgyd14; return $this; }

    public function getSmgyd15(): ?Nomenclador { return $this->smgyd15; }
    public function setSmgyd15(?Nomenclador $smgyd15): self { $this->smgyd15 = $smgyd15; return $this; }

    public function getSmgyd15a(): ?Nomenclador { return $this->smgyd15a; }
    public function setSmgyd15a(?Nomenclador $smgyd15a): self { $this->smgyd15a = $smgyd15a; return $this; }

    public function getSmgyd15b(): ?Nomenclador { return $this->smgyd15b; }
    public function setSmgyd15b(?Nomenclador $smgyd15b): self { $this->smgyd15b = $smgyd15b; return $this; }

    public function getSmgyd15c(): ?string { return $this->smgyd15c; }
    public function setSmgyd15c(?string $smgyd15c): self { $this->smgyd15c = $smgyd15c; return $this; }

    public function getSmgyd16(): ?Nomenclador { return $this->smgyd16; }
    public function setSmgyd16(?Nomenclador $smgyd16): self { $this->smgyd16 = $smgyd16; return $this; }

    public function getSmgyd16b(): ?string { return $this->smgyd16b; }
    public function setSmgyd16b(?string $smgyd16b): self { $this->smgyd16b = $smgyd16b; return $this; }

    public function getSmgyd16c(): ?string { return $this->smgyd16c; }
    public function setSmgyd16c(?string $smgyd16c): self { $this->smgyd16c = $smgyd16c; return $this; }

    public function getSmgyd17(): ?Nomenclador { return $this->smgyd17; }
    public function setSmgyd17(?Nomenclador $smgyd17): self { $this->smgyd17 = $smgyd17; return $this; }

    public function getSmgyd18(): ?bool { return $this->smgyd18; }
    public function setSmgyd18(?bool $smgyd18): self { $this->smgyd18 = $smgyd18; return $this; }

    public function getSmgyd19(): ?Nomenclador { return $this->smgyd19; }
    public function setSmgyd19(?Nomenclador $smgyd19): self { $this->smgyd19 = $smgyd19; return $this; }

    public function getSmgyd20(): ?string { return $this->smgyd20; }
    public function setSmgyd20(?string $smgyd20): self { $this->smgyd20 = $smgyd20; return $this; }

    public function getSmgyd21(): ?string { return $this->smgyd21; }
    public function setSmgyd21(?string $smgyd21): self { $this->smgyd21 = $smgyd21; return $this; }

    public function getCaso(): ?Caso { return $this->caso; }
    public function setCaso(?Caso $caso): self { $this->caso = $caso; return $this; }

    public function getFechacarga(): ?\DateTimeInterface { return $this->fechacarga; }
    public function setFechacarga(?\DateTimeInterface $fechacarga): self { $this->fechacarga = $fechacarga; return $this; }

    public function getUsuariocarga(): ?string { return $this->usuariocarga; }
    public function setUsuariocarga(?string $usuariocarga): self { $this->usuariocarga = $usuariocarga; return $this; }
}
