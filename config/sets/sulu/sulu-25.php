<?php

declare(strict_types=1);

use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        AddReturnTypeDeclarationRector::class,
        [
            // @see https://github.com/sulu/sulu/pull/6582
            new AddReturnTypeDeclaration(
                'Sulu\Bundle\SecurityBundle\Entity\User',
                'getRoles',
                new ArrayType(new IntegerType(), new StringType()),
            ),
            new AddReturnTypeDeclaration(
                'Sulu\Bundle\SecurityBundle\Entity\User',
                'isEqualTo',
                new BooleanType(),
            ),
            // @see https://github.com/sulu/sulu/pull/6601
            new AddReturnTypeDeclaration(
                'Sulu\Bundle\HttpCacheBundle\Cache\SuluHttpCache',
                'fetch',
                new ObjectType('Symfony\Component\HttpFoundation\Response'),
            ),
            new AddReturnTypeDeclaration(
                'Sulu\Bundle\HttpCacheBundle\Cache\SuluHttpCache',
                'createStore',
                new ObjectType('Symfony\Component\HttpKernel\HttpCache\StoreInterface'),
            ),
            // @see https://github.com/sulu/sulu/pull/6583
            new AddReturnTypeDeclaration(
                'Sulu\Bundle\SecurityBundle\Security\AuthenticationHandler',
                'onAuthenticationSuccess',
                new ObjectType('Symfony\Component\HttpFoundation\Response'),
            ),
            new AddReturnTypeDeclaration(
                'Sulu\Bundle\SecurityBundle\Security\AuthenticationHandler',
                'onAuthenticationFailure',
                new ObjectType('Symfony\Component\HttpFoundation\Response'),
            ),
            // @see https://github.com/sulu/sulu/pull/6580
            new AddReturnTypeDeclaration(
                'Sulu\Bundle\WebsiteBundle\Controller\WebsiteController',
                'getSubscribedServices',
                new ArrayType(new StringType(), new StringType()),
            ),
        ],
    );
};
