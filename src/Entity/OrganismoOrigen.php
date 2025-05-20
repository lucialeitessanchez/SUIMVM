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
    #[ORM\Column(name: 'id_origen', type: 'integer')]
    private int $idOrigen;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'organismo_id_organismo', referencedColumnName: 'idOrganismo')]
    private Organismo $organismoIdOrganismo;

    public function getIdOrigen(): ?int
    {
        return $this->idOrigen;
    }

   
    public function getOrganismoIdOrganismo(): organismoIdOrganismo
    {
        return $this->organismoIdOrganismo;
    }

    public function setOrganismoIdOrganismo(organismoIdOrganismo $organismoIdOrganismo): self
    {
        $this->organismoIdOrganismo = $organismoIdOrganismo;
        return $this;
    }
}
