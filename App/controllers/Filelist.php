<?php

namespace App\controllers;

use App\core\Auth;
use App\models\User;
use App\core\MainController;

class FileList extends MainController
{

    public function index()
    {
        $auth = new Auth();
        if (!$auth->isAuth()) {
            header('location:/');
        }

        $users = User::all();
        $data = $users->toArray();
        $this->view->render('filelist', $data);
    }
}