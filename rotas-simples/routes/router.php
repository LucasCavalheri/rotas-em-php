<?php

function load(string $controller, string $action)
{
    try {
        $controllerNamespace = "App\\controllers\\{$controller}";
        if (!class_exists($controllerNamespace)) {
            throw new \Exception("O Controller: {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new \Exception("O Método: {$action} não existe no Controller: {$controller}");
        }

        $controllerInstance->$action((object) $_REQUEST);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}

$router = [
    'GET' => [
        '/' => fn () => load('HomeController', 'index'),
        '/contact' => fn () => load('ContactController', 'index'),
    ],
    'POST' => [
        '/contact' => fn () => load('ContactController', 'store'),
    ],
];
