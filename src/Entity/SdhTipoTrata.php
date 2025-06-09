<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(name: "sdh_tipoTrata")]
class SdhTipoTrata
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idsdh_tipoTrata = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nomenclador $nomenclador = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sdh $sdh = null;

    public function getIdsdhTipoTrata(): ?int
    {
        return $this->idsdh_tipoTrata;
    }

    public function getNomenclador(): ?Nomenclador
    {
        return $this->nomenclador;
    }

    public function setNomenclador(?Nomenclador $nomenclador): self
    {
        $this->nomenclador = $nomenclador;

        return $this;
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
}
