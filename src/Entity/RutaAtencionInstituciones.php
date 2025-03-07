<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ruta_atencion_instituciones')]
class RutaAtencionInstituciones
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_ruta_atencion_instituciones', type: 'integer')]
    private int $idRutaAtencionInstituciones;

    #[ORM\ManyToOne(targetEntity: Ms::class)]
    #[ORM\JoinColumn(name: 'ms_id_ms', referencedColumnName: 'id_ms')]
    private ?Ms $ms = null;

    #[ORM\Column(name: 'ms_3_3', type: 'string', length: 255)]
    private string $ms33;

    // Métodos getter y setter

    public function getIdRutaAtencionInstituciones(): int
    {
        return $this->idRutaAtencionInstituciones;
    }

    public function getMs(): ?Ms
    {
        return $this->ms;
    }

    public function setMs(?Ms $ms): self
    {
        $this->ms = $ms;
        return $this;
    }

    public function getMs33(): string
    {
        return $this->ms33;
    }

    public function setMs33(string $ms33): self
    {
        $this->ms33 = $ms33;
        return $this;
    }
}
