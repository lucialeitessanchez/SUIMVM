<?php

namespace App\Entity;

use App\Entity\Nomenclador;
use App\Entity\Caso;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'mjs_servicio_penitenciario')]

class MjsServicioPenitenciario implements ArchivableInterface
{
    #[ORM\OneToMany(mappedBy: 'msj_servicio_penitenciario', targetEntity: Archivo::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $archivos;

    public function __construct()
    {
      
        $this->archivos = new ArrayCollection();
    }

    public function addArchivo(Archivo $archivo): void
    {
        if (!$this->archivos->contains($archivo)) {
            $this->archivos->add($archivo);
            $archivo->setMjs($this); // aquí relacionás en el lado del archivo
        }
    }

    public function getArchivos(): Collection
    {
        return $this->archivos;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $mjs_1a = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'mjs_1b1', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mjs_1b1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $mjs_1b2 = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $mjs_1b3 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $mjs_1b4 = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'mjs_1b5_a', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mjs_1b5_a = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?int $mjs_1b5_b = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $mjs_1b5_c = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $mjs_2a = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $mjs_2b = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'mjs_2b1', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mjs_2b1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $mjs_2b2 = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $mjs_2b3 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $mjs_2b4 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $mjs_3a = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $mjs_3b = null;

    #[ORM\ManyToOne(targetEntity: Nomenclador::class)]
    #[ORM\JoinColumn(name: 'mjs_3b1', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mjs_3b1 = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $mjs_4a = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $mjs_4b = null;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso', nullable: false)]
    private ?Caso $caso = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $fecha_carga = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $usuario_carga = null;

    // Getters y setters
    public function getId(): ?int { return $this->id; }

    public function getMjs1a(): ?bool { return $this->mjs_1a; }
    public function setMjs1a(?bool $mjs_1a): self { $this->mjs_1a = $mjs_1a; return $this; }

    public function getMjs1b1(): ?Nomenclador { return $this->mjs_1b1; }
    public function setMjs1b1(?Nomenclador $mjs_1b1): self { $this->mjs_1b1 = $mjs_1b1; return $this; }

    public function getMjs1b2(): ?string { return $this->mjs_1b2; }
    public function setMjs1b2(?string $mjs_1b2): self { $this->mjs_1b2 = $mjs_1b2; return $this; }

    public function getMjs1b3(): ?\DateTimeInterface { return $this->mjs_1b3; }
    public function setMjs1b3(?\DateTimeInterface $mjs_1b3): self { $this->mjs_1b3 = $mjs_1b3; return $this; }

    public function getMjs1b4(): ?bool { return $this->mjs_1b4; }
    public function setMjs1b4(?bool $mjs_1b4): self { $this->mjs_1b4 = $mjs_1b4; return $this; }

    public function getMjs1b5a(): ?Nomenclador { return $this->mjs_1b5_a; }
    public function setMjs1b5a(?Nomenclador $mjs_1b5_a): self { $this->mjs_1b5_a = $mjs_1b5_a; return $this; }

    public function getMjs1b5b(): ?string { return $this->mjs_1b5_b; }
    public function setMjs1b5b(?string $mjs_1b5_b): self { $this->mjs_1b5_b = $mjs_1b5_b; return $this; }

    public function getMjs1b5c(): ?string { return $this->mjs_1b5_c; }
    public function setMjs1b5c(?string $mjs_1b5_c): self { $this->mjs_1b5_c = $mjs_1b5_c; return $this; }

    public function getMjs2a(): ?bool { return $this->mjs_2a; }
    public function setMjs2a(?bool $mjs_2a): self { $this->mjs_2a = $mjs_2a; return $this; }

    public function getMjs2b(): ?string { return $this->mjs_2b; }
    public function setMjs2b(?string $mjs_2b): self { $this->mjs_2b = $mjs_2b; return $this; }

    public function getMjs2b1(): ?Nomenclador { return $this->mjs_2b1; }
    public function setMjs2b1(?Nomenclador $mjs_2b1): self { $this->mjs_2b1 = $mjs_2b1; return $this; }

    public function getMjs2b2(): ?string { return $this->mjs_2b2; }
    public function setMjs2b2(?string $mjs_2b2): self { $this->mjs_2b2 = $mjs_2b2; return $this; }

    public function getMjs2b3(): ?\DateTimeInterface { return $this->mjs_2b3; }
    public function setMjs2b3(?\DateTimeInterface $mjs_2b3): self { $this->mjs_2b3 = $mjs_2b3; return $this; }

    public function getMjs2b4(): ?bool { return $this->mjs_2b4; }
    public function setMjs2b4(?bool $mjs_2b4): self { $this->mjs_2b4 = $mjs_2b4; return $this; }

    public function getMjs3a(): ?bool { return $this->mjs_3a; }
    public function setMjs3a(?bool $mjs_3a): self { $this->mjs_3a = $mjs_3a; return $this; }

    public function getMjs3b(): ?string { return $this->mjs_3b; }
    public function setMjs3b(?string $mjs_3b): self { $this->mjs_3b = $mjs_3b; return $this; }

    public function getMjs3b1(): ?Nomenclador { return $this->mjs_3b1; }
    public function setMjs3b1(?Nomenclador $mjs_3b1): self { $this->mjs_3b1 = $mjs_3b1; return $this; }

    public function getMjs4a(): ?bool { return $this->mjs_4a; }
    public function setMjs4a(?bool $mjs_4a): self { $this->mjs_4a = $mjs_4a; return $this; }

    public function getMjs4b(): ?string { return $this->mjs_4b; }
    public function setMjs4b(?string $mjs_4b): self { $this->mjs_4b = $mjs_4b; return $this; }

    public function getCaso(): ?Caso { return $this->caso; }
    public function setCaso(Caso $caso): self { $this->caso = $caso; return $this; }

    public function getFechaCarga(): ?\DateTimeInterface { return $this->fecha_carga; }
    public function setFechaCarga(?\DateTimeInterface $fecha_carga): self { $this->fecha_carga = $fecha_carga; return $this; }

    public function getUsuarioCarga(): ?string { return $this->usuario_carga; }
    public function setUsuarioCarga(?string $usuario_carga): self { $this->usuario_carga = $usuario_carga; return $this; }
}
