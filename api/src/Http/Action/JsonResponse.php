<?php


namespace App\Http\Action;


use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;


class JsonResponse extends \Slim\Psr7\Response
{
public function __construct($data, int $status = 200)
{
    parent::__construct(
        $status,
        new Headers(['Content-Type' => 'application/json' ]),
        (new StreamFactory())->createStream(json_encode($data, JSON_THROW_ON_ERROR))
    );
}
}