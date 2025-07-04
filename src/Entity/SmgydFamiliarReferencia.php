<?php

namespace App\Entity;

use App\Repository\SmgydFamiliarReferenciaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SmgydFamiliarReferenciaRepository::class)]
class SmgydFamiliarReferencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $apenom = null;

    #[ORM\Column]
    private ?int $edad = null;

    ##[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "vinculo_id", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $vinculo = null;

    #[ORM\ManyToOne(inversedBy: 'familiaresReferencia')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Smgyd $smgyd = null;

    // Getters y setters...
    public function getId(): ?int
{
    return $this->id;
}


public function setApenom(?string $apenom): self
{
    $this->apenom = $apenom;

    return $this;
}

public function getApenom(): ?string
{
    return $this->apenom;
}

public function setEdad(?int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
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

public function setSmgyd(?Smgyd $smgyd): static
{
    $this->smgyd = $smgyd;

    return $this;
}
}
