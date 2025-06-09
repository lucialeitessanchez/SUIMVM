<?php

namespace App\Security;



use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

class UserProvider implements UserProviderInterface
{
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        // Acá deberías buscar el usuario por nombre de usuario, email, etc.
        // En este ejemplo es fijo, pero vos lo podés traer desde una API, LDAP, DB, etc.
        if ($identifier !== 'admin') {
            throw new UserNotFoundException("Usuario '$identifier' no encontrado.");
        }

        return new User($identifier,'admin', ['ROLE_ADMIN']); // Suponiendo que User implementa UserInterface
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
