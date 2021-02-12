<?php
declare(strict_types=1);


use DI\Container;
use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;
use Slim\Factory\AppFactory;


http_response_code(500);
require __DIR__ . '/../vendor/autoload.php';


$builder = new ContainerBuilder();
$builder->addDefinitions([
    'config' => [
        'debug' => (bool)getenv('APP_DEBUG'),
    ],
]);
$container = $builder->build();

$app = AppFactory::createFromContainer($container);
//$app = AppFactory::create();
//$app->addErrorMiddleware(true, true, true);
//$app->addErrorMiddleware((bool)getenv('APP_DEBUG'), true, true);
$app->addErrorMiddleware($container->get('config')['debug'], true, true);


$app->get('/', function (Request $request, Response $response, $args){
//    throw new HttpNotFoundException();
//    throw new RuntimeException('Error');
    $response->getBody()->write('{}');
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();