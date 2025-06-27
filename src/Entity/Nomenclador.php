<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "nomenclador")]
class Nomenclador
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id_nomenclador;

    #[ORM\Column(type: Types::STRING, length: 45)]
    private string $nomenclador;

    #[ORM\Column(type: Types::STRING, length: 200)]
    private string $valor_nomenclador;

    public function getIdNomenclador(): ?int
    {
        return $this->id_nomenclador;
    }

    public function getNomenclador(): string
    {
        return $this->nomenclador;
    }

    public function setNomenclador(string $nomenclador): self
    {
        $this->nomenclador = $nomenclador;
        return $this;
    }

    public function getValorNomenclador(): string
    {
        return $this->valor_nomenclador;
    }

    public function setValorNomenclador(string $valor_nomenclador): self
    {
        $this->valor_nomenclador = $valor_nomenclador;
        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->id_nomenclador;
        return $this->valor_nomenclador;
    }
}
