<?php

namespace App\Security;

use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;



class User implements UserInterface
{   
    private $id;
    private string $username;
    private array $roles = [];
    private $nombre ;
    private $apellido;
    private $cuil;
    private $password;


    function __construct( $id, $password, $roles ) 
    {
        $this->id = $id;
        $this->password = $password;
        $this->roles = $roles;
        
    }


    public function getId(): ?string
    {
        return $this->id;
    }

    // Requeridos por Symfony
    public function getUserIdentifier(): string { return $this->username; }
    public function getPassword(): ?string { return $this->password; }
    public function getSalt(){  }
    public function eraseCredentials(): void {}

    // Métodos personalizados
    public function getNombre(): ?string { return $this->nombre; }
    public function getApellido(): ?string { return $this->apellido; }
    public function getCuil(): ?string
    {
        return $this->cuil;
    }


    public function getNombreCompleto(): string
    {
        return trim($this->nombre . ' ' . $this->apellido);
    }
    public function setCuil(string $cuil): self
    {
        $this->cuil = $cuil;
        return $this;
    }


    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        return $this->roles;
    }
    
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }
    
    public function addRol($rol): self
    {
        if (!in_array($rol,$this->roles))
            $this->roles[] = $rol;
        return $this;
    }

}
