<?php

declare(strict_types=1);

namespace Sulu\Rector\Tests\Rector\PaginatedRepresentationRector;

use Rector\Testing\PHPUnit\AbstractRectorTestCase;

class PaginatedRepresentationRectorTest extends AbstractRectorTestCase
{
    /** @dataProvider provideData  */
    public function test(string $filePath): void
    {
        $this->doTestFile($filePath);
    }

    public static function provideData(): \Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/config.php';
    }
}
