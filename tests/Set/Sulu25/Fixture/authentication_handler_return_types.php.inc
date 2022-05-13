<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class AuthenticationHandlerReturnTypes extends \Sulu\Bundle\SecurityBundle\Security\AuthenticationHandler {
    public function onAuthenticationSuccess(\Symfony\Component\HttpFoundation\Request $request, \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token)
    {
        return parent::onAuthenticationSuccess($request, $token);
    }

    public function onAuthenticationFailure(\Symfony\Component\HttpFoundation\Request $request, \Symfony\Component\Security\Core\Exception\AuthenticationException $exception)
    {
        return parent::onAuthenticationSuccess($request, $exception);
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class AuthenticationHandlerReturnTypes extends \Sulu\Bundle\SecurityBundle\Security\AuthenticationHandler {
    public function onAuthenticationSuccess(\Symfony\Component\HttpFoundation\Request $request, \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token): \Symfony\Component\HttpFoundation\Response
    {
        return parent::onAuthenticationSuccess($request, $token);
    }

    public function onAuthenticationFailure(\Symfony\Component\HttpFoundation\Request $request, \Symfony\Component\Security\Core\Exception\AuthenticationException $exception): \Symfony\Component\HttpFoundation\Response
    {
        return parent::onAuthenticationSuccess($request, $exception);
    }
}

?>
