<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UsuarioBase
 *
 */
#[ORM\MappedSuperclass]
class UsuarioBase
{
    /**
     * @var int
     *
     */
    #[ORM\Column(name:"usua_id", type:"integer", nullable:false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy:"IDENTITY")]
    private $usuaId;

    /**
     * @var string|null
     *
     */
    #[Assert\NotBlank(message:'Este campo no puede estar vacio')]
    #[ORM\Column(name:"usua_apellido", type:"string", length: 45, nullable:false)]
    private $usuaApellido;

    /**
     * @var string|null
     *
     */
    #[Assert\NotBlank(message:'Este campo no puede estar vacio')]
    #[ORM\Column(name:"usua_nombre", type:"string", length: 45, nullable:false)]
    private $usuaNombre;

    /**
     * @var string|null
     *
     */
    #[Assert\Length(
        //groups: ["modificar"],
        min: 11,
        max: 11,
        exactMessage: "Debe contener exactamente {{ limit }} digitos."
    )]
    #[Assert\Positive(
        message: "Debe ingresar un Valor positivo"
    )]
    #[ORM\Column(name:"usua_cuil", type:"string", length: 11, nullable:false)]
    private $usuaCuil;

    /**
     * @var string|null
     *)
     */
    #[ORM\Column(name:"usua_uid", type:"string", length: 45, nullable:true)]
    private $usuaUid;

    /**
     * @var string|null
     *
     */
    #[Assert\Email(
        message: 'El email {{ value }} no es un correo válido.',
    )]
    #[ORM\Column(name:"usua_email", type:"string", length: 255, nullable:true)]
    private $usuaEmail;

    /**
     * @var string|null
     *
     */
    #[ORM\Column(name:"usua_telefono", type:"string", length: 255, nullable:true)]
    private $usuaTelefono;

    public function getUsuaId(): ?int
    {
        return $this->usuaId;
    }

    public function getUsuaApellido(): ?string
    {
        return $this->usuaApellido;
    }

    public function setUsuaApellido(?string $usuaApellido): self
    {
        $this->usuaApellido = $usuaApellido;

        return $this;
    }

    public function getUsuaNombre(): ?string
    {
        return $this->usuaNombre;
    }

    public function setUsuaNombre(?string $usuaNombre): self
    {
        $this->usuaNombre = $usuaNombre;

        return $this;
    }

    public function getUsuaCuil(): ?string
    {
        return $this->usuaCuil;
    }

    public function setUsuaCuil(?string $usuaCuil): self
    {
        $this->usuaCuil = $usuaCuil;

        return $this;
    }

    public function getUsuaUid(): ?string
    {
        return $this->usuaUid;
    }

    public function setUsuaUid(?string $usuaUid): self
    {
        $this->usuaUid = $usuaUid;

        return $this;
    }

    public function getUsuaEmail(): ?string
    {
        return $this->usuaEmail;
    }

    public function setUsuaEmail(?string $usuaEmail): self
    {
        $this->usuaEmail = $usuaEmail;

        return $this;
    }

    public function getUsuaTelefono(): ?string
    {
        return $this->usuaTelefono;
    }

    public function setUsuaTelefono(?string $usuaTelefono): self
    {
        $this->usuaTelefono = $usuaTelefono;

        return $this;
    }


}

