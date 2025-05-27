<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
#[ORM\Table(name: 'ms')]
class Ms
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $idMs;

    #[ORM\Column(type: 'string', length: 255)]
    private string $ms11;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $ms12;
  
    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "ms13IdNomenclador", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $ms13IdNomenclador;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "ms14IdNomenclador", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $ms14IdNomenclador;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ms15 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $ms16 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $ms22 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "ms23aIdNomenclador", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $ms23aIdNomenclador;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ms23b = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ms31 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "ms32IdNomenclador", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $ms32IdNomenclador;
   
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ms41 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "ms42IdNomenclador", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $ms42IdNomenclador;
   
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $ms43a = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: "ms43bIdNomenclador", referencedColumnName: "id_nomenclador", nullable: false)]
    private Nomenclador $ms43bIdNomenclador;
  

    #[ORM\Column(type: 'string',  nullable: true)]
    private ?string $ms51 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $ms52 = null;

    #[ORM\Column(type: 'string',  nullable: true)]
    private ?string $ms53 = null;

    #[ORM\Column(type: 'string',  nullable: true)]
    private ?string $ms54a = null;

    #[ORM\Column(type: 'string',  nullable: true)]
    private ?string $ms54b = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: "caso_id_caso", referencedColumnName: "id_caso", nullable: false)]
    private Caso $caso;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaCarga = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usuarioCarga = null;

    // Getters y Setters

    public function getIdMs(): ?int
    {
        return $this->idMs;
    }
    public function getMs11(): ?string 
    { 
        return $this->ms11; 
    }
    public function setMs11(string $ms11): self 
    { 
        $this->ms11 = $ms11; 
        return $this; 
    }
    public function getMs12(): \DateTimeInterface 
    { 
        return $this->ms12; 
    }
    public function setMs12(\DateTimeInterface $ms12): self 
    { 
        $this->ms12 = $ms12; 
        return $this; 
    }
    public function getMs13IdNomenclador(): ?Nomenclador
    {
        return $this->ms13IdNomenclador;
    }

    public function setMs13IdNomenclador(?Nomenclador $ms13IdNomenclador): self
    {
        $this->ms13IdNomenclador = $ms13IdNomenclador;
        return $this;
    }
    public function getMs14IdNomenclador(): ?Nomenclador
    {
        return $this->ms14IdNomenclador;
    }
    public function setMs14IdNomenclador(?Nomenclador $ms14IdNomenclador): self
    {
        $this->ms14IdNomenclador = $ms14IdNomenclador;
        return $this;
    }
    public function getMs15(): ?string 
    { 
        return $this->ms15; 
    }
    public function setMs15(string $ms15): self 
    { 
        $this->ms15 = $ms15; 
        return $this; 
    }
    public function getMs16(): ?string 
    { 
        return $this->ms16; 
    }
    public function setMs16(string $ms16): self 
    { 
        $this->ms16 = $ms16; 
        return $this; 
    }
    public function getMs22(): ?string 
    { 
        return $this->ms22; 
    }
    public function setMs22(string $ms22): self 
    { 
        $this->ms22 = $ms22; 
        return $this; 
    }
    public function getMs23aIdNomenclador(): ?Nomenclador
    {
        return $this->ms23aIdNomenclador;
    }
    public function setMs23aIdNomenclador(?Nomenclador $ms23aIdNomenclador): self
    {
        $this->ms23aIdNomenclador = $ms23aIdNomenclador;
        return $this;
    }
    public function getMs23b(): ?string 
    { 
        return $this->ms23b; 
    }
    public function setMs23b(string $ms23b): self 
    { 
        $this->ms23b = $ms23b; 
        return $this; 
    }
    public function getMs31(): ?string 
    { 
        return $this->ms31; 
    }
    public function setMs31(string $ms31): self 
    { 
        $this->ms31 = $ms31; 
        return $this; 
    }
    public function getMs32IdNomenclador(): ?Nomenclador
    {
        return $this->ms32IdNomenclador;
    }
    public function setMs32IdNomenclador(?Nomenclador $ms32IdNomenclador): self
    {
        $this->ms32IdNomenclador = $ms32IdNomenclador;
        return $this;
    }
    public function getMs41(): ?string 
    { 
        return $this->ms41; 
    }
    public function setMs41(string $ms41): self 
    { 
        $this->ms41 = $ms41; 
        return $this; 
    }
    public function getMs42IdNomenclador(): ?Nomenclador
    {
        return $this->ms42IdNomenclador;
    }
    public function setMs42IdNomenclador(?Nomenclador $ms42IdNomenclador): self
    {
        $this->ms42IdNomenclador = $ms42IdNomenclador;
        return $this;
    }
    public function getMs43a(): ?string 
    { 
        return $this->ms43a;  
    }
    public function setMs43a(?string $ms43a): self 
    { 
        $this->ms43a = $ms43a; 
        return $this; 
    }
    public function getMs43bIdNomenclador(): ?Nomenclador
    {
        return $this->ms43bIdNomenclador;
    }
    public function setMs43bIdNomenclador(?Nomenclador $ms43bIdNomenclador): self
    {
        $this->ms43bIdNomenclador = $ms43bIdNomenclador;
        return $this;
    }
    public function getMs51(): ?string 
    { 
        return $this->ms51; 
    }
    public function setMs51(string $ms51): self 
    { 
        $this->ms51 = $ms51; 
        return $this; 
    }
    public function getMs52(): ?string 
    { 
        return $this->ms52; 
    }
    public function setMs52(string $ms52): self 
    { 
        $this->ms52 = $ms52; 
        return $this; 
    }
    public function getMs53(): ?string 
    { 
        return $this->ms53; 
    }
    public function setMs53(string $ms53): self 
    { 
        $this->ms53 = $ms53; 
        return $this; 
    }
    public function getMs54a(): ?string 
    { 
        return $this->ms54a; 
    }
    public function setMs54a(string $ms54a): self 
    { 
        $this->ms54a = $ms54a; 
        return $this; 
    }
    public function getMs54b(): ?string 
    { 
        return $this->ms54b; 
    }
    public function setMs54b(string $ms54b): self 
    { 
        $this->ms54b = $ms54b; 
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

        public function getFechaCarga(): ?\DateTimeInterface
    {
        return $this->fechaCarga;
    }

    public function setFechaCarga(?\DateTimeInterface $fechaCarga): self
    {
        $this->fechaCarga = $fechaCarga;
        return $this;
    }

    public function getUsuarioCarga(): ?string
    {
        return $this->usuarioCarga;
    }

    public function setUsuarioCarga(?string $usuarioCarga): self
    {
        $this->usuarioCarga = $usuarioCarga;
        return $this;
    }

}
