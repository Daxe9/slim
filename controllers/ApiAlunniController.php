<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once("Classe.php");

class ApiAlunniController {
    private $class;
    function __construct() {
        $this->class = new Classe("5CIA");
    }
    public function showAll(Request $request, Response $response, array $args) {
        $response->getBody()->write(json_encode($this->class, JSON_PRETTY_PRINT));
        return $response->withHeader("Content-Type", "application/json");
    }

    public function showOne(Request $request, Response $response, array $args) {
        $alunno = $this->class->getAlunno(($args["id"]));
        if (is_null($alunno)) {
            $response->getBody()->write("Errore");
            return $response->withStatus(400);
        } else {
            $response->getBody()->write(json_encode($alunno, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json");
        }
    }

    public function createOne(Request $request, Response $response, array $array) {
        $body = $request->getBody()->getContents();
        $parsedBody = json_decode($body, true);

        $name = $parsedBody["name"];
        $surname = $parsedBody["surname"];
        $age = $parsedBody["age"];
        $newAlunno = $this->class->addAlunno($name, $surname, $age);
        $response->getBody()->write(json_encode($newAlunno, JSON_PRETTY_PRINT));
        return $response->withHeader("Content-Type", "application/json");
    }



}

?>