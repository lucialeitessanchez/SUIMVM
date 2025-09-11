<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

class UserProvider implements UserProviderInterface
{   
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    public function loadUserByIdentifier(string $identifier): UserInterface
    {   
        $session = $this->requestStack->getSession(); // necesitás inyectar RequestStack
        $attrs = $session->get('cas_user_data', []);

        // Acá deberías buscar el usuario por nombre de usuario, email, etc.
        // aca mas adelante tengo que tener en mi BD guardado los usuarios que deberian poder usar el sistema
        if ($identifier !== '24285246209') {
            throw new UserNotFoundException("Usuario '$identifier' no encontrado.");
        }
        return new User($identifier,'', ['ROLE_ADMIN']); // Suponiendo que User implementa UserInterface
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
        return $class === User::class;
    }
}
