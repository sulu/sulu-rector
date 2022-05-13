<?php

namespace Sulu\Rector\Tests\Set\Sulu24\Fixture;

class SomeClassLocalization {
    public function someMethod(\Sulu\Component\Localization\Localization $localization)
    {
        $localization->setXDefault('en');
        $localization->getLocalization('_');
        $localization->getLocalization('-');
        $localization->isXDefault();
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu24\Fixture;

class SomeClassLocalization {
    public function someMethod(\Sulu\Component\Localization\Localization $localization)
    {
        $localization->setDefault('en');
        $localization->getLocale(\Sulu\Component\Localization\Localization::UNDERSCORE);
        $localization->getLocale(\Sulu\Component\Localization\Localization::DASH);
        $localization->isDefault();
    }
}

?>
