<?php

namespace App\controllers;

use App\core\MainController;

class Registration extends MainController
{
    public function index()
    {
        $this->view->render('regUsers', []);
    }
}