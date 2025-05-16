<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'causa_federal')]
class CausaFederal
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_causa_federal', type: 'integer')]
    private int $idCausaFederal;

    #[ORM\ManyToOne(targetEntity: JfDenuncias::class)]
    #[ORM\JoinColumn(name: 'jf_denuncias_id_jf_denuncias', referencedColumnName: 'id_jf_denuncias')]
    private ?JfDenuncias $jfDenuncias = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'jf_1_2_id_nomenclador', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $jf12Nomenclador = null;

    #[ORM\Column(name: 'jf_1_3a', type: 'string', length: 255)]
    private string $jf13a;

    #[ORM\Column(name: 'jf_1_3b', type: 'string', length: 255)]
    private string $jf13b;

    #[ORM\Column(name: 'jf_1_3c', type: 'string', length: 255)]
    private string $jf13c;

    #[ORM\Column(name: 'jf_2_1', type: 'string', length: 255)]
    private string $jf21;

    #[ORM\Column(name: 'jf_2_2', type: 'string', length: 255)]
    private string $jf22;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'jf_2_3_id_nomenclador', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $jf23Nomenclador = null;

    #[ORM\Column(name: 'jf_3_1', type: 'string', length: 255)]
    private string $jf31;

    #[ORM\Column(name: 'jf_3_2', type: 'string', length: 255)]
    private string $jf32;

    #[ORM\Column(name: 'jf_3_3', type: 'string', length: 255)]
    private string $jf33;

    #[ORM\Column(name: 'jf_3_4', type: 'text', nullable: true)]
    private ?string $jf34 = null;

    #[ORM\Column(name: 'jf_4_1', type: 'string', length: 255)]
    private string $jf41;

    #[ORM\Column(name: 'jf_4_3', type: 'string', length: 255)]
    private string $jf43;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'jf_5_1_id_nomenclador', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $jf51Nomenclador = null;

    #[ORM\Column(name: 'jf_5_2a', type: 'string', length: 255)]
    private string $jf52a;

    #[ORM\Column(name: 'jf_5_2b', type: 'string', length: 255)]
    private string $jf52b;

    #[ORM\Column(name: 'jf_6_1', type: 'string', length: 255)]
    private string $jf61;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'jf_6_2_id_nomenclador', referencedColumnName: 'id_nomenclador')]
    private ?Nomenclador $jf62Nomenclador = null;

    #[ORM\Column(name: 'jf_6_3', type: 'string', length: 255)]
    private string $jf63;

    // Métodos getter y setter

    public function getIdCausaFederal(): int
    {
        return $this->idCausaFederal;
    }

    public function getJfDenuncias(): ?JfDenuncias
    {
        return $this->jfDenuncias;
    }

    public function setJfDenuncias(?JfDenuncias $jfDenuncias): self
    {
        $this->jfDenuncias = $jfDenuncias;
        return $this;
    }

    public function getJf12Nomenclador(): ?Nomenclador
    {
        return $this->jf12Nomenclador;
    }

    public function setJf12Nomenclador(?Nomenclador $jf12Nomenclador): self
    {
        $this->jf12Nomenclador = $jf12Nomenclador;
        return $this;
    }

    public function getJf13a(): string
    {
        return $this->jf13a;
    }

    public function setJf13a(string $jf13a): self
    {
        $this->jf13a = $jf13a;
        return $this;
    }

    public function getJf13b(): string
    {
        return $this->jf13b;
    }

    public function setJf13b(string $jf13b): self
    {
        $this->jf13b = $jf13b;
        return $this;
    }

    public function getJf13c(): string
    {
        return $this->jf13c;
    }

    public function setJf13c(string $jf13c): self
    {
        $this->jf13c = $jf13c;
        return $this;
    }

    public function getJf21(): string
    {
        return $this->jf21;
    }

    public function setJf21(string $jf21): self
    {
        $this->jf21 = $jf21;
        return $this;
    }

    public function getJf22(): string
    {
        return $this->jf22;
    }

    public function setJf22(string $jf22): self
    {
        $this->jf22 = $jf22;
        return $this;
    }

    public function getJf23Nomenclador(): ?Nomenclador
    {
        return $this->jf23Nomenclador;
    }

    public function setJf23Nomenclador(?Nomenclador $jf23Nomenclador): self
    {
        $this->jf23Nomenclador = $jf23Nomenclador;
        return $this;
    }

    public function getJf31(): string
    {
        return $this->jf31;
    }

}
