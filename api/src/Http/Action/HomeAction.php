<?php

namespace App\Http\Action;

use App\Http\JsonResponse;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use stdClass;

use function file_put_contents;

class HomeAction implements RequestHandlerInterface
{

    /**
     * @var ResponseFactoryInterface
     */
//    private ResponseFactoryInterface $factory;

   /* public function __construct(ResponseFactoryInterface $factory)
    {
        $this->factory = $factory;
    }*/

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /*$response = $this->factory->createResponse();
        return Http::json($response, new stdClass());*/
//        file_put_contents('php://stdout', 'Success_');
//        file_put_contents('php://stderr', 'Error_');
        return new JsonResponse(new stdClass());
    }
}
