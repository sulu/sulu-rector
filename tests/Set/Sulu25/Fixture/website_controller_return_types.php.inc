<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class WebsiteControllerReturnTypes extends \Sulu\Bundle\WebsiteBundle\Controller\WebsiteController {
    public function getSubscribedServices()
    {
        return parent::getSubscribedServices();
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class WebsiteControllerReturnTypes extends \Sulu\Bundle\WebsiteBundle\Controller\WebsiteController {
    public function getSubscribedServices(): array
    {
        return parent::getSubscribedServices();
    }
}

?>
