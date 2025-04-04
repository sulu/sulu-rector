<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Sulu\Rector\Rector\ListBuilderInterfaceRector;
use Sulu\Rector\Rector\PaginatedRepresentationRector;
use Sulu\Rector\Rector\RequestParameterTraitRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            // Removing old Category functions https://github.com/sulu/sulu/pull/7572
            new MethodCallRename(
                'Sulu\Bundle\CategoryBundle\Entity\CategoryRepository',
                'findByCategoryIds',
                'findByCategoriesIds',
            ),
            new MethodCallRename('Sulu\Bundle\CategoryBundle\Entity\Category', 'addChildren', 'addChild'),
            new MethodCallRename('Sulu\Bundle\CategoryBundle\Entity\Category', 'removeChildren', 'removeChild'),

            new MethodCallRename('Sulu\Bundle\AdminBundle\Admin\View\FormOverlayListViewBuilder', 'setRequestParameters', 'addRequestParameters'),

            // Removing old ListBuilderInterface functions https://github.com/sulu/sulu/pull/7752
            new MethodCallRename('Sulu\Component\Rest\ListBuilder\ListBuilderInterface', 'setFields', 'setSelectFields'),
            new MethodCallRename('Sulu\Component\Rest\ListBuilder\ListBuilderInterface', 'addField', 'addSelectField'),
            new MethodCallRename('Sulu\Component\Rest\ListBuilder\ListBuilderInterface', 'hasField', 'hasSelectField'),
        ],
    );

    // Replacing the RequestParameterTrait: https://github.com/sulu/sulu/pull/7815
    $rectorConfig->rule(RequestParameterTraitRector::class);

    // Manually fixing whereNot -> where: https://github.com/sulu/sulu/pull/7752
    $rectorConfig->rule(ListBuilderInterfaceRector::class);

    // ListRepresentation -> PaginatedRepresentation https://github.com/sulu/sulu/pull/7740
    $rectorConfig->rule(PaginatedRepresentationRector::class);
};
