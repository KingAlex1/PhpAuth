<?php

namespace App\controllers;

use App\core\Auth;
use App\core\MainController;
use App\models\User;

class UserList extends MainController
{
    public function index()
    {

        $auth = new Auth();
        if (!$auth->isAuth()) {
            header('location:/');
        }
        $users = User::all();
        $data = $users->toArray();
        $this->view->render('list', $data);
    }
}