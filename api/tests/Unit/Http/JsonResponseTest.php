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

// Advanced tests
    /**
     * @dataProvider getCases
     * @param mixed $source
     * @param mixed $expect
     */
    public function testResponse($source, $expect): void
    {
        $response = new JsonResponse($source);

        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        self::assertEquals($expect, $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    /**
     * @return array<mixed>
     */
    public function getCases(): array
    {
        $object = new stdClass();
        $object->str = 'value';
        $object->int = 1;
        $object->none = null;

        $array = [
            'str' => 'value',
            'int' => 1,
            'none' => null
        ];

        return [
            'null' => [null, 'null'],
            'empty' => ['', '""'],
            'number' => [12, '12'],
            'string' => ['12', '"12"'],
            'object' => [$object, '{"str":"value","int":1,"none":null}'],
            'array' => [$array, '{"str":"value","int":1,"none":null}'],
        ];
    }

}