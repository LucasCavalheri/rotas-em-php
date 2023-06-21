<?php

namespace App\controllers;

use League\Plates\Engine;

class Controller
{
    public static function view(string $view, array $data)
    {
        $viewsPath = dirname(__FILE__, 2) . '/views';

        if (!file_exists($viewsPath . DIRECTORY_SEPARATOR . $view . '.php')) {
            // como usar quebra de linha em uma string
            throw new \Exception("A View: {$view} não existe \n");
        }

        $templates = new Engine($viewsPath);

        echo $templates->render($view, $data);
    }
}
