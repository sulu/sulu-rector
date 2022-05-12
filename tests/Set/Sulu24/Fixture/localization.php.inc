<?php

class SomeClass {
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

class SomeClass {
    public function someMethod(\Sulu\Component\Localization\Localization $localization)
    {
        $localization->setDefault('en');
        $localization->getDefault();
        $localization->isDefault();
    }
}

?>
