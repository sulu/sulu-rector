<?php

namespace Sulu\Rector\Tests\Set\Sulu30\Fixture;

class PermissionUpdateEventGetSecurityIdentityToGetPermissions {
    public function getDefaultLocalization(\Sulu\Component\Security\Event\PermissionUpdateEvent $event): string
    {
        return $event->getSecurityIdentity();
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu30\Fixture;

class PermissionUpdateEventGetSecurityIdentityToGetPermissions {
    public function getDefaultLocalization(\Sulu\Component\Security\Event\PermissionUpdateEvent $event): string
    {
        return $event->getPermissions();
    }
}

?>
