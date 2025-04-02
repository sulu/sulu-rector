<?php

declare(strict_types=1);

namespace Sulu\Rector\Tests\Set\Sulu25;

use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symfony\Component\Security\Core\User\UserInterface;

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
     * @return \Iterator<array{0: string}>
     */
    public function provideData(): \Iterator
    {
        $iterator = self::yieldFilesFromDirectory(__DIR__ . '/Fixture');

        /** @var array{0: string} $fileInfo */
        foreach ($iterator as $fileInfo) {
            // skip test on `lowest` because with Symfony 5.4 this converter is not done
            if (\str_ends_with($fileInfo[0], 'user_get_user_name_to_get_user_identifier.php.inc')
                && !\method_exists(UserInterface::class, 'getUserIdentifier') // @phpstan-ignore-line function.alreadyNarrowedType
            ) {
                continue;
            }

            yield $fileInfo;
        }
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/sulu-25.php';
    }
}
