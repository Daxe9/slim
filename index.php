<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once("Classe.php");


$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Ciao sei nell'index");
    return $response;
});
$app->get('/alunni', function (Request $request, Response $response, $args) {
    $vcia = new Classe("5CIA");
    $allAlunni = $vcia->getAllAlunni();
    $response->getBody()->write(json_encode(
        $vcia,
        JSON_PRETTY_PRINT
    ));
    return $response;
});
$app->get('/alunni/{name}', function (Request $request, Response $response, $args) {
    $vcia = new Classe("5CIA");
    $alunno = $vcia->getAlunno($args["name"]);
    if(is_null( $alunno )) {
        $response->getBody()->write("ERRORE");
    } else {
        $response->getBody()->write(json_encode(
            $alunno,
            JSON_PRETTY_PRINT
        ));
    }
    return $response;
    
});

$app->run();
