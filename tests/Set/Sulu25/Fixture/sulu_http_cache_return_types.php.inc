<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class SuluHttpCacheReturnTypes extends \Sulu\Bundle\HttpCacheBundle\Cache\SuluHttpCache {
    public function fetch(\Symfony\Component\HttpFoundation\Request $request, $catch = false)
    {
        return parent::fetch($request, $catch);
    }

    protected function createStore()
    {
        parent::createStore();
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class SuluHttpCacheReturnTypes extends \Sulu\Bundle\HttpCacheBundle\Cache\SuluHttpCache {
    public function fetch(\Symfony\Component\HttpFoundation\Request $request, $catch = false): \Symfony\Component\HttpFoundation\Response
    {
        return parent::fetch($request, $catch);
    }

    protected function createStore(): \Symfony\Component\HttpKernel\HttpCache\StoreInterface
    {
        parent::createStore();
    }
}

?>
