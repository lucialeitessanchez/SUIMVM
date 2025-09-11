<?php

namespace App\Entity;

use App\Repository\SmgydOrganizacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SmgydOrganizacionRepository::class)]
class SmgydOrganizacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $referente = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $celular = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\ManyToOne(targetEntity: Smgyd::class, inversedBy: 'organizaciones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Smgyd $smgyd = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReferente(): ?string
    {
        return $this->referente;
    }

    public function setReferente(?string $referente): self
    {
        $this->referente = $referente;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSmgyd(): ?Smgyd
    {
        return $this->smgyd;
    }

    public function setSmgyd(?Smgyd $smgyd): self
    {
        $this->smgyd = $smgyd;
        
        return $this;
    }
}
