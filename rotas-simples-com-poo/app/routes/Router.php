<?php

namespace app\routes;

class Router
{
    public static function load(string $controller, string $action): void
    {
        
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
        ];
    }
}
