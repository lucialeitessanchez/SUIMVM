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

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1a1_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131a1IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1a3_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa133a1IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1a4_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131a4IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1b1_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131b1IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1b2_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131b2IdNomenclador = null;
    
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131b3 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131c1 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1c2_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131c2IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131c3 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131c4 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1d1_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131d1IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131d2 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131d3 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1d4_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131d4IdNomenclador = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_13_1d5_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa131d5IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131d6 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131d6a = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131d7 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa131d8 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa141 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_14_2_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa142IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa143 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa144 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa151 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa152 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa153 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa154 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa161 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa162 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa163 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa171 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa172 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa173 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa181 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa182 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa183 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa184 = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa191 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $mpa192;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_19_3_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa193IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa194 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_19_5_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa195IdNomenclador = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $mpa196 = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Nomenclador')]
    #[ORM\JoinColumn(name: 'mpa_19_7_id_nomenclador', referencedColumnName: 'id_nomenclador', nullable: true)]
    private ?Nomenclador $mpa197IdNomenclador = null;
   
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

    public function getMpa6(): ?string
    {
        return $this->mpa6;
    }
    public function setMpa6(?string $mpa6): self
    {
        $this->mpa6 = $mpa6;
        return $this;
    }

    public function getMpa7a(): ?string
    {
        return $this->mpa7a;
    }
    public function setMpa7a(?string $mpa7a): self
    {
        $this->mpa7a = $mpa7a;
        return $this;
    }

    public function getMpa7b(): ?int
    {
        return $this->mpa7b;
    }
    public function setMpa7b(?int $mpa7b): self
    {
        $this->mpa7b = $mpa7b;
        return $this;
    }
    
    public function getMpa7cIdNomenclador(): ?Nomenclador
    {
        return $this->mpa7cIdNomenclador;
    }
    public function setMpa7cIdNomenclador(?Nomenclador $mpa7cIdNomenclador): self
    {
        $this->mpa7cIdNomenclador = $mpa7cIdNomenclador;
        return $this;
    }

    public function getMpa7d(): ?string
    {
        return $this->mpa7d;
    }
    public function setMpa7d(?string $mpa7d): self
    {
        $this->mpa7d = $mpa7d;
        return $this;
    }
    public function getMpa7e(): ?string
    {
        return $this->mpa7e;
    }
    public function setMpa7e(?string $mpa7e): self
    {
        $this->mpa7e = $mpa7e;
        return $this;
    }

    public function getMpa7f(): ?string
    {
        return $this->mpa7f;
    }
    public function setMpa7f(?string $mpa7f): self
    {
        $this->mpa7f = $mpa7f;
        return $this;
    }

    public function getMpa7g(): ?string
    {
        return $this->mpa7g;
    }
    public function setMpa7g(?string $mpa7g): self
    {
        $this->mpa7g = $mpa7g;
        return $this;
    }

    public function getMpa7h(): ?string
    {
        return $this->mpa7h;
    }
    public function setMpa7h(?string $mpa7h): self
    {
        $this->mpa7h = $mpa7h;
        return $this;
    }

    public function getMpa7i(): ?string
    {
        return $this->mpa7i;
    }
    public function setMpa7i(?string $mpa7i): self
    {
        $this->mpa7i = $mpa7i;
        return $this;
    }

    public function getMpa8(): ?string
    {
        return $this->mpa8;
    }
    public function setMpa8(?string $mpa8): self
    {
        $this->mpa8 = $mpa8;
        return $this;
    }

    public function getMpa9IdNomenclador(): ?Nomenclador
    {
        return $this->mpa9IdNomenclador;
    }
    public function setMpa9IdNomenclador(?Nomenclador $mpa9IdNomenclador): self
    {
        $this->mpa9IdNomenclador = $mpa9IdNomenclador;
        return $this;
    }

    public function getMpa10(): ?string
    {
        return $this->mpa10;
    }
    public function setMpa10(?string $mpa10): self
    {
        $this->mpa10 = $mpa10;
        return $this;
    }

    public function getMpa11(): ?string
    {
        return $this->mpa11;
    }
    public function setMpa11(?string $mpa11): self
    {
        $this->mpa11 = $mpa11;
        return $this;
    }

    public function getMpa12IdNomenclador(): ?Nomenclador
    {
        return $this->mpa12IdNomenclador;
    }
    public function setMpa12IdNomenclador(?Nomenclador $mpa12IdNomenclador): self
    {
        $this->mpa12IdNomenclador = $mpa12IdNomenclador;
        return $this;
    }

    public function getMpa13(): ?string
    {
        return $this->mpa13;
    }
    public function setMpa13(?string $mpa13): self
    {
        $this->mpa13 = $mpa13;
        return $this;
    }

    public function getMpa131a1IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131a1IdNomenclador;
    }
    public function setMpa131a1IdNomenclador(?Nomenclador $mpa131a1IdNomenclador): self
    {
        $this->mpa131a1IdNomenclador = $mpa131a1IdNomenclador;
        return $this;
    }

    public function getMpa131a3IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131a3IdNomenclador;
    }
    public function setMpa131a3IdNomenclador(?Nomenclador $mpa131a3IdNomenclador): self
    {
        $this->mpa131a3IdNomenclador = $mpa131a3IdNomenclador;
        return $this;
    }

    public function getMpa131a4IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131a4IdNomenclador;
    }
    public function setMpa131a4IdNomenclador(?Nomenclador $mpa131a4IdNomenclador): self
    {
        $this->mpa131a4IdNomenclador = $mpa131a4IdNomenclador;
        return $this;
    }

    public function getMpa131b1IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131b1IdNomenclador;
    }
    public function setMpa131b1IdNomenclador(?Nomenclador $mpa131b1IdNomenclador): self
    {
        $this->mpa131b1IdNomenclador = $mpa131b1IdNomenclador;
        return $this;
    }

    public function getMpa131b2IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131b2IdNomenclador;
    }
    public function setMpa131b2IdNomenclador(?Nomenclador $mpa131b2IdNomenclador): self
    {
        $this->mpa131b2IdNomenclador = $mpa131b2IdNomenclador;
        return $this;
    }

    public function getMpa131b3(): ?string
    {
        return $this->mpa131b3;
    }
    public function setMpa131b3(?string $mpa131b3): self
    {
        $this->mpa131b3 = $mpa131b3;
        return $this;
    }

    public function getMpa131c1(): ?string
    {
        return $this->mpa131c1;
    }
    public function setMpa131c1(?string $mpa131c1): self
    {
        $this->mpa131c1 = $mpa131c1;
        return $this;
    }

    public function getMpa131c2IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131c2IdNomenclador;
    }
    public function setMpa131c2IdNomenclador(?Nomenclador $mpa131c2IdNomenclador): self
    {
        $this->mpa131c2IdNomenclador = $mpa131c2IdNomenclador;
        return $this;
    }

    public function getMpa131c3(): ?string
    {
        return $this->mpa131c3;
    }
    public function setMpa131c3(?string $mpa131c3): self
    {
        $this->mpa131c3 = $mpa131c3;
        return $this;
    }

    public function getMpa131c4(): ?string
    {
        return $this->mpa131c4;
    }
    public function setMpa131c4(?string $mpa131c4): self
    {
        $this->mpa131c4 = $mpa131c4;
        return $this;
    }

    public function getMpa131d1IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131d1IdNomenclador;
    }
    public function setMpa131d1IdNomenclador(?Nomenclador $mpa131d1IdNomenclador): self
    {
        $this->mpa131d1IdNomenclador = $mpa131d1IdNomenclador;
        return $this;
    }

    public function getMpa131d2(): ?string
    {
        return $this->mpa131d2;
    }
    public function setMpa131d2(?string $mpa131d2): self
    {
        $this->mpa131d2 = $mpa131d2;
        return $this;
    }

    public function getMpa131d3(): ?string
    {
        return $this->mpa131d3;
    }
    public function setMpa131d3(?string $mpa131d3): self
    {
        $this->mpa131d3 = $mpa131d3;
        return $this;
    }

    public function getMpa131d4IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131d4IdNomenclador;
    }
    public function setMpa131d4IdNomenclador(?Nomenclador $mpa131d4IdNomenclador): self
    {
        $this->mpa131d4IdNomenclador = $mpa131d4IdNomenclador;
        return $this;
    }

    public function getMpa131d5IdNomenclador(): ?Nomenclador
    {
        return $this->mpa131d5IdNomenclador;
    }
    public function setMpa131d5IdNomenclador(?Nomenclador $mpa131d5IdNomenclador): self
    {
        $this->mpa131d5IdNomenclador = $mpa131d5IdNomenclador;
        return $this;
    }

    public function getMpa142IdNomenclador(): ?Nomenclador
    {
        return $this->mpa142IdNomenclador;
    }
    public function setMpa142IdNomenclador(?Nomenclador $mpa142IdNomenclador): self
    {
        $this->mpa142IdNomenclador = $mpa142IdNomenclador;
        return $this;
    }

    public function getMpa143(): ?string
    {
        return $this->mpa143;
    }
    public function setMpa143(?string $mpa143): self
    {
        $this->mpa143 = $mpa143;
        return $this;
    }

    public function getMpa144(): ?string
    {
        return $this->mpa144;
    }
    public function setMpa144(?string $mpa144): self
    {
        $this->mpa144 = $mpa144;
        return $this;
    }

    public function getMpa151(): ?string
    {
        return $this->mpa151;
    }
    public function setMpa151(?string $mpa151): self
    {
        $this->mpa151 = $mpa151;
        return $this;
    }

    public function getMpa152(): ?string
    {
        return $this->mpa152;
    }
    public function setMpa152(?string $mpa152): self
    {
        $this->mpa152 = $mpa152;
        return $this;
    }

    public function getMpa153(): ?string
    {
        return $this->mpa153;
    }
    public function setMpa153(?string $mpa153): self
    {
        $this->mpa153 = $mpa153;
        return $this;
    }

    public function getMpa154(): ?string
    {
        return $this->mpa154;
    }
    public function setMpa154(?string $mpa154): self
    {
        $this->mpa154 = $mpa154;
        return $this;
    }

    public function getMpa161(): ?string
    {
        return $this->mpa161;
    }
    public function setMpa161(?string $mpa161): self
    {
        $this->mpa161 = $mpa161;
        return $this;
    }

    public function getMpa162(): ?string
    {
        return $this->mpa162;
    }
    public function setMpa162(?string $mpa162): self
    {
        $this->mpa162 = $mpa162;
        return $this;
    }

    public function getMpa163(): ?string
    {
        return $this->mpa163;
    }
    public function setMpa163(?string $mpa163): self
    {
        $this->mpa163 = $mpa163;
        return $this;
    }
    public function getMpa171(): ?string
    {
        return $this->mpa171;
    }
    public function setMpa171(?string $mpa171): self
    {
        $this->mpa171 = $mpa171;
        return $this;
    }

    public function getMpa172(): ?string
    {
        return $this->mpa172;
    }
    public function setMpa172(?string $mpa172): self
    {
        $this->mpa172 = $mpa172;
        return $this;
    }

    public function getMpa1713): ?string
    {
        return $this->mpa173;
    }
    public function setMpa173(?string $mpa173): self
    {
        $this->mpa173 = $mpa173;
        return $this;
    }

    public function getMpa181(): ?string
    {
        return $this->mpa181;
    }
    public function setMpa181(?string $mpa181): self
    {
        $this->mpa181 = $mpa181;
        return $this;
    }

    public function getMpa182(): ?string
    {
        return $this->mpa182;
    }
    public function setMpa182(?string $mpa182): self
    {
        $this->mpa182 = $mpa182;
        return $this;
    }

    public function getMpa183(): ?string
    {
        return $this->mpa183;
    }
    public function setMpa183(?string $mpa183): self
    {
        $this->mpa183 = $mpa183;
        return $this;
    }

    public function getMpa184(): ?string
    {
        return $this->mpa184;
    }
    public function setMpa184(?string $mpa184): self
    {
        $this->getMpa184 = $mpa184;
        return $this;
    }

    public function getMpa191(): ?string
    {
        return $this->mpa191;
    }
    public function setMpa191(?string $mpa191): self
    {
        $this->mpa191 = $mpa191;
        return $this;
    }

    public function getMpa192(): ?string
    {
        return $this->mpa192;
    }
    public function setMpa192(?string $mpa192): self
    {
        $this->mpa192 = $mpa192;
        return $this;
    }

    public function getMpa193IdNomenclador(): ?Nomenclador
    {
        return $this->mpa193IdNomenclador;
    }

    public function setMpa193IdNomenclador(?Nomenclador $mpa193IdNomenclador): self
    {
        $this->mpa193IdNomenclador = $mpa193IdNomenclador;
        return $this;
    }

    public function getMpa194(): ?string
    {
        return $this->mpa194;
    }
    public function setMpa194(?string $mpa194): self
    {
        $this->mpa194 = $mpa194;
        return $this;
    }

    public function getMpa195IdNomenclador(): ?Nomenclador
    {
        return $this->mpa195IdNomenclador;
    }
    public function setMpa195IdNomenclador(?Nomenclador $mpa195IdNomenclador): self
    {
        $this->mpa195IdNomenclador = $mpa195IdNomenclador;
        return $this;
    }

    public function getMpa196(): ?string
    {
        return $this->mpa196;
    }
    public function setMpa196(?string $mpa196): self
    {
        $this->mpa196 = $mpa196;
        return $this;
    }

    public function getMpa197IdNomenclador(): ?Nomenclador
    {
        return $this->mpa197IdNomenclador;
    }
    public function setMpa197IdNomenclador(?Nomenclador $mpa197IdNomenclador): self
    {
        $this->mpa197IdNomenclador = $mpa197IdNomenclador;
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
