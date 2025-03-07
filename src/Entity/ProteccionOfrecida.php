<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "proteccion_ofrecida")]
class ProteccionOfrecida
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id_proteccion_ofrecida = null;

    #[ORM\ManyToOne(targetEntity: Sdh::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sdh $sdh = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $sdh_2_2_id_nomenclador = null;

    public function getIdProteccionOfrecida(): ?int
    {
        return $this->id_proteccion_ofrecida;
    }

    public function getSdh(): ?Sdh
    {
        return $this->sdh;
    }

    public function setSdh(?Sdh $sdh): self
    {
        $this->sdh = $sdh;
        return $this;
    }

    public function getSdh22IdNomenclador(): ?Nomenclador
    {
        return $this->sdh_2_2_id_nomenclador;
    }

    public function setSdh22IdNomenclador(?Nomenclador $sdh_2_2_id_nomenclador): self
    {
        $this->sdh_2_2_id_nomenclador = $sdh_2_2_id_nomenclador;
        return $this;
    }
}
