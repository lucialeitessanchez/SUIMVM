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
    private $sddnayf_7_2b;


    // Getters and Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getSddnayf72b():Nomenclador
    {
        return $this->sddnayf_7_2b;
    }

    public function setSddnayf72b( $sddnayf_7_2b): self
    {
        $this->sddnayf_7_2b = $sddnayf_7_2b;
        return $this;
    }
}
