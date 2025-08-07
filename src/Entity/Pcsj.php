<?php

namespace App\Entity;

use App\Repository\PgcsjRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PgcsjRepository::class)]
#[ORM\Table(name: 'pgcsj')]
class Pgcsj
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $pgcsj1 = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $pgcsj2 = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $pgcsj4 = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $pgcsj5 = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $pgcsj6 = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $pgcsj7 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $pgcsj8 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $pgcsj9 = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $pgcsj10 = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private ?bool $pgcsj12 = null;

    #[ORM\Column(type: Types::STRING, length: 50, nullable: true)]
    private ?string $pgcsj14 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $pgcsj15 = null;

    #[ORM\Column(type: Types::STRING, length: 100)]
    private string $usuarioCarga;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $fechacarga;

    // Relación ManyToOne con Caso
    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso', nullable: false)]
    private ?Caso $caso = null;

    // Getters y Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getPgcsj1(): ?bool { return $this->pgcsj1; }
    public function setPgcsj1(?bool $pgcsj1): self { $this->pgcsj1 = $pgcsj1; return $this; }

    public function getPgcsj2(): ?bool { return $this->pgcsj2; }
    public function setPgcsj2(?bool $pgcsj2): self { $this->pgcsj2 = $pgcsj2; return $this; }

    public function getPgcsj4(): ?int { return $this->pgcsj4; }
    public function setPgcsj4(?int $pgcsj4): self { $this->pgcsj4 = $pgcsj4; return $this; }

    public function getPgcsj5(): ?bool { return $this->pgcsj5; }
    public function setPgcsj5(?bool $pgcsj5): self { $this->pgcsj5 = $pgcsj5; return $this; }

    public function getPgcsj6(): ?bool { return $this->pgcsj6; }
    public function setPgcsj6(?bool $pgcsj6): self { $this->pgcsj6 = $pgcsj6; return $this; }

    public function getPgcsj7(): ?string { return $this->pgcsj7; }
    public function setPgcsj7(?string $pgcsj7): self { $this->pgcsj7 = $pgcsj7; return $this; }

    public function getPgcsj8(): ?\DateTimeInterface { return $this->pgcsj8; }
    public function setPgcsj8(?\DateTimeInterface $pgcsj8): self { $this->pgcsj8 = $pgcsj8; return $this; }

    public function getPgcsj9(): ?\DateTimeInterface { return $this->pgcsj9; }
    public function setPgcsj9(?\DateTimeInterface $pgcsj9): self { $this->pgcsj9 = $pgcsj9; return $this; }

    public function getPgcsj10(): ?bool { return $this->pgcsj10; }
    public function setPgcsj10(?bool $pgcsj10): self { $this->pgcsj10 = $pgcsj10; return $this; }

    public function getPgcsj12(): ?bool { return $this->pgcsj12; }
    public function setPgcsj12(?bool $pgcsj12): self { $this->pgcsj12 = $pgcsj12; return $this; }

    public function getPgcsj14(): ?string { return $this->pgcsj14; }
    public function setPgcsj14(?string $pgcsj14): self { $this->pgcsj14 = $pgcsj14; return $this; }

    public function getPgcsj15(): ?string { return $this->pgcsj15; }
    public function setPgcsj15(?string $pgcsj15): self { $this->pgcsj15 = $pgcsj15; return $this; }

    public function getUsuarioCarga(): string { return $this->usuarioCarga; }
    public function setUsuarioCarga(string $usuarioCarga): self { $this->usuarioCarga = $usuarioCarga; return $this; }

    public function getFechacarga(): \DateTimeInterface { return $this->fechacarga; }
    public function setFechacarga(\DateTimeInterface $fechacarga): self { $this->fechacarga = $fechacarga; return $this; }

    public function getCaso(): ?Caso { return $this->caso; }
    public function setCaso(?Caso $caso): self { $this->caso = $caso; return $this; }
}
