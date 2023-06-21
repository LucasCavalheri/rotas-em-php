<?php
require '../vendor/autoload.php';
require '../routes/router.php';

try {
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $request = $_SERVER['REQUEST_METHOD'];

    if (!isset($router[$request])) {
        // $router['GET']
        throw new \Exception("A rota {$uri} não existe");
    }

    if (!array_key_exists($uri, $router[$request])) {
        // $router['GET']['/']
        throw new \Exception("A rota {$uri} não existe");
    }

     $router[$request][$uri];
} catch (\Exception $e) {
    echo $e->getMessage();
}
