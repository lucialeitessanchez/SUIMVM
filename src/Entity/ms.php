<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ms')]
class Ms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
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

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $ms42IdNomenclador = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $ms43a = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $ms43bIdNomenclador = null;

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

    // Getters y Setters

    public function getIdMs(): ?int
    {
        return $this->iidMs;
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
