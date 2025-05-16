<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'jf_denuncias')]
class JfDenuncias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_jf_denuncias', type: 'integer')]
    private int $idJfDenuncias;

    #[ORM\ManyToOne(targetEntity: Jf::class)]
    #[ORM\JoinColumn(name: 'jf_id_jf', referencedColumnName: 'id_jf')]
    private ?Jf $jf;

    #[ORM\Column(name: 'jf_1_1', type: 'string', length: 255)]
    private string $jf11;

    
    // Métodos getter y setter para idJfDenuncias
    public function getIdJfDenuncias(): int
    {
        return $this->idJfDenuncias;
    }

    // No se proporciona un setter para idJfDenuncias, ya que Doctrine lo gestiona automáticamente

    // Métodos getter y setter para jf
    public function getJf(): ?Jf
    {
        return $this->jf;
    }

    public function setJf(?Jf $jf): self
    {
        $this->jf = $jf;
        return $this;
    }

    // Métodos getter y setter para jf11
    public function getJf11(): string
    {
        return $this->jf11;
    }

    public function setJf11(string $jf11): self
    {
        $this->jf11 = $jf11;
        return $this;
    }
}
