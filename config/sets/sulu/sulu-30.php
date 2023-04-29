<?php

declare(strict_types=1);

use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\FloatType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\IterableType;
use PHPStan\Type\MixedType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration;

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
        ],
    );
};
