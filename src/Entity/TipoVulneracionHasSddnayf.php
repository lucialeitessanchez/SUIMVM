<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "tipo_vulneracion_has_sddnayf")]
class TipoVulneracionHasSddnayf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: TipoVulneracion::class, inversedBy: "sddnayfs")]
    #[ORM\JoinColumn(name: "tipo_vulneracion_id_tipo_vulneracion", referencedColumnName: "id_tipo_vulneracion", nullable: false)]
    private ?TipoVulneracion $tipoVulneracion = null;


    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $sddnayf6b = null;

    // Getters y Setters ...

    public function getTipoVulneracion(): ?TipoVulneracion
    {
        return $this->tipoVulneracion;
    }

    public function setTipoVulneracion(?TipoVulneracion $tipoVulneracion): self
    {
        $this->tipoVulneracion = $tipoVulneracion;
        return $this;
    }

    public function getSddnayf6b(): ?string
    {
        return $this->sddnayf6b;
    }

    public function setSddnayf6b(?string $sddnayf6b): self
    {
        $this->sddnayf6b = $sddnayf6b;
        return $this;
    }
}
