<?php

namespace Sulu\Rector\Tests\Set\Sulu24\Fixture;

class SomeClassLocalization {
    public function someMethod(\Sulu\Component\Localization\Localization $localization)
    {
        $localization->setXDefault('en');
        $localization->getXDefault();
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
        $localization->getDefault();
        $localization->isDefault();
    }
}

?>
