# Sulu Rector

Rector rules for Sulu CMS upgrades.

## Install

Install rector and sulu rector via composer to your project:

```bash
composer require rector/rector --dev
composer require sulu/sulu-rector --dev
```

## Use Sets

To add a set to your config, use `Sulu\Rector\Set\SymfonySetList` and `Sulu\Rector\Set\SuluLevelSetList`
class and pick one of constants:

```php
use Rector\Sulu\Set\SuluLevelSetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->symfonyContainerXml(__DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml');

    $rectorConfig->sets([
        SuluLevelSetList::UP_TO_SULU_24,
    ]);
};
```
