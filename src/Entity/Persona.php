<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: 'App\Repository\PersonaRepository')]
#[ORM\Table(name: 'persona')]
class Persona
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $idPersona;

    #[ORM\Column(type: 'string', length: 45,nullable:true)]
    private ?string $nombre = null;

    #[ORM\Column(type: 'string', length: 45,nullable:true)]
    private ?string $apellido = null;

    #[ORM\Column(type: 'string', length: 8, nullable:true)]
    private ?string $nrodoc = null;

    #[ORM\Column(type: 'string', length: 1, nullable:true)]
    private ?string $sexo = null;

    #[ORM\Column(type: 'string', length: 45,nullable:true)]
    private ?string $generoAutop=null;

    #[ORM\Column(type: 'string', length: 45, nullable:true)]
    private ?string $nacionalidad = null;

    public function getIdPersona(): int
    {
        return $this->idPersona;
    }

    

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function getNrodoc(): ?string
    {
        return $this->nrodoc;
    }

    public function setNrodoc(?string $nrodoc): self
    {
        $this->nrodoc = $nrodoc;
        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;
        return $this;
    }

    public function getGeneroAutop(): ?string
    {
        return $this->generoAutop;
    }

    public function setGeneroAutop(?string $generoAutop): self
    {
        $this->generoAutop = $generoAutop;
        return $this;
    }

    public function getNacionalidad(): ?string
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad(?string $nacionalidad): self
    {
        $this->nacionalidad = $nacionalidad;
        return $this;
    }
}
