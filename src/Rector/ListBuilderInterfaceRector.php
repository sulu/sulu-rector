<?php

declare(strict_types=1);

namespace Sulu\Rector\Rector;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PHPStan\Type\ObjectType;
use Rector\Contract\Rector\RectorInterface;
use Rector\Rector\AbstractRector;
use Sulu\Component\Rest\ListBuilder\ListBuilderInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

class ListBuilderInterfaceRector extends AbstractRector implements RectorInterface
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Fixes ListBuilderInterface',
            [
                new CodeSample(
                    <<<CODE_SAMPLE
                    use Sulu\Component\Rest\ListBuilder\ListBuilderInterface;
                    class Test implements ListBuilderInterface {
                        public function invoke() {
                            \$this->whereNot(\$fieldDescriptor, 'value');
                        }
                    }
                    CODE_SAMPLE,
                    <<<CODE_SAMPLE
                    use Sulu\Component\Rest\ListBuilder\ListBuilderInterface;
                    class Test implements ListBuilderInterface {
                        public function invoke() {
                            \$this->where(\$fieldDescriptor, 'value', ListBuilderInterface::WHERE_COMPARATOR_UNEQUAL);
                        }
                    }
                    CODE_SAMPLE
                ),
            ],
        );
    }

    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    public function refactor(Node $node)
    {
        /** @var MethodCall $node */
        $objectType = new ObjectType(ListBuilderInterface::class);
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, $objectType)) {
            return null;
        }

        $node->name = new Identifier('where');
        $node->args[] = new Arg(
            new ClassConstFetch(
                new Name(['ListBuilderInterface']),
                new Identifier('WHERE_COMPARATOR_UNEQUAL'),
            ),
        );

        return $node;
    }
}
