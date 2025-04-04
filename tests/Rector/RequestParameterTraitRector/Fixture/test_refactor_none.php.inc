<?php

namespace Package\Tests\Rector\MyFirstRector\Fixture;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SomeController
{
    public function __invoke(Request $request)
    {
        return new Response();
    }
}
