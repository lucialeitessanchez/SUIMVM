<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolBase
 *
 */
#[ORM\MappedSuperclass]
class RolBase
{
    /**
     * @var string
     *
     */
    #[ORM\Column(name:"rol_id", type:"string", length:45, nullable:false)]
    #[ORM\Id]
    private $rolId;

    /**
     * @var string|null
     *
     */
    #[ORM\Column(name:"rol_descripcion", type:"string", length: 45, nullable:true)]
    private $rolDescripcion;

    /**
     * Set the value of rolId
     *
     * @param  string  $rolId
     *
     * @return  self
     */ 
    public function setRolId(string $rolId)
    {
        $this->rolId = $rolId;

        return $this;
    }

    public function getRolId(): ?string
    {
        return $this->rolId;
    }

    public function getRolDescripcion(): ?string
    {
        return $this->rolDescripcion;
    }

    public function setRolDescripcion(?string $rolDescripcion): self
    {
        $this->rolDescripcion = $rolDescripcion;

        return $this;
    }

}

