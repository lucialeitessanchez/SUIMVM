<?php

namespace App\Security;

use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class UserProvider implements UserProviderInterface
{   
    private RequestStack $requestStack;
    private EntityManagerInterface $entityManager;

    public function __construct(RequestStack $requestStack,
    EntityManagerInterface $entityManager)
    {
        $this->requestStack = $requestStack;
        $this->entityManager = $entityManager;
    }
    public function loadUserByIdentifier(string $identifier): UserInterface
    {   
        // 1️⃣ Traer datos de CAS desde sesión
        $session = $this->requestStack->getSession(); // necesitás inyectar RequestStack
        $attrs = $session->get('cas_user_data', []);
    
          // Acá deberías buscar el usuario por nombre de usuario, email, etc.
        // aca mas adelante tengo que tener en mi BD guardado los usuarios que deberian poder usar el sistema
        //usuario en BD usando CUIL
        $usuarioBd = $this->entityManager
        ->getRepository(Usuario::class)
        ->findOneBy(['usuaCuil' => $identifier]);
    
        if (!$usuarioBd) {
            return new User($identifier, '', ['ROLE_NO_ACCESS']);
        }
    
    $roles = [];
        
    foreach ($usuarioBd->getRoles() as $rol) {
        $roles[] = $rol->getRolId();
    }
    
    $user = new User($identifier, '', $roles);
    
    if ($usuarioBd->getOrganismo()) {
        $user
            ->setIdOrganismo($usuarioBd->getOrganismo()->getIdOrganismo())
            ->setNombreOrganismo($usuarioBd->getOrganismo()->getNombreOrganismo())
            ->setNombre($usuarioBd->getUsuaNombre().','.$usuarioBd->getUsuaApellido())
            ->setUid($usuarioBd->getUsuaUid());
    }
    
    return $user;
}


    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException();
        }

        // Opcional: volver a cargar el usuario desde tu fuente
        return $user;
    }

    public function supportsClass(string $class): bool
    {
        return is_a($class, User::class, true);
    }
}
