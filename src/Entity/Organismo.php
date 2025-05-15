<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Localidad;

#[ORM\Entity(repositoryClass: 'App\Repository\OrganismoRepository')]
#[ORM\Table(name: 'organismo')]
class Organismo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $idOrganismo;

    #[ORM\Column(type: 'string', length: 45)]
    private string $nombreOrganismo;

    #[ORM\Column(type: 'string', length: 45)]
    private string $referente;

    #[ORM\Column(type: 'string', length: 45)]
    private string $domicilio;

    #[ORM\Column(type: 'string', length: 45)]
    private string $telefono;

    #[ORM\Column(type: 'string', length: 45)]
    private string $celular;

    #[ORM\Column(type: 'string', length: 45)]
    private string $email;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'localidad_id_localidad', referencedColumnName: 'id')]
    private Localidad $localidad;

    public function getIdOrganismo(): int
    {
        return $this->idOrganismo;
    }

    public function setIdOrganismo(int $idOrganismo): self
    {
        $this->idOrganismo = $idOrganismo;
        return $this;
    }

    public function getNombreOrganismo(): string
    {
        return $this->nombreOrganismo;
    }

    public function setNombreOrganismo(string $nombreOrganismo): self
    {
        $this->nombreOrganismo = $nombreOrganismo;
        return $this;
    }

    public function getReferente(): string
    {
        return $this->referente;
    }

    public function setReferente(string $referente): self
    {
        $this->referente = $referente;
        return $this;
    }

    public function getDomicilio(): string
    {
        return $this->domicilio;
    }

    public function setDomicilio(string $domicilio): self
    {
        $this->domicilio = $domicilio;
        return $this;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function setCelular(string $celular): self
    {
        $this->celular = $celular;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getLocalidad(): Localidad
    {
        return $this->localidad;
    }

    public function setLocalidad(Localidad $localidad): self
    {
        $this->localidad = $localidad;
        return $this;
    }
}
