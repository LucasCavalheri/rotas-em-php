<?php

function load(string $controller, string $action)
{
    $controllerNamespace = "App\\controllers\\{$controller}";
    if (!class_exists($controllerNamespace)) {
        throw new \Exception("O Controller: {$controller} não existe");
    }

    $controllerInstance = new $controllerNamespace();

    if (!method_exists($controllerInstance, $action)) {
        throw new \Exception("O Método: {$action} não existe no Controller: {$controller}");
    }

    $controllerInstance->$action();
}

$routes = [
    'GET' => [
        '/' => load('HomeController', 'index'),
        '/contact' => load('ContactController', 'index'),
    ],
    'POST' => [
        '/contact' => load('ContactController', 'store'),
    ],
];
