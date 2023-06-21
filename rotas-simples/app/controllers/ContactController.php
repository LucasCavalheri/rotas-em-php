<?php

namespace App\controllers;

class ContactController
{
    public function index()
    {
        Controller::view('contact', []);
    }

    public function store()
    {
        var_dump('contact/store');
    }
}
