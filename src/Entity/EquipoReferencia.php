<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
#[ORM\Table(name: "equipo_referencia")]
class EquipoReferencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: "integer")]
    private int $id_equipo;

    #[ORM\Column(type: "string", length: 100)]
    private string $equipo;

    public function getIdEquipo(): ?int
    {
        return $this->id_equipo;
    }

    public function getEquipo(): string
    {
        return $this->equipo;
    }

    public function setEquipo(string $equipo): self
    {
        $this->equipo = $equipo;
        return $this;
    }
}
