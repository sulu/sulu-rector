<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class RouteProviderReturnTypes extends \Sulu\Bundle\WebsiteBundle\Routing\ContentRouteProvider {
    public function getRouteCollectionForRequest(\Symfony\Component\HttpFoundation\Request $request)
    {
        return parent::getRouteCollectionForRequest($request);
    }

    public function getRouteByName($name)
    {
        return parent::getRouteByName($name);
    }

    public function getRoutesByNames($names = null)
    {
        return parent::getRoutesByNames($names);
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class RouteProviderReturnTypes extends \Sulu\Bundle\WebsiteBundle\Routing\ContentRouteProvider {
    public function getRouteCollectionForRequest(\Symfony\Component\HttpFoundation\Request $request): \Symfony\Component\Routing\RouteCollection
    {
        return parent::getRouteCollectionForRequest($request);
    }

    public function getRouteByName($name): \Symfony\Component\Routing\Route
    {
        return parent::getRouteByName($name);
    }

    public function getRoutesByNames($names = null): iterable
    {
        return parent::getRoutesByNames($names);
    }
}

?>
