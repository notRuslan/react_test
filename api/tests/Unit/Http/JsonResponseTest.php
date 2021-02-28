<?php

declare(strict_types=1);

namespace Test\Unit\Http;


use App\Http\JsonResponse;
use PHPUnit\Framework\TestCase;
use stdClass;


/**
 * @covers JsonResponse
 * Class JsonResponseTest
 * @package Test\Unit\Http
 */
class JsonResponseTest extends TestCase
{

    /**
     * @covers ::publicMethod
     */
    public function testIntWithCode():void
    {
        $response = new JsonResponse(12, 201);
        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        self::assertEquals('12', (string)$response->getBody()->getContents());
        self::assertEquals('201', $response->getStatusCode());
    }

    public function testNull(): void
    {
        $response = new JsonResponse(null);

        self::assertEquals('null', $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test // use if not start from test
     *
     */
    public function testInt():void
    {
        $response = new JsonResponse(12);
        self::assertEquals('12', (string)$response->getBody()->getContents());
        self::assertEquals('200', $response->getStatusCode());
    }

    public function testString(): void
    {
        $response = new JsonResponse('12');

        self::assertEquals('"12"', $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    public function testObject(): void
    {
        $object = new stdClass();
        $object->str = 'value';
        $object->int = 1;
        $object->none = null;

        $response = new JsonResponse($object);

        self::assertEquals('{"str":"value","int":1,"none":null}', $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    public function testArray(): void
    {
        $array = ['str' => 'value', 'int' => 1, 'none' => null];

        $response = new JsonResponse($array);

        self::assertEquals('{"str":"value","int":1,"none":null}', $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

}