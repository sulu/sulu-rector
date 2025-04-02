<?php

declare(strict_types=1);

namespace Sulu\Rector\Tests\Set\Sulu26;

use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class Sulu26Test extends AbstractRectorTestCase
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
    public static function provideData(): \Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/sulu-26.php';
    }
}
