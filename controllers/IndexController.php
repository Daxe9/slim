<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class IndexController {
    function home(Request $request, Response $response, array $args) {
        $response->getBody()->write("Oil up");
        return $response;
    }
}

?>