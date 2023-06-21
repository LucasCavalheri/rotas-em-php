<?php

namespace app\routes;

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
                '/' => self::load('HomeController', 'index'),
                '/contact' =>  self::load('ContactController', 'index'),
            ],
            'POST' => [
                '/contact' => self::load('ContactController', 'store'),
            ],
            'PUT' => [
                '/product' => self::load('ProductController', 'update'),
            ]
        ];
    }
}
