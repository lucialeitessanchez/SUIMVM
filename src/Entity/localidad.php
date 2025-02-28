<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "localidad")]
class Localidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id_localidad = null;

    #[ORM\Column(type: Types::STRING, length: 45)]
    private string $localidad;

    #[ORM\Column(type: Types::STRING, length: 45)]
    private string $departamento;

    #[ORM\Column(type: Types::STRING, length: 45)]
    private string $provincia;

    #[ORM\OneToMany(mappedBy: "localidad", targetEntity: Caso::class)]
    private Collection $casos;

    public function __construct()
    {
        $this->casos = new ArrayCollection();
    }

    public function getIdLocalidad(): ?int
    {
        return $this->id_localidad;
    }

    public function getLocalidad(): string
    {
        return $this->localidad;
    }

    public function setLocalidad(string $localidad): self
    {
        $this->localidad = $localidad;
        return $this;
    }

    public function getDepartamento(): string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): self
    {
        $this->departamento = $departamento;
        return $this;
    }

    public function getProvincia(): string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;
        return $this;
    }

    public function getCasos(): Collection
    {
        return $this->casos;
    }
}
