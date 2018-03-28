<?php

namespace App\controllers;

use App\core\MainController;

class Authorization extends MainController
{
    public function index()
    {
        $this->view->render('authUsers', []);
    }
}