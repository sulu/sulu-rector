<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sulu\Rector\Rector\PaginatedRepresentationRector;

return RectorConfig::configure()
    ->withRules([
        PaginatedRepresentationRector::class,
    ]);
