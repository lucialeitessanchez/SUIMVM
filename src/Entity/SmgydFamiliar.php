<?php

namespace App\Entity;

use App\Repository\SmgydFamiliarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SmgydFamiliarRepository::class)]
class SmgydFamiliar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $apenom = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $nrodoc = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $edad = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Nomenclador $vinculo = null;

    #[ORM\ManyToOne(targetEntity: Smgyd::class, inversedBy: 'familiares')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Smgyd $smgyd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApenom(): ?string
    {
        return $this->apenom;
    }

    public function setApenom(?string $apenom): self
    {
        $this->apenom = $apenom;

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

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(?int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getVinculo(): ?Nomenclador
    {
        return $this->vinculo;
    }

    public function setVinculo(?Nomenclador $vinculo): self
    {
        $this->vinculo = $vinculo;

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
