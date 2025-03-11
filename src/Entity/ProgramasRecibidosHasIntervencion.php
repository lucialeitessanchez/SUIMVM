<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "programas_recibidos_has_intervencion")]
class ProgramasRecibidosHasIntervencion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: ProgramasRecibidos::class)]
    #[ORM\JoinColumn(name: "programas_recibidos_id_programas_recibidos", referencedColumnName: "id", nullable: false)]
    private ProgramasRecibidos $programasRecibidos;

    #[ORM\ManyToOne(targetEntity: Intervencion::class)]
    #[ORM\JoinColumn(name: "intervencion_id_intervencion", referencedColumnName: "id", nullable: false)]
    private Intervencion $intervencion;

    // Getters and Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getProgramasRecibidos(): ProgramasRecibidos
    {
        return $this->programasRecibidos;
    }

    public function setProgramasRecibidos(ProgramasRecibidos $programasRecibidos): self
    {
        $this->programasRecibidos = $programasRecibidos;
        return $this;
    }

    public function getIntervencion(): Intervencion
    {
        return $this->intervencion;
    }

    public function setIntervencion(Intervencion $intervencion): self
    {
        $this->intervencion = $intervencion;
        return $this;
    }
}
