<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename(
                'Sulu\Bundle\CategoryBundle\Entity\CategoryRepository',
                'findByCategoryIds',
                'findByCategoriesIds',
            ),
            new MethodCallRename( 'Sulu\Bundle\CategoryBundle\Entity\Category', 'addChildren', 'addChild'),
            new MethodCallRename( 'Sulu\Bundle\CategoryBundle\Entity\Category', 'removeChildren', 'removeChild'),
            new MethodCallRename( 'Sulu\Bundle\AdminBundle\Admin\View\FormOverlayListViewBuilder', 'setRequestParameters', 'addRequestParameters'),
        ],
    );
};

