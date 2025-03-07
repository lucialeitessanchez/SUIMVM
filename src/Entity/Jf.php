<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'jf')]
class Jf
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_jf', type: 'integer')]
    private int $id_jf;

    #[ORM\ManyToOne(targetEntity: Caso::class)]
    #[ORM\JoinColumn(name: 'caso_id_caso', referencedColumnName: 'id_caso')]
    private Caso $caso;

    // Métodos getter y setter para id_jf
    public function getIdJf(): int
    {
        return $this->id_jf;
    }

    // No se proporciona un setter para id_jf, ya que Doctrine lo gestiona automáticamente

    // Métodos getter y setter para caso
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
