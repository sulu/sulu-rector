<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sulu\Rector\Set\SuluLevelSetList;
use Sulu\Rector\Set\SuluSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([SuluSetList::SULU_30, SuluLevelSetList::UP_TO_SULU_26]);
};
