<?php

declare(strict_types=1);

namespace Sulu\Rector\Tests\Set\Sulu25;

use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class Sulu25Test extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData
     */
    public function test(string $fileInfo): void
    {
        $this->doTestFile($fileInfo);
    }

    /**
     * @return \Iterator<string>
     */
    public function provideData(): \Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/sulu-25.php';
    }
}
