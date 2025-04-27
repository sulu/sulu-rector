<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;

return static function (RectorConfig $rectorConfig): void {
    $classRenames = [
        'Sulu\Bundle\RouteBundle\Model\RoutableInterface' => 'Sulu\Bundle\ContentBundle\Content\Domain\Model\RoutableTrait',
    ];

    $modelClasses = [
        'ContentRichEntityInterface',
        'DimensionContentInterface',
        'DimensionContentTrait',
        'RoutableInterface',
        'TemplateInterface',
        'TemplateTrait',
        'WorkflowInterface',
        'WorkflowTrait',
    ];

    // Content Bundle
    foreach ($modelClasses as $modelClass) {
        $classRenames['Sulu\\Bundle\\ContentBundle\\Content\\Domain\\Model\\' . $modelClass] = 'Sulu\\Content\\Domain\\Model\\' . $modelClass;
    }

    // TODO: Add all the renames for bundles here:
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, $classRenames);
};
