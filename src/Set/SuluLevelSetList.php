<?php

declare(strict_types=1);

namespace Sulu\Rector\Set;

use Rector\Set\Contract\SetListInterface;

final class SuluLevelSetList implements SetListInterface
{
    /**
     * @var string
     */
    final public const UP_TO_SULU_24 = __DIR__ . '/../../config/sets/sulu/level/up-to-sulu-24.php';

    /**
     * @var string
     */
    final public const UP_TO_SULU_25 = __DIR__ . '/../../config/sets/sulu/level/up-to-sulu-25.php';
}
