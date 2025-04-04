<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Sulu\Rector\Rector\ListBuilderInterfaceRector;
use Sulu\Rector\Rector\RequestParameterTraitRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename(
                'Sulu\Bundle\CategoryBundle\Entity\CategoryRepository',
                'findByCategoryIds',
                'findByCategoriesIds',
            ),
            new MethodCallRename('Sulu\Bundle\CategoryBundle\Entity\Category', 'addChildren', 'addChild'),
            new MethodCallRename('Sulu\Bundle\CategoryBundle\Entity\Category', 'removeChildren', 'removeChild'),
            new MethodCallRename('Sulu\Bundle\AdminBundle\Admin\View\FormOverlayListViewBuilder', 'setRequestParameters', 'addRequestParameters'),
            new MethodCallRename('Sulu\Component\Rest\ListBuilder\ListBuilderInterface', 'setFields', 'setSelectFields'),
            new MethodCallRename('Sulu\Component\Rest\ListBuilder\ListBuilderInterface', 'addField', 'addSelectField'),
            new MethodCallRename('Sulu\Component\Rest\ListBuilder\ListBuilderInterface', 'hasField', 'hasSelectField'),
        ],
    );

    $rectorConfig->rule(RequestParameterTraitRector::class);
    $rectorConfig->rule(ListBuilderInterfaceRector::class);
};
