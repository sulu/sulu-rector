<?php

declare(strict_types=1);

namespace Sulu\Rector\Rector;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\BinaryOp\Coalesce;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\Throw_;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\Node\Stmt\Use_;
use PhpParser\NodeVisitor;
use Rector\Contract\Rector\RectorInterface;
use Rector\Rector\AbstractRector;
use Sulu\Component\Rest\RequestParametersTrait;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

class RequestParameterTraitRector extends AbstractRector implements RectorInterface
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Converts calls to RequestParameterTrait into Request calls',
            [
                new CodeSample(
                    <<<CODE_SAMPLE
                    class Test {
                        use RequestParameterTrait;
                        public function invoke(Request \$request) {
                            \$this->getRequestParameter(\$request, 'some_prop');
                        }
                    }
                    CODE_SAMPLE,
                    <<<CODE_SAMPLE
                    class Test {
                        public function invoke(Request \$request) {
                            \$request->get('some_prop');
                        }
                    }
                    CODE_SAMPLE
                ),
            ],
        );
    }

    public function getNodeTypes(): array
    {
        return [Use_::class, Class_::class, MethodCall::class];
    }

    public function refactor(Node $node)
    {
        if ($node instanceof Use_) {
            $counter = \count($node->uses);
            for ($i = 0; $i < $counter; ++$i) {
                if ($this->isName($node->uses[$i], RequestParametersTrait::class)) {
                    unset($node->uses[$i]);
                }
            }
            if (0 === \count($node->uses)) {
                return NodeVisitor::REMOVE_NODE;
            }
        }

        if ($node instanceof Class_) {
            $counter = \count($node->stmts);
            for ($i = 0; $i < $counter; ++$i) {
                $stmt = $node->stmts[$i];
                if ($stmt instanceof TraitUse) {
                    for ($j = 0; $j < \count($stmt->traits); ++$j) {
                        if ($this->isName($stmt->traits[$j], RequestParametersTrait::class)) {
                            unset($stmt->traits[$j]);
                        }
                    }
                    if (0 === \count($stmt->traits)) {
                        unset($node->stmts[$i]);
                    }
                }
            }
        }

        if ($node instanceof MethodCall) {
            return $this->refactorMethodCall($node);
        }

        return $node;
    }

    private function refactorMethodCall(MethodCall $methodCall): Expr
    {
        if ($this->nodeNameResolver->isName($methodCall->var, '$this')
            || 'getRequestParameter' !== $this->getName($methodCall->name)) {
            return $methodCall;
        }

        /** @var array<Arg> $args */
        $args = $methodCall->args;
        $arguments = $this->arguments($args, [
            'request' => null,
            'parameterName' => null,
            'force' => $this->nodeFactory->createFalse(),
            'default' => null,
        ]);

        $default = $arguments['default'];

        $request = $arguments['request'];
        Assert::isInstanceOf($request, Expr::class, 'Request parameter must be set');

        $parameterName = $arguments['parameterName'];
        Assert::isInstanceOf($parameterName, Expr::class, 'Parameter must be set');
        Assert::isInstanceOf($parameterName, String_::class, 'Parameter name must be a string');

        $force = $arguments['force'];
        Assert::isInstanceOf($force, ConstFetch::class);

        // IF FORCE IS false we can just convert it one to one to a symfony request call.
        if ($this->isName($force->name, 'false')) {
            $methodCall->var = $request;
            $methodCall->name = new Identifier('get');

            $methodCall->args = $this->createArguments($default, $parameterName);

            return $methodCall;
        }

        // IF FORCE IS false we can just convert it one to one to a symfony request call.
        if ($this->isName($force->name, 'true')) {
            // We don't want default values for this:
            if ($default instanceof ConstFetch && $this->isName($default->name, 'null')) {
                throw new \InvalidArgumentException('You can not use "force" and default value');
            }

            return $this->createNonOptionalCalls($request, $parameterName);
        }

        throw new \InvalidArgumentException('The force parameter needs to be a constant.');
    }

    /**
     * @param array<Arg> $arguments
     * @param array<string, Expr|null> $definitions
     *
     * @return array<string, Expr|null>
     */
    private function arguments(array $arguments, array $definitions): array
    {
        $currentArgumentPosition = 0;
        $names = \array_keys($definitions);
        $result = [];
        foreach ($arguments as $argument) {
            if (null === $argument->name) {
                // Get the argument name based on the position
                $name = $names[$currentArgumentPosition++];
                unset($definitions[$name]);
            } else {
                // Get the argument name from the named argument
                $name = $this->getName($argument->name);
            }
            $result[$name] = $argument->value;
        }

        // Concatenate the remaining defaulted arguments
        return [...$definitions, ...$result];
    }

    /**
     * @return array<Arg>
     */
    private function createArguments(?Expr $default, Expr $parameterName): array
    {
        if (!$default instanceof Expr || $default instanceof ConstFetch && $this->isName($default->name, 'null')) {
            return [new Arg($parameterName)];
        }

        return [new Arg($parameterName), new Arg($default)];
    }

    private function createNonOptionalCalls(Expr $expr, String_ $parameterName): Expr
    {
        $string = new String_(\sprintf('Missing request parameter: "%s"', $parameterName->value));

        return new Coalesce(
            left: new MethodCall(
                $expr,
                'get',
                $this->createArguments(null, $parameterName),
            ),
            right: new Throw_(
                expr: new New_(new FullyQualified(['InvalidArgumentException']), [new Arg($string)]),
            ),
        );
    }
}
