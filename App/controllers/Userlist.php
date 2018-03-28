<?php

namespace App\controllers;

use App\core\Auth;
use App\core\DBConnector;
use App\core\DBDriver;
use App\core\validation;
use App\core\MainController;
use App\models\registration;

class UserList extends MainController
{
    public function index()
    {

        $auth = new Auth();
        if (!$auth->isAuth()) {
            header('location:/');
        }
        $out = new Registration(new DBDriver(DBConnector::getConnect()), new Validation(), 'users');
        $users = $out->select();
        $this->view->render('list', $users);
    }
}