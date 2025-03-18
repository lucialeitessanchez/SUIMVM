<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "medidaintegral_has_sddnayf")]
class MedidaIntegralHasSddnayf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "sddnayf_7_2a", referencedColumnName: "id", nullable: false)]
    private Sddnayf72b $sddnayf_7_2a;

    #[ORM\ManyToOne(targetEntity: Sddnayf::class)]
    #[ORM\JoinColumn(name: "sddnayf_id_sddnayf", referencedColumnName: "id", nullable: false)]
    private Sddnayf $sddnayf;

    // Getters and Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getSddnayf72a(): Sddnayf72a
    {
        return $this->sddnayf_7_2a;
    }

    public function setSddnayf72a(Sddnayf72a $sddnayf_7_2a): self
    {
        $this->sddnayf_7_2a = $sddnayf_7_2a;
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
