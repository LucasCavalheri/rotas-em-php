<?php

namespace App\controllers;

class HomeController
{
    public function index()
    { 
        return Controller::view('home', []);
    }
}
