<?php

declare(strict_types=1);

use Rector\Arguments\Rector\ClassMethod\ReplaceArgumentDefaultValueRector;
use Rector\Arguments\ValueObject\ReplaceArgumentDefaultValue;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        ReplaceArgumentDefaultValueRector::class,
        [
            // @see https://github.com/sulu/sulu/pull/2214
            new ReplaceArgumentDefaultValue(
                'Sulu\Component\Localization\Localization',
                'getLocalization',
                0,
                '_',
                'Sulu\Component\Localization\Localization::UNDERSCORE',
            ),
            new ReplaceArgumentDefaultValue(
                'Sulu\Component\Localization\Localization',
                'getLocalization',
                0,
                '-',
                'Sulu\Component\Localization\Localization::DASH',
            ),
        ],
    );

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
                'getLocalization',
                'getLocale',
            ),
            new MethodCallRename(
                'Sulu\Component\Localization\Localization',
                'isXDefault',
                'isDefault',
            ),
        ]);
};
