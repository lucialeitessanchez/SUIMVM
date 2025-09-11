<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "sdh")]
class Sdh
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: "id_sdh", type: "integer")]
    private int $id_sdh;
  

    #[ORM\Column(type: "boolean",nullable:true)]
    private ?bool $sdh_1_1 = null;

    #[ORM\Column(type: "string",nullable:true)]
    private ?string $sdh_1_9 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sdh_1_10 = null;

    #[ORM\Column(type: "string",nullable:true)]
    private ?string $sdh_1_3 = null;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: "sdh_tipoTrata", // nombre de la tabla intermedia
        joinColumns: [new ORM\JoinColumn(name: "sdh_id", referencedColumnName: "id_sdh")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "nomenclador_id", referencedColumnName: "id_nomenclador")]
    )]
    private Collection $sdh_1_2_id_nomenclador;
   
    #[ORM\Column(type: "string", nullable: true)]
    private ?string $sdh_1_4 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sdh_1_5_id_nomenclador", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sdh_1_5_id_nomenclador = null;
      
    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sdh_1_6_id_nomenclador", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sdh_1_6_id_nomenclador = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $sdh_1_7 = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $sdh_1_8 = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $sdh_2_1 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sdh_2_2_id_nomenclador", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sdh_2_2_id_nomenclador=null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $sdh_2_3 = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $sdh_2_4 = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $sdh_3_1 = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $sdh_3_2 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sdh_3_3_id_nomenclador", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sdh_3_3_id_nomenclador = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sdh_3_4_id_nomenclador", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $sdh_3_4_id_nomenclador = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $sdh_4_1 = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $sdh_4_2 = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $sdh_4_3 = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $sdh_5_1a = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $sdh_5_1b = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $sdh_5_2a = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $sdh_5_2b = null;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sdh_institucion_interviniente',
        joinColumns: [new ORM\JoinColumn(name: 'sdh_id', referencedColumnName: 'id_sdh')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $institucionesIntervinientes;

    //----------------------------------
public function getInstitucionesIntervinientes(): Collection { return $this->institucionesIntervinientes;}
public function addInstitucionInterviniente(Nomenclador $institucion): self 
{ if (!$this->institucionesIntervinientes->contains($institucion)) 
    { $this->institucionesIntervinientes[] = $institucion; }
    return $this;
}
public function removeInstitucionInterviniente(Nomenclador $institucion): self
{   $this->institucionesIntervinientes->removeElement($institucion);
    return $this;
}
public function setInstitucionesIntervinientes(Collection $instituciones): self
{   $this->institucionesIntervinientes = $instituciones;
    return $this;
}
//--------------------------------

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sdh_accion_asistencia',
        joinColumns: [new ORM\JoinColumn(name: 'sdh_id', referencedColumnName: 'id_sdh')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $accionesAsistencia;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sdh_tipo_proteccion',
        joinColumns: [new ORM\JoinColumn(name: 'sdh_id', referencedColumnName: 'id_sdh')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $tipoProtecciones;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sdh_medida_busqueda',
        joinColumns: [new ORM\JoinColumn(name: 'sdh_id', referencedColumnName: 'id_sdh')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $medidasBusqueda;

    #[ORM\ManyToMany(targetEntity: Nomenclador::class)]
    #[ORM\JoinTable(
        name: 'sdh_institucion_busqueda',
        joinColumns: [new ORM\JoinColumn(name: 'sdh_id', referencedColumnName: 'id_sdh')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'nomenclador_id', referencedColumnName: 'id_nomenclador')]
    )]
    private Collection $institucionesBusqueda;
//-------------------------------------------------
    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: "caso_id_caso", referencedColumnName: "id_caso", nullable: false)]
    private ?Caso $caso;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaCarga = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    public function __construct()
    {
        $this->sdh_1_2_id_nomenclador = new ArrayCollection();
        $this->institucionesIntervinientes = new ArrayCollection();
        $this->accionesAsistencia = new ArrayCollection();
        $this->tipoProtecciones = new ArrayCollection();
        $this->medidasBusqueda = new ArrayCollection();
        $this->institucionesBusqueda = new ArrayCollection();
    }

    // Getters y Setters
    public function getIdSdh(): int { return $this->id_sdh; }

    public function getSdh11(): ?bool { return $this->sdh_1_1; }
    public function setSdh11(?bool $value): self { $this->sdh_1_1 = $value; return $this; }


    public function getSdh19(): ?string { return $this->sdh_1_9; }
    public function setSdh19(?string $value): self { $this->sdh_1_9 = $value; return $this; }

    public function getSdh110(): ?\DateTimeInterface { return $this->sdh_1_10; }
    public function setSdh110(?\DateTimeInterface $value): self { $this->sdh_1_10 = $value; return $this; }
  
    public function getSdh12IdNomenclador(): Collection
    {
        return $this->sdh_1_2_id_nomenclador;
    }

    public function addSdh12IdNomenclador(Nomenclador $nomenclador): self
    {
        if (!$this->sdh_1_2_id_nomenclador->contains($nomenclador)) {
            $this->sdh_1_2_id_nomenclador->add($nomenclador);
        }

        return $this;
    }

    public function removeSdh12IdNomenclador(Nomenclador $nomenclador): self
    {
        $this->sdh_1_2_id_nomenclador->removeElement($nomenclador);
        return $this;
    }

    public function getSdh13(): ?string { return $this->sdh_1_3; }
    public function setSdh13(?string $value): self { $this->sdh_1_3 = $value; return $this; }

    public function getSdh14(): ?string { return $this->sdh_1_4; }
    public function setSdh14(?string $value): self { $this->sdh_1_4 = $value; return $this; }

    public function getSdh15IdNomenclador(): ?Nomenclador { return $this->sdh_1_5_id_nomenclador; }
    public function setSdh15IdNomenclador(?Nomenclador $value): self { $this->sdh_1_5_id_nomenclador = $value; return $this; }

    public function getSdh16IdNomenclador(): ?Nomenclador { return $this->sdh_1_6_id_nomenclador; }
    public function setSdh16IdNomenclador(?Nomenclador $value): self { $this->sdh_1_6_id_nomenclador = $value; return $this; }

    public function getSdh17(): ?bool { return $this->sdh_1_7; }
    public function setSdh17(?bool $value): self { $this->sdh_1_7 = $value; return $this; }

    public function getSdh18(): ?string { return $this->sdh_1_8; }
    public function setSdh18(?string $value): self { $this->sdh_1_8 = $value; return $this; }

    public function getSdh21(): ?bool { return $this->sdh_2_1; }
    public function setSdh21(?bool $value): self { $this->sdh_2_1 = $value; return $this; }

    public function getSdh22IdNomenclador(): ?Nomenclador { return $this->sdh_2_2_id_nomenclador; }
    public function setSdh22IdNomenclador(?Nomenclador $value): self { $this->sdh_2_2_id_nomenclador = $value; return $this; }

    public function getSdh23(): ?string { return $this->sdh_2_3; }
    public function setSdh23(?string $value): self { $this->sdh_2_3 = $value; return $this; }

    public function getSdh24(): ?string { return $this->sdh_2_4; }
    public function setSdh24(?string $value): self { $this->sdh_2_4 = $value; return $this; }

    public function getSdh31(): ?bool { return $this->sdh_3_1; }
    public function setSdh31(?bool $value): self { $this->sdh_3_1 = $value; return $this; }

    public function getSdh32(): ?string { return $this->sdh_3_2; }
    public function setSdh32(?string $value): self { $this->sdh_3_2 = $value; return $this; }

    public function getSdh33IdNomenclador(): ?Nomenclador { return $this->sdh_3_3_id_nomenclador; }
    public function setSdh33IdNomenclador(?Nomenclador $value): self { $this->sdh_3_3_id_nomenclador = $value; return $this; }

    public function getSdh34IdNomenclador(): ?Nomenclador { return $this->sdh_3_4_id_nomenclador; }
    public function setSdh34IdNomenclador(?Nomenclador $value): self { $this->sdh_3_4_id_nomenclador = $value; return $this; }

    public function getSdh41(): ?bool { return $this->sdh_4_1; }
    public function setSdh41(?bool $value): self { $this->sdh_4_1 = $value; return $this; }

    public function getSdh42(): ?bool { return $this->sdh_4_2; }
    public function setSdh42(?bool $value): self { $this->sdh_4_2 = $value; return $this; }

    public function getSdh43(): ?string { return $this->sdh_4_3; }
    public function setSdh43(?string $value): self { $this->sdh_4_3 = $value; return $this; }

    public function getSdh51a(): ?bool { return $this->sdh_5_1a; }
    public function setSdh51a(?bool $value): self { $this->sdh_5_1a = $value; return $this; }

    public function getSdh51b(): ?string { return $this->sdh_5_1b; }
    public function setSdh51b(?string $value): self { $this->sdh_5_1b = $value; return $this; }

    public function getSdh52a(): ?bool { return $this->sdh_5_2a; }
    public function setSdh52a(?bool $value): self { $this->sdh_5_2a = $value; return $this; }

    public function getSdh52b(): ?string { return $this->sdh_5_2b; }
    public function setSdh52b(?string $value): self { $this->sdh_5_2b = $value; return $this; }

    public function getCasoIdCaso(): Caso { return $this->caso; }
    public function setCasoIdCaso(Caso $value): self { $this->caso = $value; return $this; }

    public function getFechaCarga(): ?\DateTimeInterface {return $this->fechaCarga; }
    public function setFechaCarga(?\DateTimeInterface $fechaCarga): self {$this->fechaCarga = $fechaCarga; return $this; }

    public function getUsuarioCarga(): ?string { return $this->usuarioCarga; }
    public function setUsuarioCarga(?string $usuarioCarga): self { $this->usuarioCarga = $usuarioCarga; return $this; }


        //----------------------------------
    public function getAccionesAsistencia(): Collection { return $this->accionesAsistencia;}
    public function addAccionAsistencia(Nomenclador $accion): self 
    { if (!$this->accionesAsistencia->contains($accion)) 
        { $this->accionesAsistencia[] = $accion; }
        return $this;
    }
    public function removeAccionAsistencia(Nomenclador $accion): self
    {   $this->accionesAsistencia->removeElement($accion);
        return $this;
    }
    public function setAccionesAsistencia(Collection $acciones): self
    {   $this->accionesAsistencia = $acciones;
        return $this;
    }

        //----------------------------------
        public function getTipoProtecciones(): Collection { return $this->tipoProtecciones;}
        public function addTipoProteccion(Nomenclador $tipoProteccion): self 
        { if (!$this->tipoProtecciones->contains($tipoProteccion)) 
            { $this->tipoProtecciones[] = $tipoProteccion; }
            return $this;
        }
        public function removeTipoProteccion(Nomenclador $tipoProteccion): self
        {   $this->tipoProtecciones->removeElement($tipoProteccion);
            return $this;
        }
        public function setTipoProtecciones(Collection $tipoProtecciones): self
        {   $this->tipoProtecciones = $tipoProtecciones;
            return $this;
        }
        //--------------------------------

        public function getMedidasBusqueda(): Collection { return $this->medidasBusqueda;}
        public function addMedidaBusqueda(Nomenclador $medidaBusqueda): self 
        { if (!$this->medidasBusqueda->contains($medidaBusqueda)) 
            { $this->medidasBusqueda[] = $medidaBusqueda; }
            return $this;
        }
        public function removeMedidaBusqueda(Nomenclador $medidaBusqueda): self
        {   $this->medidasBusqueda->removeElement($medidaBusqueda);
            return $this;
        }
        public function setMedidasBusqueda(Collection $medidasBusqueda): self
        {   $this->medidasBusqueda = $medidasBusqueda;
            return $this;
        }
        //--------------------------------

        public function getInstitucionesBusqueda(): Collection { return $this->institucionesBusqueda;}
        public function addInstitucionBusqueda(Nomenclador $institucionBusqueda): self 
        { if (!$this->institucionesBusqueda->contains($institucionBusqueda)) 
            { $this->institucionesBusqueda[] = $institucionBusqueda; }
            return $this;
        }
        public function removeInstitucionBusqueda(Nomenclador $institucionBusqueda): self
        {   $this->institucionesBusqueda->removeElement($institucionBusqueda);
            return $this;
        }
        public function setInstitucionesBusqueda(Collection $institucionesBusqueda): self
        {   $this->institucionesBusqueda = $institucionesBusqueda;
            return $this;
        }
        //--------------------------------

}
