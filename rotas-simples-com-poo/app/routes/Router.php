<?php

namespace app\routes;

use app\helpers\Request;
use app\helpers\Uri;

class Router
{
    const CONTROLLER_NAMESPACE = 'app\\controllers';

    public static function load(string $controller, string $action): void
    {
        try {
            $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;

            if (!class_exists($controllerNamespace)) {
                throw new \Exception("O Controller: {$controller} não existe\n");
            }

            $controllerInstance = new $controllerNamespace;

            if (!method_exists($controllerInstance, $action)) {
                throw new \Exception("O Método: {$action} não existe no Controller: {$controller}\n");
            }

            $controllerInstance->$action(); // $controllerInstance->index();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public static function routes(): array
    {
        return [
            'GET' => [
                '/' => fn () => self::load('HomeController', 'index'),
                '/contact' => fn () => self::load('ContactController', 'index'),
                '/product' => fn () => self::load('ProductController', 'index'),
            ],
            'POST' => [
                '/contact' => fn () => self::load('ContactController', 'store'),
            ],
            'PUT' => [
                '/product' => fn () => self::load('ProductController', 'update'),
            ]
        ];
    }

    public static function execute()
    {
        try {
            $routes = self::routes();
            $request = Request::get();
            $uri = Uri::get('path');

            if (!isset($routes[$request])) {
                throw new \Exception("O Método: {$request} não é suportado\n");
            }

            if (!array_key_exists($uri, $routes[$request])) {
                throw new \Exception("A Rota: {$uri} não existe\n");
            }

            $router = $routes[$request][$uri];

            if (!is_callable($router)) {
                throw new \Exception("A Rota: {$uri} não é uma função\n");
            }

            $router();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
