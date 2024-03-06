<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once("Classe.php");
require_once("controllers/IndexController.php");
require_once("controllers/ApiAlunniController.php");


$app = AppFactory::create();

$app->get("/", "IndexController:home");

$app->get("/api/alunni", "ApiAlunniController:showAll");
$app->post("/api/alunni", "ApiAlunniController:createOne");
$app->get("/api/alunni/{id}", "ApiAlunniController:showOne");

$app->run();
