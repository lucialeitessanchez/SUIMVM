<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'diagnostico_asociado')]
class DiagnosticoAsociado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_diagnostico_asociado', type: 'integer')]
    private int $idDiagnosticoAsociado;

    #[ORM\ManyToOne(targetEntity: Ms::class)]
    #[ORM\JoinColumn(name: 'ms_id_ms', referencedColumnName: 'id_ms')]
    private ?Ms $ms = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'ms_2_1_id_nomenclador', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $ms21Nomenclador = null;

    // Métodos getter y setter

    public function getIdDiagnosticoAsociado(): int
    {
        return $this->idDiagnosticoAsociado;
    }

    public function getMs(): ?Ms
    {
        return $this->ms;
    }

    public function setMs(?Ms $ms): self
    {
        $this->ms = $ms;
        return $this;
    }

    public function getMs21Nomenclador(): ?Nomenclador
    {
        return $this->ms21Nomenclador;
    }

    public function setMs21Nomenclador(?Nomenclador $ms21Nomenclador): self
    {
        $this->ms21Nomenclador = $ms21Nomenclador;
        return $this;
    }
}
