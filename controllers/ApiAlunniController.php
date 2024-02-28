<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once("Classe.php");

class ApiAlunniController {
    public function list(Request $request, Response $response, array $args) {
        $class = new Classe("Asilo Nido Gauss");
        $response->getBody()->write(json_encode($class, JSON_PRETTY_PRINT));
        return $response->withHeader("Content-Type", "application/json");
    }

    public function showOne(Request $request, Response $response, array $args) {
        $class = new Classe("Asilo Nido Gauss");
        $alunno = $class->getAlunno(($args["name"]));
        if (is_null($alunno)) {
            $response->getBody()->write("Errore");
            return $response->withStatus(400);
        } else {
            $response->getBody()->write(json_encode($alunno, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json");
        }
    }



}

?>