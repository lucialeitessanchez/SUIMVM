<?php

namespace App\Entity;

use App\Entity\Caso;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity]
#[ORM\Table(name: "caj")]
class Caj
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: "id_caj", type: "integer")]
    private int $id_caj;

    #[ORM\Column(type: Types::BOOLEAN,nullable:true)]
    private ?bool $caj_1a = null;
  
    #[ORM\Column(type: Types::DATE_MUTABLE,nullable:true)]
    private ?\DateTimeInterface $caj_1b=null;

    #[ORM\Column(type: Types::BOOLEAN,nullable:true)]
    private ?bool $caj_2a = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable:true)]
    private ?bool $caj_2b = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $caj_2c =null;

    #[ORM\Column(type: Types::STRING , nullable:true)]
    private ?string $caj_2d = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $caj_2e = null;

    #[ORM\Column(type: Types::STRING,nullable:true)]
    private ?string $caj_2f = null;

    #[ORM\Column(type: Types::BOOLEAN, nullable:true)]
    private ?bool $caj_3a = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "caj_1c", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $caj_1c = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "caj_1d", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $caj_1d = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "caj_3b", referencedColumnName: "id_nomenclador", nullable: true)]
    private ?Nomenclador $caj_3b = null;

    #[ORM\Column(type: Types::BOOLEAN,nullable:true)]
    private ?bool $caj_3c = null;

    #[ORM\Column(type: Types::BOOLEAN,nullable:true)]
    private ?bool $caj_3d = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $caj_3e = null;

    #[ORM\Column(type: Types::STRING,nullable:true)]
    private ?string $caj_3f = null;

    #[ORM\Column(type: Types::TEXT,nullable:true)]
    private ?string $caj_3g = null;

    #[ORM\Column(type: Types::STRING,nullable:true)]
    private ?string $caj_3h = null;


    #[ORM\ManyToOne(targetEntity: EquipoReferencia::class)]
    #[ORM\JoinColumn(name: "caj_3i", referencedColumnName: "id_equipo", nullable: true)]
    private ?EquipoReferencia $caj_3i = null;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $caj_4a = null;

    #[ORM\Column(type: Types::INTEGER, nullable:true)]
    private ?int $caj_4b = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $caj_4c = null;

    #[ORM\Column(type: Types::STRING,nullable:true)]
    private ?string $caj_3j = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: "caso_id_caso", referencedColumnName: "id_caso", nullable: false)]
    private ?Caso $caso;

    public function getIdCaj(): ?int
    {
        return $this->id_caj;
    }

    public function getCaj1a(): ?bool
    {
        return $this->caj_1a;
    }

    public function setCaj1a(?bool $caj_1a): self
    {
        $this->caj_1a = $caj_1a;
        return $this;
    }

    public function getCaj1b(): ?\DateTimeInterface
    {
        return $this->caj_1b;
    }

    public function setCaj1b(?\DateTimeInterface $caj_1b): self
    {
        $this->caj_1b = $caj_1b;
        return $this;
    }

    public function getCaj2a(): ?bool
    {
        return $this->caj_2a;
    }

    public function setCaj2a(?bool $caj_2a): self
    {
        $this->caj_2a = $caj_2a;
        return $this;
    }

    public function getCaj2b(): ?bool
    {
        return $this->caj_2b;
    }

    public function setCaj2b(?bool $caj_2b): self
    {
        $this->caj_2b = $caj_2b;
        return $this;
    }

    public function getCaj2c(): ?\DateTimeInterface
    {
        return $this->caj_2c;
    }

    public function setCaj2c(?\DateTimeInterface $caj_2c): self
    {
        $this->caj_2c = $caj_2c;
        return $this;
    }

    public function getCaj2d(): ?string
    {
        return $this->caj_2d;
    }

    public function setCaj2d(?string $caj_2d): self
    {
        $this->caj_2d = $caj_2d;
        return $this;
    }

    public function getCaj2e(): ?string
    {
        return $this->caj_2e;
    }

    public function setCaj2e(?string $caj_2e): self
    {
        $this->caj_2e = $caj_2e;
        return $this;
    }

    public function getCaj2f(): ?string
    {
        return $this->caj_2f;
    }

    public function setCaj2f(?string $caj_2f): self
    {
        $this->caj_2f = $caj_2f;
        return $this;
    }

    public function getCaj3a(): ?bool
    {
        return $this->caj_3a;
    }

    public function setCaj3a(?bool $caj_3a): self
    {
        $this->caj_3a = $caj_3a;
        return $this;
    }

    public function getCaj3c(): ?bool
    {
        return $this->caj_3c;
    }

    public function setCaj3c(?bool $caj_3c): self
    {
        $this->caj_3c = $caj_3c;
        return $this;
    }

    public function getCaj3d(): ?bool
    {
        return $this->caj_3d;
    }

    public function setCaj3d(?bool $caj_3d): self
    {
        $this->caj_3d = $caj_3d;
        return $this;
    }

    public function getCaj3e(): ?\DateTimeInterface
    {
        return $this->caj_3e;
    }

    public function setCaj3e(?\DateTimeInterface $caj_3e): self
    {
        $this->caj_3e = $caj_3e;
        return $this;
    }

    public function getCaj3f(): ?string
    {
        return $this->caj_3f;
    }

    public function setCaj3f(?string $caj_3f): self
    {
        $this->caj_3f = $caj_3f;
        return $this;
    }

    public function getCaj3g(): ?string
    {
        return $this->caj_3g;
    }

    public function setCaj3g(?string $caj_3g): self
    {
        $this->caj_3g = $caj_3g;
        return $this;
    }

    public function getCaj3h(): ?string
    {
        return $this->caj_3h;
    }

    public function setCaj3h(?string $caj_3h): self
    {
        $this->caj_3h = $caj_3h;
        return $this;
    }

    public function getCaj3j(): ?string
    {
        return $this->caj_3j;
    }

    public function setCaj3j(?string $caj_3j): self
    {
        $this->caj_3j = $caj_3j;
        return $this;
    }

    public function getCaj4a(): ?bool
    {
        return $this->caj_4a;
    }

    public function setCaj4a(?bool $caj_4a): self
    {
        $this->caj_4a = $caj_4a;

        return $this;
    }

    public function getCaj4b(): ?int
    {
        return $this->caj_4b;
    }

    public function setCaj4b(?int $caj_4b): self
    {
        $this->caj_4b = $caj_4b;
        return $this;
    }

    public function getCaj4c(): ?string
    {
        return $this->caj_4c;
    }

    public function setCaj4c(?string $caj_4c): self
    {
        $this->caj_4c = $caj_4c;
        return $this;
    }

    public function getCaj1c(): ?Nomenclador
    {
        return $this->caj_1c;
    }

    public function setCaj1c(?Nomenclador $caj_1c): self
    {
        $this->caj_1c = $caj_1c;
        return $this;
    }

    public function getCaj1d(): ?Nomenclador
    {
        return $this->caj_1d;
    }

    public function setCaj1d(?Nomenclador $caj_1d): self
    {
        $this->caj_1d = $caj_1d;
        return $this;
    }

    public function getCaj3b(): ?Nomenclador
    {
        return $this->caj_3b;
    }

    public function setCaj3b(?Nomenclador $caj_3b): self
    {
        $this->caj_3b = $caj_3b;
        return $this;
    }

    public function getCaj3i(): ?EquipoReferencia
    {
        return $this->caj_3i;
    }

    public function setCaj3i(?EquipoReferencia $caj_3i): self
    {
        $this->caj_3i = $caj_3i;
        return $this;
    }

    public function getCaso(): Caso
    {
        return $this->caso;
    }

    public function setCaso(Caso $caso): self
    {
        $this->caso = $caso;
        return $this;
    }
}
