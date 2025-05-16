<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'contexto_criminalidad')]
class ContextoCriminalidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_contexto_criminalidad', type: 'integer')]
    private int $idContextoCriminalidad;

    #[ORM\ManyToOne(targetEntity: CausaFederal::class)]
    #[ORM\JoinColumn(name: 'causa_federal_id_causa_federal', referencedColumnName: 'id_causa_federal')]
    private ?CausaFederal $causaFederal = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'jf_4_2_id_nomenclador', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $jf42Nomenclador = null;

    // Métodos getter y setter

    public function getIdContextoCriminalidad(): int
    {
        return $this->idContextoCriminalidad;
    }

    public function getCausaFederal(): ?CausaFederal
    {
        return $this->causaFederal;
    }

    public function setCausaFederal(?CausaFederal $causaFederal): self
    {
        $this->causaFederal = $causaFederal;
        return $this;
    }

    public function getJf42Nomenclador(): ?Nomenclador
    {
        return $this->jf42Nomenclador;
    }

    public function setJf42Nomenclador(?Nomenclador $jf42Nomenclador): self
    {
        $this->jf42Nomenclador = $jf42Nomenclador;
        return $this;
    }
}
