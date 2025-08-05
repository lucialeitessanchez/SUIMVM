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
    #[ORM\JoinColumn(name: "smgyd_2", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd2 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_3", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd3 = null;
    
    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_4", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd4 = null;

    #[ORM\Column(name: "smgyd_5a",type: 'string', length: 255, nullable: true)]
    private ?string $smgyd5a = null;

    #[ORM\Column(name: "smgyd_5b",type: 'string', length: 255, nullable: true)]
    private ?string $smgyd5b = null;

    #[ORM\Column(name: "smgyd_5c",type: 'integer', length: 255, nullable: true)]
    private ?int $smgyd5c = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_5d", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd5d = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_5e", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd5e = null;

    #[ORM\Column(name: "smgyd_5f",type: 'boolean', length: 255, nullable: true)]
    private ?bool $smgyd5f = null;

    #[ORM\Column(name: "smgyd_5g",type: 'boolean', length: 255, nullable: true)]
    private ?bool $smgyd5g = null;

    #[ORM\Column(name: "smgyd_5g1",type: 'text', length: 255, nullable: true)]
    private ?string $smgyd5g1 = null;

    #[ORM\Column(name: "smgyd_5h",type: 'boolean', nullable: true)]
    private ?bool $smgyd5h = null;

    #[ORM\Column(name: "smgyd_5h1",type: 'text', length: 255, nullable: true)]
    private ?string $smgyd5h1 = null;

    #[ORM\Column(name: "smgyd_5h2",type: 'integer', nullable: true)]
    private ?int $smgyd5h2 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_5h3", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd5h3 = null;

    #[ORM\Column(name: "smgyd_22a",type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $smgyd22a = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_22b", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd22b = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_22c", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd22c = null;

    #[ORM\Column(name: "smgyd_7",type: 'string', length: 255, nullable: true)]
    private ?string $smgyd7 = null;
    
    //Relaciones oneToMany
    #[ORM\OneToMany(mappedBy: 'smgyd', targetEntity: SmgydFamiliar::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $familiares;

    #[ORM\OneToMany(mappedBy: 'smgyd', targetEntity: SmgydFamiliarReferencia::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $familiaresReferencia;

    #[ORM\OneToMany(mappedBy: 'smgyd', targetEntity: SmgydOrganizacion::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $organizaciones;

    #[ORM\OneToMany(mappedBy: 'smgyd', targetEntity: SmgydProcesoJudicial::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $procesosJudiciales;
 
    #[ORM\Column(name: "smgyd_8", type: 'boolean', nullable: true)]
    private ?bool $smgyd8 = null;

    #[ORM\Column(name:"smgyd_8a",type: 'text', nullable: true)]
    private ?string $smgyd8a = null;

    #[ORM\Column(name:"smgyd_9",type: 'boolean', nullable: true)]
    private ?bool $smgyd9 = null;

    #[ORM\Column(name:"smgyd_9a",type: 'boolean', nullable: true)]
    private ?bool $smgyd9a = null;

    #[ORM\Column(name:"smgyd_10",type: 'string', nullable: true)]
    private ?string $smgyd10 = null;

    #[ORM\Column(name:"smgyd_11",type: 'boolean', nullable: true)]
    private ?bool $smgyd11 = null;

    #[ORM\Column(name:"smgyd_12",type: 'boolean', nullable: true)]
    private ?bool $smgyd12 = null;

    #[ORM\Column(name:"smgyd_13",type: 'boolean', nullable: true)]
    private ?bool $smgyd13 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_14", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd14 = null;

    #[ORM\Column(name:"smgyd_15",type: 'string', nullable: true)]
    private ?string $smgyd15 = null;

    #[ORM\Column(name:"smgyd_15a",type: 'string', nullable: true)]
    private ?string $smgyd15a = null;

    #[ORM\Column(name:"smgyd_15b",type: 'string', nullable: true)]
    private ?string $smgyd15b = null;

    #[ORM\Column(name:"smgyd_15c",type: 'string', length: 255, nullable: true)]
    private ?string $smgyd15c = null;

    #[ORM\Column(name:"smgyd_16",type: 'string', nullable: true)]
    private ?string $smgyd16 = null;

    #[ORM\ManyToMany(targetEntity: EquipoReferencia::class)]
    #[ORM\JoinTable(
        name: 'smgyd_equipo',
        joinColumns: [new ORM\JoinColumn(name: 'smgyd_id', referencedColumnName: 'id')],// nombre opcional de la tabla intermedia
        inverseJoinColumns: [new ORM\JoinColumn(name: 'equipo_referencia_id', referencedColumnName: 'id_equipo')]
        )] 
    private Collection $equipos;

    #[ORM\Column(name:"smgyd_16b",type: 'string', length: 255, nullable: true)]
    private ?string $smgyd16b = null;

    #[ORM\Column(name:"smgyd_16c",type: 'string', length: 255, nullable: true)]
    private ?string $smgyd16c = null;

    #[ORM\Column(name:"smgyd_17",type: 'string', nullable: true)]
    private ?string $smgyd17 = null;

    #[ORM\Column(name:"smgyd_18",type: 'boolean', nullable: true)]
    private ?bool $smgyd18 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "smgyd_19", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $smgyd19 = null;

    #[ORM\Column(name:"smgyd_20",type: 'text', nullable: true)]
    private ?string $smgyd20 = null;

    #[ORM\Column(name:"smgyd_21",type: 'text', nullable: true)]
    private ?string $smgyd21 = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso', nullable: false, onDelete: 'CASCADE')]
    private ?Caso $caso = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $fechacarga = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $usuariocarga = null;

    /**
     * @var Collection<int, Archivo>
     */
    #[ORM\OneToMany(targetEntity: Archivo::class, mappedBy: 'smgyd')]
    private Collection $archivos;

    public function __construct()
    {
        $this->familiares = new ArrayCollection();
        $this->organizaciones = new ArrayCollection();
        $this->procesosJudiciales = new ArrayCollection();
        $this->equipos = new ArrayCollection();
        $this->familiaresReferencia = new ArrayCollection();
        $this->archivos = new ArrayCollection();
    }

    // Generación de getters y setters
    public function getId(): ?int { return $this->id; }

    public function getSmgyd2(): ?Nomenclador { return $this->smgyd2; }
    public function setSmgyd2(?Nomenclador $smgyd2): self { $this->smgyd2 = $smgyd2; return $this; }

    public function getSmgyd3(): ?Nomenclador { return $this->smgyd3; }
    public function setSmgyd3(?Nomenclador $smgyd3): self { $this->smgyd3 = $smgyd3; return $this; }

    public function getSmgyd4(): ?Nomenclador { return $this->smgyd4; }
    public function setSmgyd4(?Nomenclador $smgyd4): self { $this->smgyd4 = $smgyd4; return $this; }

    public function getSmgyd5d(): ?Nomenclador { return $this->smgyd5d; }
    public function setSmgyd5d(?Nomenclador $smgyd5d): self { $this->smgyd5d = $smgyd5d; return $this; }

    public function getSmgyd5h3(): ?Nomenclador { return $this->smgyd5h3; }
    public function setSmgyd5h3(?Nomenclador $smgyd5h3): self { $this->smgyd5h3 = $smgyd5h3; return $this; }
   
    public function getSmgyd22b(): ?Nomenclador { return $this->smgyd22b; }
    public function setSmgyd22b(?Nomenclador $smgyd22b): self { $this->smgyd22b = $smgyd22b; return $this; }

    public function getSmgyd22c(): ?Nomenclador { return $this->smgyd22c; }
    public function setSmgyd22c(?Nomenclador $smgyd22c): self { $this->smgyd22c = $smgyd22c; return $this; }

    //Collection
    public function setProcesosJudiciales(Collection $procesos): self
{
    $this->procesosJudiciales = $procesos;
    return $this;
}
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
    public function getFamiliaresReferencia(): Collection
    {
        return $this->familiaresReferencia;
    }
    public function setFamiliaresReferencia(Collection $familiaresReferencia): self
    {
        $this->familiaresReferencia = $familiaresReferencia;
        return $this;
    }
    public function addFamiliarReferencia(SmgydFamiliarReferencia $familiarReferencia): static
    {
        if (!$this->familiaresReferencia->contains($familiarReferencia)) {
            $this->familiaresReferencia[] = $familiarReferencia;
            $familiarReferencia->setSmgyd($this);
        }

        return $this;
    }

    public function removeFamiliarReferencia(SmgydFamiliarReferencia $familiarReferencia): static
    {
        if ($this->familiaresReferencia->removeElement($familiarReferencia)) {
            if ($familiarReferencia->getSmgyd() === $this) {
                $familiarReferencia->setSmgyd(null);
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

    public function getProcesosJudiciales(): Collection { return $this->procesosJudiciales; }
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
    public function getSmgyd5a(): ?string { return $this->smgyd5a; }
    public function setSmgyd5a(?string $smgyd5a): self { $this->smgyd5a = $smgyd5a; return $this; }

    public function getSmgyd5b(): ?string { return $this->smgyd5b; }
    public function setSmgyd5b(?string $smgyd5b): self { $this->smgyd5b = $smgyd5b; return $this; }

    public function getSmgyd5c(): ?int { return $this->smgyd5c; }
    public function setSmgyd5c(?int $smgyd5c): self { $this->smgyd5c = $smgyd5c; return $this; }

    public function getSmgyd5e(): ?Nomenclador { return $this->smgyd5e; }
    public function setSmgyd5e(?Nomenclador $smgyd5e): self { $this->smgyd5e = $smgyd5e; return $this; }

    public function getSmgyd5f(): ?bool { return $this->smgyd5f; }
    public function setSmgyd5f(?bool $smgyd5f): self { $this->smgyd5f = $smgyd5f; return $this; }

    public function getSmgyd5g(): ?bool { return $this->smgyd5g; }
    public function setSmgyd5g(?bool $smgyd5g): self { $this->smgyd5g = $smgyd5g; return $this; }

    public function getSmgyd5g1(): ?string { return $this->smgyd5g1; }
    public function setSmgyd5g1(?string $smgyd5g1): self { $this->smgyd5g1 = $smgyd5g1; return $this; }

    public function getSmgyd5h(): ?bool { return $this->smgyd5h; }
    public function setSmgyd5h(?bool $smgyd5h): self { $this->smgyd5h = $smgyd5h; return $this; }

    public function getSmgyd5h1(): ?string { return $this->smgyd5h1; }
    public function setSmgyd5h1(?string $smgyd5h1): self { $this->smgyd5h1 = $smgyd5h1; return $this; }

    public function getSmgyd5h2(): ?int { return $this->smgyd5h2; }
    public function setSmgyd5h2(?int $smgyd5h2): self { $this->smgyd5h2 = $smgyd5h2; return $this; }

    public function getSmgyd22a(): ?\DateTimeInterface { return $this->smgyd22a; }
    public function setSmgyd22a(?\DateTimeInterface $smgyd22a): self { $this->smgyd22a = $smgyd22a; return $this; }
    
    public function getSmgyd7(): ?string { return $this->smgyd7; }
    public function setSmgyd7(?string $smgyd7): self { $this->smgyd7 = $smgyd7; return $this; }

    public function getSmgyd8(): ?bool { return $this->smgyd8; }
    public function setSmgyd8(?bool $smgyd8): self { $this->smgyd8 = $smgyd8; return $this; }

    public function getSmgyd8a(): ?string { return $this->smgyd8a; }
    public function setSmgyd8a(?string $smgyd8a): self { $this->smgyd8a = $smgyd8a; return $this; }

    public function getSmgyd9(): ?bool { return $this->smgyd9; }
    public function setSmgyd9(?bool $smgyd9): self { $this->smgyd9 = $smgyd9; return $this; }

    public function getSmgyd9a(): ?bool { return $this->smgyd9a; }
    public function setSmgyd9a(?bool $smgyd9a): self { $this->smgyd9a = $smgyd9a; return $this; }

    public function getSmgyd10(): ?string { return $this->smgyd10; }
    public function setSmgyd10(?string $smgyd10): self { $this->smgyd10 = $smgyd10; return $this; }

    public function getSmgyd11(): ?bool { return $this->smgyd11; }
    public function setSmgyd11(?bool $smgyd11): self { $this->smgyd11 = $smgyd11; return $this; }

    public function getSmgyd12(): ?bool { return $this->smgyd12; }
    public function setSmgyd12(?bool $smgyd12): self { $this->smgyd12 = $smgyd12; return $this; }

    public function getSmgyd13(): ?bool { return $this->smgyd13; }
    public function setSmgyd13(?bool $smgyd13): self { $this->smgyd13 = $smgyd13; return $this; }

    public function getSmgyd14(): ?Nomenclador { return $this->smgyd14; }
    public function setSmgyd14( ?Nomenclador $smgyd14): self { $this->smgyd14 = $smgyd14; return $this; }

    public function getSmgyd15(): ?string { return $this->smgyd15; }
    public function setSmgyd15(?string $smgyd15): self { $this->smgyd15 = $smgyd15; return $this; }

    public function getSmgyd15a(): ?string { return $this->smgyd15a; }
    public function setSmgyd15a(?string $smgyd15a): self { $this->smgyd15a = $smgyd15a; return $this; }

    public function getSmgyd15b(): ?string { return $this->smgyd15b; }
    public function setSmgyd15b(?string $smgyd15b): self { $this->smgyd15b = $smgyd15b; return $this; }

    public function getSmgyd15c(): ?string { return $this->smgyd15c; }
    public function setSmgyd15c(?string $smgyd15c): self { $this->smgyd15c = $smgyd15c; return $this; }

    public function getSmgyd16(): ?string { return $this->smgyd16; }
    public function setSmgyd16(?string $smgyd16): self { $this->smgyd16 = $smgyd16; return $this; }

    public function getEquipos(): Collection
    {
        return $this->equipos;
    }

    public function addEquipo(EquipoReferencia $equipo): self
    {
        if (!$this->equipos->contains($equipo)) {
            $this->equipos[] = $equipo;
        }

        return $this;
    }

    public function removeEquipo(EquipoReferencia $equipo): self
    {
        $this->equipos->removeElement($equipo);
        return $this;
    }

    public function getSmgyd16b(): ?string { return $this->smgyd16b; }
    public function setSmgyd16b(?string $smgyd16b): self { $this->smgyd16b = $smgyd16b; return $this; }

    public function getSmgyd16c(): ?string { return $this->smgyd16c; }
    public function setSmgyd16c(?string $smgyd16c): self { $this->smgyd16c = $smgyd16c; return $this; }

    public function getSmgyd17(): ?string { return $this->smgyd17; }
    public function setSmgyd17(?string $smgyd17): self { $this->smgyd17 = $smgyd17; return $this; }

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

    /**
     * @return Collection<int, Archivo>
     */
    public function getArchivos(): Collection
    {
        return $this->archivos;
    }

    public function addArchivo(Archivo $archivo): static
    {
        if (!$this->archivos->contains($archivo)) {
            $this->archivos->add($archivo);
            $archivo->setSmgyd($this);
        }

        return $this;
    }

    public function removeArchivo(Archivo $archivo): static
    {
        if ($this->archivos->removeElement($archivo)) {
            // set the owning side to null (unless already changed)
            if ($archivo->getSmgyd() === $this) {
                $archivo->setSmgyd(null);
            }
        }

        return $this;
    }
}
