<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class MpaTipoViolencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idmpa_tipoViolencia = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $descripcion_violencia = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'mpa_id_mpa', referencedColumnName: 'id_mpa', nullable: false)]
    private ?Mpa $mpa = null;

    // Getters y setters

    public function getIdmpaTipoViolencia(): ?int
    {
        return $this->idmpa_tipoViolencia;
    }

    public function getDescripcionViolencia(): ?string
    {
        return $this->descripcion_violencia;
    }

    public function setDescripcionViolencia(?string $descripcion_violencia): self
    {
        $this->descripcion_violencia = $descripcion_violencia;
        return $this;
    }

    public function getMpa(): ?Mpa
    {
        return $this->mpa;
    }

    public function setMpa(?Mpa $mpa): self
    {
        $this->mpa = $mpa;
        return $this;
    }
}