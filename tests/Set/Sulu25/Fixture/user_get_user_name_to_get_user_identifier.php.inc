<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class UserGetUserNameToGetUserIdentifier {
    public function getUserIdentifier(\Sulu\Component\Security\Authentication\UserInterface $user): string
    {
        return $user->getUsername();
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class UserGetUserNameToGetUserIdentifier {
    public function getUserIdentifier(\Sulu\Component\Security\Authentication\UserInterface $user): string
    {
        return $user->getUserIdentifier();
    }
}

?>
