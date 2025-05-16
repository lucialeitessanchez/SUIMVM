<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "acciones_aic")]
class AccionesAic
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id_acciones_aic;
    
    #[ORM\Column(type: 'integer')]
    private int $mjys_id_mjys;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "mjys_V_1d_id_nomenclador", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $nomenclador;

    public function getIdAccionesAic(): ?int
    {
        return $this->id_acciones_aic;
    }

    public function getMjysIdMjys(): int
    {
        return $this->mjys_id_mjys;
    }

    public function setMjysIdMjys(int $mjys_id_mjys): self
    {
        $this->mjys_id_mjys = $mjys_id_mjys;
        return $this;
    }

    public function getNomenclador(): Nomenclador
    {
        return $this->nomenclador;
    }

    public function setNomenclador(Nomenclador $nomenclador): self
    {
        $this->nomenclador = $nomenclador;
        return $this;
    }
}
