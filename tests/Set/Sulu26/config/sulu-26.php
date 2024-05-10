<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sulu\Rector\Set\SuluSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../config/config.php');
    $rectorConfig->sets([SuluSetList::SULU_26]);
};
