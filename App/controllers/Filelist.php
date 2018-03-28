<?php

namespace App\controllers;

use App\core\Auth;
use App\core\DBConnector;
use App\core\DBDriver;
use App\core\validation;
use App\core\MainController;
use App\models\registration;

class FileList extends MainController
{

    public function index()
    {
        $auth = new Auth();
        if (!$auth->isAuth()) {
            header('location:/');
        }

        $image = new  Registration(new DBDriver(DBConnector::getConnect()), new
        Validation(), 'users');
        $pictures = $image->selectImages();
        $this->view->render('filelist', $pictures);
    }
}