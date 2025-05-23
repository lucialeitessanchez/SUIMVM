<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Organismo;

#[ORM\Entity(repositoryClass: 'App\Repository\OrganismoOrigenRepository')]
#[ORM\Table(name: 'organismo_origen')]
class OrganismoOrigen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $idOrigen;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'organismo_id_organismo', referencedColumnName: 'id_organismo')]
    private Organismo $organismo;

    public function getIdOrigen(): int
    {
        return $this->idOrigen;
    }

    public function setIdOrigen(int $idOrigen): self
    {
        $this->idOrigen = $idOrigen;
        return $this;
    }

    public function getOrganismo(): Organismo
    {
        return $this->organismo;
    }

    public function setOrganismo(Organismo $organismo): self
    {
        $this->organismo = $organismo;
        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->getOrganismo();
    }
}
