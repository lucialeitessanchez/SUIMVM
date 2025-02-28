<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "caso")]
class Caso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id_caso = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $fecha_carga;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $fecha_anoticiamiento;

    #[ORM\Column(type: "string", enumType: FranjaEtariaEnum::class, nullable: true)]
    private ?string $franja_etaria = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $domicilio = null;

    #[ORM\Column(type: "string", enumType: BooleanEnum::class, nullable: true)]
    private ?string $femicidio_vinculado = null;

    #[ORM\Column(type: "string", enumType: BooleanEnum::class, nullable: true)]
    private ?string $crimen_odio = null;

    #[ORM\Column(type: Types::STRING, length: 150, nullable: true)]
    private ?string $barrio_hecho = null;

    #[ORM\Column(type: "string", enumType: TipoMuerteEnum::class, nullable: true)]
    private ?string $tipo_muerte = null;

    #[ORM\ManyToOne(targetEntity: Localidad::class, inversedBy: "casos")]
    #[ORM\JoinColumn(name: "localidad_id_localidad", referencedColumnName: "id_localidad", nullable: false)]
    private int $localidad_id_localidad;

    #[ORM\ManyToOne(targetEntity: Localidad::class, inversedBy: "casos")]
    #[ORM\JoinColumn(name: "localidad_id_hecho", referencedColumnName: "id_localidad", nullable: false)]
    private ?int $localidad_id_hecho = null;

    #[ORM\ManyToOne(targetEntity: Persona::class, inversedBy: "casos")]
    #[ORM\JoinColumn(name: "persona_id_persona", referencedColumnName: "id_persona", nullable: false)]
    private int $persona_id_persona;

    #[ORM\ManyToOne(targetEntity: OrganismoOrigen::class, inversedBy: "casos")]
    #[ORM\JoinColumn(name: "organismo_origen_id_origen", referencedColumnName: "id_origen", nullable: false)]
    private int $organismo_origen_id_origen;

    // Getters y setters...
    // Getters y Setters

public function getIdCaso(): ?int
{
    return $this->id_caso;
}

public function getFechaCarga(): \DateTimeInterface
{
    return $this->fecha_carga;
}

public function setFechaCarga(\DateTimeInterface $fecha_carga): self
{
    $this->fecha_carga = $fecha_carga;
    return $this;
}

public function getFechaAnoticiamiento(): \DateTimeInterface
{
    return $this->fecha_anoticiamiento;
}

public function setFechaAnoticiamiento(\DateTimeInterface $fecha_anoticiamiento): self
{
    $this->fecha_anoticiamiento = $fecha_anoticiamiento;
    return $this;
}

public function getFranjaEtaria(): ?string
{
    return $this->franja_etaria;
}

public function setFranjaEtaria(?string $franja_etaria): self
{
    $this->franja_etaria = $franja_etaria;
    return $this;
}

public function getDomicilio(): ?string
{
    return $this->domicilio;
}

public function setDomicilio(?string $domicilio): self
{
    $this->domicilio = $domicilio;
    return $this;
}

public function getFemicidioVinculado(): ?string
{
    return $this->femicidio_vinculado;
}

public function setFemicidioVinculado(?string $femicidio_vinculado): self
{
    $this->femicidio_vinculado = $femicidio_vinculado;
    return $this;
}

public function getCrimenOdio(): ?string
{
    return $this->crimen_odio;
}

public function setCrimenOdio(?string $crimen_odio): self
{
    $this->crimen_odio = $crimen_odio;
    return $this;
}

public function getBarrioHecho(): ?string
{
    return $this->barrio_hecho;
}

public function setBarrioHecho(?string $barrio_hecho): self
{
    $this->barrio_hecho = $barrio_hecho;
    return $this;
}

public function getTipoMuerte(): ?string
{
    return $this->tipo_muerte;
}

public function setTipoMuerte(?string $tipo_muerte): self
{
    $this->tipo_muerte = $tipo_muerte;
    return $this;
}

public function getLocalidadIdLocalidad(): Localidad
{
    return $this->localidad_id_localidad;
}

public function setLocalidadIdLocalidad(Localidad $localidad_id_localidad): self
{
    $this->localidad_id_localidad = $localidad_id_localidad;
    return $this;
}

public function getLocalidadIdHecho(): ?Localidad
{
    return $this->localidad_id_hecho;
}

public function setLocalidadIdHecho(?Localidad $localidad_id_hecho): self
{
    $this->localidad_id_hecho = $localidad_id_hecho;
    return $this;
}

public function getPersonaIdPersona(): Persona
{
    return $this->persona_id_persona;
}

public function setPersonaIdPersona(Persona $persona_id_persona): self
{
    $this->persona_id_persona = $persona_id_persona;
    return $this;
}

public function getOrganismoOrigenIdOrigen(): OrganismoOrigen
{
    return $this->organismo_origen_id_origen;
}

public function setOrganismoOrigenIdOrigen(OrganismoOrigen $organismo_origen_id_origen): self
{
    $this->organismo_origen_id_origen = $organismo_origen_id_origen;
    return $this;
}

}
