<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EquipoReferenciaRepository;

#[ORM\Entity(repositoryClass: EquipoReferenciaRepository::class)]
#[ORM\Table(name: 'equipo_referencia')]

class EquipoReferencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_equipo', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $equipo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipo(): ?string
    {
        return $this->equipo;
    }

    public function setEquipo(string $equipo): self
    {
        $this->equipo = $equipo;
        return $this;
    }

    public function __toString(): string
    {
        return $this->equipo ?? '';
    }
}
