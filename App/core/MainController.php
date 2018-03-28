<?php

namespace App\core;


class MainController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}