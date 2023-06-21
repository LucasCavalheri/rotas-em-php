<?php

namespace App\controllers;

class ContactController
{
    public function index()
    {
        Controller::view('contact', []);
    }

    public function store($params)
    {
        var_dump($params->name);
        var_dump($params->email);
        var_dump('contact/store');
    }
}
