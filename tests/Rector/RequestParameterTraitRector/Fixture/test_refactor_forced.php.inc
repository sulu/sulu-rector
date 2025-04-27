<?php

namespace Package\Tests\Rector\MyFirstRector\Fixture;

use Sulu\Component\Rest\RequestParametersTrait;
use Symfony\Component\HttpFoundation\Request;

class SomeController
{
    use RequestParametersTrait;

    public function __invoke(Request $request)
    {
        $format = $this->getRequestParameter($request, 'format', true);
    }
}
-----
<?php

namespace Package\Tests\Rector\MyFirstRector\Fixture;

use Symfony\Component\HttpFoundation\Request;

class SomeController
{
    public function __invoke(Request $request)
    {
        $format = $request->get('format') ?? (throw new \InvalidArgumentException('Missing request parameter: "format"'));
    }
}
