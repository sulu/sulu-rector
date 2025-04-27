<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sulu\Rector\Rector\ListBuilderInterfaceRector;

return RectorConfig::configure()
    ->withRules([
        ListBuilderInterfaceRector::class,
    ]);
