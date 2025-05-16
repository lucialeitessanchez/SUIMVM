<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "tipo_vulneracion")]
class TipoVulneracion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id_tipo_vulneracion = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $vulneracion = null;

    
    public function getIdTipoVulneracion(): ?int
    {
        return $this->id_tipo_vulneracion;
    }

    public function getVulneracion(): ?string
    {
        return $this->vulneracion;
    }

    public function setVulneracion(string $vulneracion): self
    {
        $this->vulneracion = $vulneracion;
        return $this;
    }
    
}
