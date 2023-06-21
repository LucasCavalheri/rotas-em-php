<?php

namespace app\helpers;

class Request
{
    public static function get(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
