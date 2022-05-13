<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class UserReturnTypes extends \Sulu\Bundle\SecurityBundle\Entity\User {
    public function getRoles()
    {
        return [];
    }

    public function isEqualTo(\Symfony\Component\Security\Core\User\UserInterface $user)
    {
        return true;
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class UserReturnTypes extends \Sulu\Bundle\SecurityBundle\Entity\User {
    public function getRoles(): array
    {
        return [];
    }

    public function isEqualTo(\Symfony\Component\Security\Core\User\UserInterface $user): bool
    {
        return true;
    }
}

?>
