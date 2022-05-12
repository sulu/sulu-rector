<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig
        ->ruleWithConfiguration(RenameMethodRector::class, [
            // @see https://github.com/sulu/sulu/pull/6071
            new MethodCallRename(
                'Sulu\Component\Localization\Localization',
                'setXDefault',
                'setDefault',
            ),
            new MethodCallRename(
                'Sulu\Component\Localization\Localization',
                'getXDefault',
                'getDefault',
            ),
            new MethodCallRename(
                'Sulu\Component\Localization\Localization',
                'isXDefault',
                'isDefault',
            ),
        ]);
};
