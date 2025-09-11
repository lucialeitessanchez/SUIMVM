<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
#[ORM\Table(name: "medidaintegral_has_sddnayf")]
class MedidaIntegralHasSddnayf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;
    // Getters and Setters

    public function getId(): int
    {
        return $this->id;
    }

}
