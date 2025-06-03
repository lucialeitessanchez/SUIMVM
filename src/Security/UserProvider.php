<?php

namespace App\Security;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Stg\Bundle\CasBundle\Service\CasService;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PortalAcceso\UsuarioRepository;
use Psr\Log\LoggerInterface;

class UserProvider implements UserProviderInterface
{

    public function __construct(private EntityManagerInterface $em, private UsuarioRepository $usuarioRepository, private LoggerInterface $logger)
    { 
    }

    /**
     * Symfony calls this method if you use features like switch_user
     * or remember_me. If you're not using these features, you do not
     * need to implement this method.
     *
     * @throws UserNotFoundException if the user is not found
     */
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        // Load a User object from your data source or throw UserNotFoundException.
        // The $identifier argument is whatever value is being returned by the
        // getUserIdentifier() method in your User class.
        $user = new User($identifier,'',['ROLE_MIGYD_CAS']);
        /**
         * Verifico si tiene acceso como usuario de configuracion de sistema y agrego los roles
         */
        $usuario = $this->usuarioRepository->findOneBy(['usuaCuil' => $identifier]);
        
        if (!$usuario) 
            return $user;
            //throw new UserNotFoundException();
    
        $user = new User($identifier,'',['ROLE_MIGYD_CAS']);
        //foreach ( $usuario->getRoles() as $rol) echo $rol->getRolId();
        $usuario->addRolesToUser($user);

        return $user;
    }

    public function loadUserByUsername(string $identifier): UserInterface
    {   
        return $this->loadUserByIdentifier($identifier);
    }

    /**
     * Refreshes the user after being reloaded from the session.
     *
     * When a user is logged in, at the beginning of each request, the
     * User object is loaded from the session and then this method is
     * called. Your job is to make sure the user's data is still fresh by,
     * for example, re-querying for fresh User data.
     *
     * If your firewall is "stateless: true" (for a pure API), this
     * method is not called.
     *
     * @return UserInterface
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Invalid user class "%s".', get_class($user)));
        }

        return $user;
    }

    /**
     * Tells Symfony to use this provider for this User class.
     */
    public function supportsClass(string $class)
    {
        return User::class === $class || is_subclass_of($class, User::class);
    }

    /**
     * Upgrades the encoded password of a user, typically for using a better hash algorithm.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        // TODO: when encoded passwords are in use, this method should:
        // 1. persist the new password in the user storage
        // 2. update the $user object with $user->setPassword($newEncodedPassword);
    }
}
