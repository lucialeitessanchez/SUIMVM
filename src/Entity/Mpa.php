<?php

namespace App\Entity;

use App\Entity\Caso;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
class Mpa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id_mpa = null;

    #[ORM\Column(type: 'text')]
    private ?string $mpa_1 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_2 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_3 = null; // ← Este es el campo ENUM, lo tratamos como string


    #[ORM\Column(type: 'string')]
    private ?string $mpa_3a = null;

    #[ORM\Column(type: 'text')]
    private ?string $mpa_3a1 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_3b = null;

    #[ORM\Column(type: 'text')]
    private ?string $mpa_3b1 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_4 = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $mpa_5 = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $mpa_6 = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $mpa_6a = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $mpa_6b = null;

    #[ORM\Column(type: 'string', length: 100)]
    private ?string $mpa_6c = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_7 = null;

    #[ORM\Column(type: 'text')]
    private ?string $mpa_7a = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_8 = null;

    #[ORM\Column(type: 'string', length: 100)]
    private ?string $mpa_9a = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $mpa_9b = null;

    #[ORM\Column(type: 'string', length: 150)]
    private ?string $mpa_9c = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_9d = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_9e = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_9f = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_9g = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_9h = null;

    #[ORM\Column(type: 'text')]
    private ?string $mpa_9ha = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_10 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_11 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_12 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_13 = null;

    #[ORM\Column(type: 'text')]
    private ?string $mpa_13a = null;

    #[ORM\Column(type: 'text')]
    private ?string $mpa_14 = null;

    #[ORM\Column(type: 'string')]
    private ?string $mpa_15 = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "caso_id_caso", referencedColumnName: "id_caso", nullable: false)]
    private Caso $caso;


    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaCarga = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    // Getters y setters 
    public function getIdMpa(): ?int
    {
        return $this->id_mpa;
    }

    public function getMpa1(): ?string
    {
        return $this->mpa_1;
    }

    public function setMpa1(?string $mpa_1): self
    {
        $this->mpa_1 = $mpa_1;
        return $this;
    }

    public function getMpa2(): ?string { return $this->mpa_2; }
    public function setMpa2(?string $mpa_2): self { $this->mpa_2 = $mpa_2; return $this; }

    public function getMpa3(): ?string { return $this->mpa_3; }
    public function setMpa3(?string $mpa_3): self { $this->mpa_3 = $mpa_3; return $this; }

    public function getMpa3a(): ?string { return $this->mpa_3a; }
    public function setMpa3a(?string $mpa_3a): self { $this->mpa_3a = $mpa_3a; return $this; }

    public function getMpa3a1(): ?string { return $this->mpa_3a1; }
    public function setMpa3a1(?string $mpa_3a1): self { $this->mpa_3a1 = $mpa_3a1; return $this; }

    public function getMpa3b(): ?string { return $this->mpa_3b; }
    public function setMpa3b(?string $mpa_3b): self { $this->mpa_3b = $mpa_3b; return $this; }

    public function getMpa3b1(): ?string { return $this->mpa_3b1; }
    public function setMpa3b1(?string $mpa_3b1): self { $this->mpa_3b1 = $mpa_3b1; return $this; }

    public function getMpa4(): ?string { return $this->mpa_4; }
    public function setMpa4(?string $mpa_4): self { $this->mpa_4 = $mpa_4; return $this; }

    public function getMpa5(): ?\DateTimeInterface { return $this->mpa_5; }
    public function setMpa5(?\DateTimeInterface $mpa_5): self { $this->mpa_5 = $mpa_5; return $this; }

    public function getMpa6(): ?\DateTimeInterface { return $this->mpa_6; }
    public function setMpa6(?\DateTimeInterface $mpa_6): self { $this->mpa_6 = $mpa_6; return $this; }

    public function getMpa6a(): ?\DateTimeInterface { return $this->mpa_6a; }
    public function setMpa6a(?\DateTimeInterface $mpa_6a): self { $this->mpa_6a = $mpa_6a; return $this; }

    public function getMpa6b(): ?\DateTimeInterface { return $this->mpa_6b; }
    public function setMpa6b(?\DateTimeInterface $mpa_6b): self { $this->mpa_6b = $mpa_6b; return $this; }

    public function getMpa6c(): ?string { return $this->mpa_6c; }
    public function setMpa6c(?string $mpa_6c): self { $this->mpa_6c = $mpa_6c; return $this; }

    public function getMpa7(): ?string { return $this->mpa_7; }
    public function setMpa7(?string $mpa_7): self { $this->mpa_7 = $mpa_7; return $this; }

    public function getMpa7a(): ?string { return $this->mpa_7a; }
    public function setMpa7a(?string $mpa_7a): self { $this->mpa_7a = $mpa_7a; return $this; }
    
    public function getMpa8(): ?string { return $this->mpa_8; }
    public function setMpa8(?string $mpa_8): self { $this->mpa_8 = $mpa_8; return $this; }

    public function getMpa9a(): ?string { return $this->mpa_9a; }
    public function setMpa9a(?string $mpa_9a): self { $this->mpa_9a = $mpa_9a; return $this; }

    public function getMpa9b(): ?int { return $this->mpa_9b; }
    public function setMpa9b(?int $mpa_9b): self { $this->mpa_9b = $mpa_9b; return $this; }

    public function getMpa9c(): ?string { return $this->mpa_9c; }
    public function setMpa9c(?string $mpa_9c): self { $this->mpa_9c = $mpa_9c; return $this; }

    public function getMpa9d(): ?string { return $this->mpa_9d; }
    public function setMpa9d(?string $mpa_9d): self { $this->mpa_9d = $mpa_9d; return $this; }

    public function getMpa9e(): ?string { return $this->mpa_9e; }
    public function setMpa9e(?string $mpa_9e): self { $this->mpa_9e = $mpa_9e; return $this; }

    public function getMpa9f(): ?string { return $this->mpa_9f; }
    public function setMpa9f(?string $mpa_9f): self { $this->mpa_9f = $mpa_9f; return $this; }

    public function getMpa9g(): ?string { return $this->mpa_9g; }
    public function setMpa9g(?string $mpa_9g): self { $this->mpa_9g = $mpa_9g; return $this; }

    public function getMpa9h(): ?string { return $this->mpa_9h; }
    public function setMpa9h(?string $mpa_9h): self { $this->mpa_9h = $mpa_9h; return $this; }

    public function getMpa9ha(): ?string { return $this->mpa_9ha; }
    public function setMpa9ha(?string $mpa_9ha): self { $this->mpa_9ha = $mpa_9ha; return $this; }

    public function getMpa10(): ?string { return $this->mpa_10; }
    public function setMpa10(?string $mpa_10): self { $this->mpa_10 = $mpa_10; return $this; }

    public function getMpa11(): ?string { return $this->mpa_11; }
    public function setMpa11(?string $mpa_11): self { $this->mpa_11 = $mpa_11; return $this; }

    public function getMpa12(): ?string { return $this->mpa_12; }
    public function setMpa12(?string $mpa_12): self { $this->mpa_12 = $mpa_12; return $this; }

    public function getMpa13(): ?string { return $this->mpa_13; }
    public function setMpa13(?string $mpa_13): self { $this->mpa_13 = $mpa_13; return $this; }

    public function getMpa13a(): ?string { return $this->mpa_13a; }
    public function setMpa13a(?string $mpa_13a): self { $this->mpa_13a = $mpa_13a; return $this; }

    public function getMpa14(): ?string { return $this->mpa_14; }
    public function setMpa14(?string $mpa_14): self { $this->mpa_14 = $mpa_14; return $this; }

    public function getMpa15(): ?string { return $this->mpa_15; }
    public function setMpa15(?string $mpa_15): self { $this->mpa_15 = $mpa_15; return $this; }

    public function getCaso(): Caso { return $this->caso; }
    public function setCaso(Caso $caso): self { $this->caso = $caso; return $this; }

    public function getFechaCarga(): ?\DateTimeInterface {return $this->fechaCarga; }
    public function setFechaCarga(?\DateTimeInterface $fechaCarga): self{$this->fechaCarga = $fechaCarga; return $this; }

    public function getUsuarioCarga(): ?string {return $this->usuarioCarga;}
    public function setUsuarioCarga(?string $usuarioCarga): self {$this->usuarioCarga = $usuarioCarga; return $this; }


    public function __toString(): string
{
    return (string) $this->id_mpa;
}
}
