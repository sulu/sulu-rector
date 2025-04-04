<?php

namespace Package\Tests\Rector\MyFirstRector\Fixture;

use Sulu\Component\Rest\RequestParametersTrait;
use Symfony\Component\HttpFoundation\Request;

class SomeController
{
    use RequestParametersTrait;

    public function __invoke(Request $request, $id)
    {
        $format = $this->getRequestParameter($request, 'format', default: 'xml');
    }
}
-----
<?php

namespace Package\Tests\Rector\MyFirstRector\Fixture;

use Symfony\Component\HttpFoundation\Request;

class SomeController
{
    public function __invoke(Request $request, $id)
    {
        $format = $request->get('format', 'xml');
    }
}
