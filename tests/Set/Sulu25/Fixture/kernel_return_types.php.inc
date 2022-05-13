<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class KernelReturnTypes extends \Sulu\Component\HttpKernel\SuluKernel {
    public function registerBundles()
    {
        return parent::registerBundles();
    }

    public function getContainerClass()
    {
        return parent::getContainerClass();
    }

    public function getCacheDir()
    {
        return parent::getCacheDir();
    }

    public function getCommonCacheDir()
    {
        return parent::getCommonCacheDir();
    }

    public function getLogDir()
    {
        return parent::getLogDir();
    }

    public function getKernelParameters()
    {
        return parent::getKernelParameters();
    }

    public function getEnvironment()
    {
        return parent::getEnvironment();
    }

    public function isDebug()
    {
        return parent::isDebug();
    }

    public function getCharset()
    {
        return parent::getCharset();
    }

    public function getStartTime()
    {
        return parent::getStartTime();
    }

    public function getContainer()
    {
        return parent::getContainer();
    }

    public function getBundle($name)
    {
        return parent::getBundle($name);
    }

    public function getBundles(): array
    {
        return parent::getBundles();
    }

    public function locateResource($name)
    {
        return parent::locateResource($name);
    }
}

?>
-----
<?php

namespace Sulu\Rector\Tests\Set\Sulu25\Fixture;

class KernelReturnTypes extends \Sulu\Component\HttpKernel\SuluKernel {
    public function registerBundles(): iterable
    {
        return parent::registerBundles();
    }

    public function getContainerClass(): string
    {
        return parent::getContainerClass();
    }

    public function getCacheDir(): string
    {
        return parent::getCacheDir();
    }

    public function getCommonCacheDir(): string
    {
        return parent::getCommonCacheDir();
    }

    public function getLogDir(): string
    {
        return parent::getLogDir();
    }

    public function getKernelParameters(): array
    {
        return parent::getKernelParameters();
    }

    public function getEnvironment(): string
    {
        return parent::getEnvironment();
    }

    public function isDebug(): bool
    {
        return parent::isDebug();
    }

    public function getCharset(): string
    {
        return parent::getCharset();
    }

    public function getStartTime(): float
    {
        return parent::getStartTime();
    }

    public function getContainer(): \Symfony\Component\DependencyInjection\ContainerInterface
    {
        return parent::getContainer();
    }

    public function getBundle($name): \Symfony\Component\HttpKernel\Bundle\BundleInterface
    {
        return parent::getBundle($name);
    }

    public function getBundles(): array
    {
        return parent::getBundles();
    }

    public function locateResource($name): string
    {
        return parent::locateResource($name);
    }
}

?>
