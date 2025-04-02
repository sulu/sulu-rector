<?php

declare(strict_types=1);

namespace Sulu\Rector\Tests\Set\Sulu24;

use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class Sulu24Test extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData
     */
    public function test(string $fileInfo): void
    {
        $this->doTestFile($fileInfo);
    }

    /**
     * @return \Iterator<array{0: string}>
     */
    public function provideData(): \Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/sulu-24.php';
    }
}
