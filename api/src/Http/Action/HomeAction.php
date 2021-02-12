<?php


namespace App\Http\Action;


use App\Http;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use stdClass;

class HomeAction
{
    public function __invoke(Request $request, Response $response, $args): Response
    {
//        $response->getBody()->write('{}');
//        $response->getBody()->write(json_decodeAlias(new \stdClass(), JSON_THROW_ON_ERROR, 512));
//        return $response->withHeader('Content-Type', 'application/json');
        return Http::json($response, new stdClass());
    }

}