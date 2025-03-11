<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "programas_recibidos")]
class ProgramasRecibidos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $idProgramasRecibidos;

    #[ORM\Column(type: "string", length: 45)]
    private string $programa;

    // Getters and Setters

    public function getIdProgramasRecibidos(): int
    {
        return $this->idProgramasRecibidos;
    }

    public function getPrograma(): string
    {
        return $this->programa;
    }

    public function setPrograma(string $programa): self
    {
        $this->programa = $programa;
        return $this;
    }
}
