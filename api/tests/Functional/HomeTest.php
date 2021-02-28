<?php

declare(strict_types=1);

namespace Test\Functional;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Psr7\Factory\ServerRequestFactory;

/**
 * Class HomeTest
 * @package Test\Functional
 * @covers Home
 */
class HomeTest extends TestCase
{
    public function testSuccess(): void
    {
        /** @var  ContainerInterface $container */
        $container = require __DIR__ . '/../../config/container.php';

        /** @var App $app */
        $app = (require __DIR__ . '/../../config/app.php')($container);

        $request = (new ServerRequestFactory())
            ->createServerRequest('GET', '/');

        $response = $app->handle($request);

        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('{}', (string)$response->getBody());

    }
}