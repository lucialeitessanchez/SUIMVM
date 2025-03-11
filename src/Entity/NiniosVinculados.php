<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "ninios_vinculados")]
class NiniosVinculados
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $idVinculado;

    #[ORM\Column(type: "string", length: 55)]
    private string $sddnayf5a;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $sddnayf5b;

    #[ORM\Column(type: "integer")]
    private int $sddnayf5c;

    #[ORM\Column(type: "string", length: 8)]
    private string $sddnayf5d;

    #[ORM\Column(type: "string")]
    private string $sddnayf5e;

    #[ORM\ManyToOne(targetEntity: Sddnayf::class)]
    #[ORM\JoinColumn(name: "sddnayf_id_sddnayf", referencedColumnName: "id", nullable: false)]
    private Sddnayf $sddnayf;

    // Getters and Setters

    public function getIdVinculado(): int
    {
        return $this->idVinculado;
    }

    public function getSddnayf5a(): string
    {
        return $this->sddnayf5a;
    }

    public function setSddnayf5a(string $sddnayf5a): self
    {
        $this->sddnayf5a = $sddnayf5a;
        return $this;
    }

    public function getSddnayf5b(): \DateTimeInterface
    {
        return $this->sddnayf5b;
    }

    public function setSddnayf5b(\DateTimeInterface $sddnayf5b): self
    {
        $this->sddnayf5b = $sddnayf5b;
        return $this;
    }

    public function getSddnayf5c(): int
    {
        return $this->sddnayf5c;
    }

    public function setSddnayf5c(int $sddnayf5c): self
    {
        $this->sddnayf5c = $sddnayf5c;
        return $this;
    }

    public function getSddnayf5d(): string
    {
        return $this->sddnayf5d;
    }

    public function setSddnayf5d(string $sddnayf5d): self
    {
        $this->sddnayf5d = $sddnayf5d;
        return $this;
    }

    public function getSddnayf5e(): string
    {
        return $this->sddnayf5e;
    }

    public function setSddnayf5e(string $sddnayf5e): self
    {
        $this->sddnayf5e = $sddnayf5e;
        return $this;
    }

    public function getSddnayf(): Sddnayf
    {
        return $this->sddnayf;
    }

    public function setSddnayf(Sddnayf $sddnayf): self
    {
        $this->sddnayf = $sddnayf;
        return $this;
    }
}
