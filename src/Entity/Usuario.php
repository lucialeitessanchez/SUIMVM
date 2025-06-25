<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Security\User;
use App\Repository\UsuarioRepository;

/**
 * Usuario
 *
 */
#[ORM\Table(name:'usuario')]
#[ORM\Entity( repositoryClass: UsuarioRepository::class ) ]
class Usuario extends UsuarioBase
{
    #[ORM\ManyToMany( targetEntity: Rol::class, inversedBy: "usuarios" ) ]
    #[ORM\JoinTable(name:"usuario_rol"
                    ,joinColumns:[ new ORM\joinColumn(name:"usuario",  referencedColumnName:"usua_id")]
                    ,inverseJoinColumns:[ new ORM\InverseJoinColumn(name:"rol", referencedColumnName:"rol_id")]) ]
    private $roles;

    function __construct() {
        $this->roles = new ArrayCollection();
    }
    
    public function addRole(Rol $rol)
    {
        if (!$this->roles->contains($rol)) {
            $this->roles->add($rol);
            $rol->addUsuarios($this);
        }
        return $this;
    }
    
    public function removeRole(Rol $rol)
    {
        if ($this->roles->contains($rol)) {
            $this->roles->removeElement($rol);
            $rol->removeUsuarios($this);
        }

        return $this;
    }
    
    public function getRoles() {
        return $this->roles;
    }

    public function addRolesToUser(User $user) {
        foreach ($this->getRoles() as $rol)
            $user->addRol($rol->getRolId());
        return $this;
    }

}

