<?php

declare(strict_types=1);

namespace Sulu\Rector\Rector;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Cast\Int_;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Use_;
use PhpParser\NodeVisitor;
use Rector\Contract\Rector\RectorInterface;
use Rector\Rector\AbstractRector;
use Sulu\Component\Rest\ListBuilder\ListRepresentation;

class PaginatedRepresentationRector extends AbstractRector implements RectorInterface
{
    public function getNodeTypes(): array
    {
        return [Use_::class, New_::class];
    }

    public function refactor(Node $node)
    {
        // @phpstan-ignore-next-line We need to refer to a deprecated class here.
        $classToRefactor = ListRepresentation::class;

        // Removing the use statement of the class
        if ($node instanceof Use_) {
            $counter = \count($node->uses);
            for ($i = 0; $i < $counter; ++$i) {
                if ($this->isName($node->uses[$i], $classToRefactor)) {
                    unset($node->uses[$i]);
                }
            }
            if (0 === \count($node->uses)) {
                return NodeVisitor::REMOVE_NODE;
            }
        }

        // Refactoring all "new" calls to that class
        if ($node instanceof New_) {
            if (!$this->isName($node->class, $classToRefactor)) {
                return null;
            }
            $node->class = new FullyQualified('Sulu\Component\Rest\ListBuilder\PaginatedListRepresentation');
            $argumentCount = \count($node->args);
            unset($node->args[2], $node->args[3]);
            for ($i = 4; $i < $argumentCount; ++$i) {
                /** @var Arg $arg */
                $arg = $node->args[$i];
                $node->args[$i] = new Arg(new Int_($arg->value));
            }
        }

        return null;
    }
}
