<?php

namespace App\Security;

use Exception;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private $id;

    private $uid;

    private $apellido;

    private $nombre;

    private $email;

    private $cuil;

    private $roles = [];

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

    public function getUserIdentifier(): ?string
    {
        return $this->getId();
    }
    
    public function getUid(): ?string
    {
        return $this->uid;
    }
    
    public function getPassword(): ?string
    {
        return $this->password;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getCuil(): ?string
    {
        return $this->cuil;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;
        return $this;
    }
    
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setCuil(string $cuil): self
    {
        $this->cuil = $cuil;
        return $this;
    }

    
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->uid;
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
    
    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed for apps that do not check user passwords
    }
    
    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
