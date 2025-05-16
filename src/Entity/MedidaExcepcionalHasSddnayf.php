<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
#[ORM\Table(name: "medidaexcepcional_has_sddnayf")]
class MedidaExcepcionalHasSddnayf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sddnayf_7_2b", referencedColumnName: "id", nullable: false)]
    private Sddnayf72b $sddnayf_7_2b;

    #[ORM\ManyToOne(targetEntity: Sddnayf::class)]
    #[ORM\JoinColumn(name: "sddnayf_id_sddnayf", referencedColumnName: "id", nullable: false)]
    private Sddnayf $sddnayf;

    // Getters and Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getSddnayf72b(): Sddnayf72b
    {
        return $this->sddnayf_7_2b;
    }

    public function setSddnayf72b(Sddnayf72b $sddnayf_7_2b): self
    {
        $this->sddnayf_7_2b = $sddnayf_7_2b;
        return $this;
    }

    public function getSddnayf(): Sddnayf
    {
        return $this->sddnayf;
    }

    public function setSddnayf(Sddnayf $sddnayf): self
    {
        $this->sddnayf = $sddnayf;
        return $this;
    }
}
