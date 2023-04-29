<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            // @see https://github.com/sulu/sulu/pull/7053
            new MethodCallRename(
                'Sulu\Component\Webspace\Portal',
                'getXDefaultLocalization',
                'getDefaultLocalization',
            ),
            // @see https://github.com/sulu/sulu/pull/7053
            new MethodCallRename(
                'Sulu\Component\Webspace\Portal',
                'setXDefaultLocalization',
                'setDefaultLocalization',
            ),
            // @see https://github.com/sulu/sulu/pull/7053
            new MethodCallRename(
                'Sulu\Component\Localization\Localization',
                'isXDefault',
                'isDefault',
            ),
            // @see https://github.com/sulu/sulu/pull/7053
            new MethodCallRename(
                'Sulu\Component\Security\Event\PermissionUpdateEvent',
                'getSecurityIdentity',
                'getPermissions',
            ),
        ],
    );
};
