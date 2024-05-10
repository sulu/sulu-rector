<?php

declare(strict_types=1);

namespace Sulu\Rector\Set;

use Rector\Set\Contract\SetListInterface;

final class SuluSetList implements SetListInterface
{
    /**
     * @var string
     */
    final public const SULU_24 = __DIR__ . '/../../config/sets/sulu/sulu-24.php';

    /**
     * @var string
     */
    final public const SULU_25 = __DIR__ . '/../../config/sets/sulu/sulu-25.php';

    /**
     * @var string
     */
    final public const SULU_26 = __DIR__ . '/../../config/sets/sulu/sulu-26.php';
}
