<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
#[ORM\Table(name: 'mpa')]
class Mpa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: Types::INTEGER)]
    private int $idMpa;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private \DateTimeInterface $mpa1;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private \DateTimeInterface $mpa2;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_3_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa3IdNomenclador = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mpa4 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_5_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa5IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa6 = null;

    #[ORM\Column(type: Types::STRING, length: 45, nullable: true)]
    private ?string $mpa7a = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $mpa7b = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpc_7c_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa7cIdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa7d = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa7e = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa7f = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa7g = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa7h = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mpa7i = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa8 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_9_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa9IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, length: 45, nullable: true)]
    private ?string $mpa10 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa11 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_12_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa12IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa13 = null;

    // Agregar más campos según sea necesario, siguiendo el patrón

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Caso')]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso', nullable: true)]
    private ?Caso $casoIdCaso = null;

    public function getIdMpa(): ?int
    {
        return $this->idMpa;
    }

    public function getMpa1(): ?\DateTimeInterface
    {
        return $this->mpa1;
    }

    public function setMpa1(?\DateTimeInterface $mpa1): self
    {
        $this->mpa1 = $mpa1;
        return $this;
    }

    public function getMpa2(): ?\DateTimeInterface
    {
        return $this->mpa2;
    }

    public function setMpa2(?\DateTimeInterface $mpa2): self
    {
        $this->mpa2 = $mpa2;
        return $this;
    }

    public function getMpa3IdNomenclador(): ?Nomenclador
    {
        return $this->mpa3IdNomenclador;
    }

    public function setMpa3IdNomenclador(?Nomenclador $mpa3IdNomenclador): self
    {
        $this->mpa3IdNomenclador = $mpa3IdNomenclador;
        return $this;
    }

    public function getMpa4(): ?string
    {
        return $this->mpa4;
    }

    public function setMpa4(?string $mpa4): self
    {
        $this->mpa4 = $mpa4;
        return $this;
    }

    public function getMpa5IdNomenclador(): ?Nomenclador
    {
        return $this->mpa5IdNomenclador;
    }

    public function setMpa5IdNomenclador(?Nomenclador $mpa5IdNomenclador): self
    {
        $this->mpa5IdNomenclador = $mpa5IdNomenclador;
        return $this;
    }

    // Agregar los setters y getters restantes para los campos de la entidad
}
