<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class RouteEnhancerReturnTypes extends \Sulu\Component\CustomUrl\Routing\Enhancers\StructureEnhancer {
    public function enhance(array $defaults, \Symfony\Component\HttpFoundation\Request $request)
    {
        return parent::enhance($defaults, $request);
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class RouteEnhancerReturnTypes extends \Sulu\Component\CustomUrl\Routing\Enhancers\StructureEnhancer {
    public function enhance(array $defaults, \Symfony\Component\HttpFoundation\Request $request): array
    {
        return parent::enhance($defaults, $request);
    }
}

?>
