<?php 
namespace App\Security;

use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Stg\Bundle\CasBundle\Service\CasService;
use App\Security\UserProvider;


class AppCustomAuthenticator extends AbstractAuthenticator
{
    private CasService $cas;
    private Security $security;
    private UserProvider $userProvider;

    public function __construct(CasService $cas, Security $security, UserProvider $userProvider)
    {
        $this->cas = $cas;
        $this->security = $security;
        $this->userProvider = $userProvider;
    }

    public function supports(Request $request): ?bool
    {
        return !$this->security->getUser(); // Solo si no está logueado
    }

    public function authenticate(Request $request): Passport
    {
        $user = $this->cas->Authenticate();
        return new SelfValidatingPassport(new UserBadge($user));
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        /** @var \App\Security\User $user */
        $user = $token->getUser();

        // Asignar atributos CAS si están disponibles
        $attributes = $this->cas->getAttributes();

        $user->setCuil($attributes['cuil'] ?? null);
        $user->setNombre($attributes['givenName'] ?? null);
        $user->setApellido($attributes['sn'] ?? null);
       // $user->setEmail($attributes['mail'] ?? null);

        // Redireccionar a home o donde quieras
        return new RedirectResponse('/');
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return new Response("Fallo de autenticación: " . $exception->getMessage(), Response::HTTP_UNAUTHORIZED);
    }

    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        if($request->isXmlHttpRequest()) {
            return new JsonResponse($authException->getMessage(), $authException->getCode());
        }

        //The URL have to be completed by the current request uri,
        // because Cas Server need to know where redirect user after authentication.
        return new RedirectResponse($this->cas->getUri() . $request->getUri());

    }
}
