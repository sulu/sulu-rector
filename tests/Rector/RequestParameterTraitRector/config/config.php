<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sulu\Rector\Rector\RequestParameterTraitRector;

return RectorConfig::configure()
    ->withRules([
        RequestParameterTraitRector::class,
    ]);
