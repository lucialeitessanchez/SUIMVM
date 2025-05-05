<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "caj")]
class Caj
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id_caj;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_1a;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $caj_1b;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_2a;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_2b;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $caj_2c;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_2d;

    #[ORM\Column(type: Types::TEXT)]
    private string $caj_2e;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_2f;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_3a;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "caj_1c", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $caj_1c;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "caj_1d", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $caj_1d;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "caj_3b", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $caj_3b;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_3c;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_3d;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $caj_3e;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_3f;

    #[ORM\Column(type: Types::TEXT)]
    private string $caj_3g;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_3h;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_4a;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_4b;

    #[ORM\Column(type: Types::TEXT)]
    private string $caj_4c;

    #[ORM\Column(type: Types::STRING)]
    private string $caj_3j;

    #[ORM\ManyToOne(targetEntity: EquipoReferencia::class)]
    #[ORM\JoinColumn(name: "caj_3j", referencedColumnName: "id_equipo", nullable: false)]
    private EquipoReferencia $caj_3j;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: "caso_id_caso", referencedColumnName: "id_caso", nullable: false)]
    private Caso $caso;

    public function getIdCaj(): ?int
    {
        return $this->id_caj;
    }

    public function getCaj1a(): string
    {
        return $this->caj_1a;
    }

    public function setCaj1a(string $caj_1a): self
    {
        $this->caj_1a = $caj_1a;
        return $this;
    }

    public function getCaj1b(): \DateTimeInterface
    {
        return $this->caj_1b;
    }

    public function setCaj1b(\DateTimeInterface $caj_1b): self
    {
        $this->caj_1b = $caj_1b;
        return $this;
    }

    public function getCaj2a(): string
    {
        return $this->caj_2a;
    }

    public function setCaj2a(string $caj_2a): self
    {
        $this->caj_2a = $caj_2a;
        return $this;
    }

    public function getCaj2b(): string
    {
        return $this->caj_2b;
    }

    public function setCaj2b(string $caj_2b): self
    {
        $this->caj_2b = $caj_2b;
        return $this;
    }

    public function getCaj2c(): \DateTimeInterface
    {
        return $this->caj_2c;
    }

    public function setCaj2c(\DateTimeInterface $caj_2c): self
    {
        $this->caj_2c = $caj_2c;
        return $this;
    }

    public function getCaj2d(): string
    {
        return $this->caj_2d;
    }

    public function setCaj2d(string $caj_2d): self
    {
        $this->caj_2d = $caj_2d;
        return $this;
    }

    public function getCaj2e(): string
    {
        return $this->caj_2e;
    }

    public function setCaj2e(string $caj_2e): self
    {
        $this->caj_2e = $caj_2e;
        return $this;
    }

    public function getCaj2f(): string
    {
        return $this->caj_2f;
    }

    public function setCaj2f(string $caj_2f): self
    {
        $this->caj_2f = $caj_2f;
        return $this;
    }

    public function getCaj3a(): string
    {
        return $this->caj_3a;
    }

    public function setCaj3a(string $caj_3a): self
    {
        $this->caj_3a = $caj_3a;
        return $this;
    }

    public function getCaj3c(): string
    {
        return $this->caj_3c;
    }

    public function setCaj3c(string $caj_3c): self
    {
        $this->caj_3c = $caj_3c;
        return $this;
    }

    public function getCaj3d(): string
    {
        return $this->caj_3d;
    }

    public function setCaj3d(string $caj_3d): self
    {
        $this->caj_3d = $caj_3d;
        return $this;
    }

    public function getCaj3e(): \DateTimeInterface
    {
        return $this->caj_3e;
    }

    public function setCaj3e(\DateTimeInterface $caj_3e): self
    {
        $this->caj_3e = $caj_3e;
        return $this;
    }

    public function getCaj3f(): string
    {
        return $this->caj_3f;
    }

    public function setCaj3f(string $caj_3f): self
    {
        $this->caj_3f = $caj_3f;
        return $this;
    }

    public function getCaj3g(): string
    {
        return $this->caj_3g;
    }

    public function setCaj3g(string $caj_3g): self
    {
        $this->caj_3g = $caj_3g;
        return $this;
    }

    public function getCaj3h(): string
    {
        return $this->caj_3h;
    }

    public function setCaj3h(string $caj_3h): self
    {
        $this->caj_3h = $caj_3h;
        return $this;
    }

    public function getCaj1c(): Nomenclador
    {
        return $this->caj_1c;
    }

    public function setCaj1c(Nomenclador $caj_1c): self
    {
        $this->caj_1c = $caj_1c;
        return $this;
    }

    public function getCaj1d(): Nomenclador
    {
        return $this->caj_1d;
    }

    public function setCaj1d(Nomenclador $caj_1d): self
    {
        $this->caj_1d = $caj_1d;
        return $this;
    }

    public function getCaj3b(): Nomenclador
    {
        return $this->caj_3b;
    }

    public function setCaj3b(Nomenclador $caj_3b): self
    {
        $this->caj_3b = $caj_3b;
        return $this;
    }

    public function getCaj3i(): EquipoReferencia
    {
        return $this->caj_3i;
    }

    public function setCaj3i(EquipoReferencia $caj_3i): self
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
