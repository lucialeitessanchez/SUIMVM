<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Tools\SchemaValidator;
use Doctrine\ORM\Tools\Exception\MissingColumnException;
use Doctrine\ORM\Tools\SchemaTool;

/**
 * Rol
 *
 */
#[ORM\Table(name:'rol')]
#[ORM\Entity( ) ]
class Rol extends RolBase
{
    /**
     * @var ArrayCollection
     */
    #[ORM\ManyToMany( targetEntity: Usuario::class, mappedBy:"roles" ) ]
    private $usuarios;

    function __construct() {
        $this->usuarios = new ArrayCollection();
    }

    public function addUsuario(Usuario $usuario)
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios->add($usuario);
            $usuario->addRole($this);
        }
        return $this;
    }
    
    public function removeUsuario(Usuario $usuario)
    {
        if ($this->usuarios->contains($usuario)) {
            $this->usuarios->removeElement($usuario);
            $usuario->removeRole($this);
        }
        return $this;
    }
    
    public function getUsuarios() {
        return $this->usuarios;
    }

    public function getIdDescripcion()
    {
        return sprintf('%s - %s',$this->getRolId(),$this->getRolDescripcion());
    }

}
