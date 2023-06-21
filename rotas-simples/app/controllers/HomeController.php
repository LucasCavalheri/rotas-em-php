<?php

namespace App\controllers;

class HomeController
{
    public function index($params)
    { 
        return Controller::view('home', [
            
        ]);
    }
}
