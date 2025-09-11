<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'mpa_tipoViolencia')]
class MpaTipoViolencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $descripcionViolencia = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'mpa_id_mpa', referencedColumnName: 'id_mpa', nullable: false)]
    private ?Mpa $mpa = null;

    // Getters y setters
    public function getId(): ?int
    {
        return $this->id;
    }
  
    public function getDescripcionViolencia(): ?string
    {
        return $this->descripcionViolencia;
    }

    public function setDescripcionViolencia(?string $descripcionViolencia): self
    {
        $this->descripcionViolencia = $descripcionViolencia;
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