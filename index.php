<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once("Classe.php");
require_once("controllers/IndexController.php");
require_once("controllers/ApiAlunniController.php");


$app = AppFactory::create();

$app->get("/", "IndexController:home");
// $app->get('/', function (Request $request, Response $response, $args) {
//     $response->getBody()->write("Ciao sei nell'index");
//     return $response;
// });
$app->get('/alunni', function (Request $request, Response $response, $args) {
    $vcia = new Classe("5CIA");
    $allAlunni = $vcia->getAllAlunni();
    $response->getBody()->write($allAlunni);
    return $response;
});
$app->get('/alunni/{name}', function (Request $request, Response $response, $args) {
    $vcia = new Classe("5CIA");
    $alunno = $vcia->getAlunno($args["name"]);
    if(is_null( $alunno )) {
        $response->getBody()->write("ERRORE");
    } else {
        $response->getBody()->write($alunno);
    }
    return $response;
    
});

$app->get("/api/alunni", "ApiAlunniController:list");
$app->get("/api/alunni/{name}", "ApiAlunniController:showOne");

$app->run();
