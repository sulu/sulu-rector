<?php

namespace Sulu\Rector\Tests\Set\Sulu30\Fixture;

class PortalLocalizationXDefaultToDefault {
    public function getDefaultLocalization(\Sulu\Component\Webspace\Portal $portal): string
    {
        return $portal->getXDefaultLocalization();
    }

    public function setDefaultLocalization(\Sulu\Component\Webspace\Portal $portal, \Sulu\Component\Localization\Localization $localization): void
    {
        $portal->setXDefaultLocalization($localization);
    }

    public function isDefault(\Sulu\Component\Localization\Localization $localization): string
    {
        return $localization->isXDefault();
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu30\Fixture;

class PortalLocalizationXDefaultToDefault {
    public function getDefaultLocalization(\Sulu\Component\Webspace\Portal $portal): string
    {
        return $portal->getDefaultLocalization();
    }

    public function setDefaultLocalization(\Sulu\Component\Webspace\Portal $portal, \Sulu\Component\Localization\Localization $localization): void
    {
        $portal->setDefaultLocalization($localization);
    }

    public function isDefault(\Sulu\Component\Localization\Localization $localization): string
    {
        return $localization->isDefault();
    }
}

?>
