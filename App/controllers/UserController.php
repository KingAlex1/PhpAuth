<?php

namespace App\controllers;

use App\core\DBConnector;
use App\core\DBDriver;
use App\core\Request;
use App\core\validation;
use App\core\Auth;
use App\models\registration;

class UserController
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getHash($password)
    {
        return hash('sha256', $password . 'sold');
    }

    public function addUser()
    {
        $addOne = new Registration(
            new DBDriver(DBConnector::getConnect()),
            new Validation(), 'users');
        $user = $addOne->add([
            'login' => $this->request->post('login'),
            'password' => $this->getHash($this->request->post('password')),
            'name' => $this->request->post('name'),
            'age' => $this->request->post('age'),
            'description' => $this->request->post('description'),
            'photo' => $this->request->post('image')
        ]);

//      Авторизация
        $serviceAuth = new Auth();
        $serviceAuth->login($user['id']);
        //  print_r($user['id']);
        header('location:/userlist');
    }

    public function deleteUser()
    {
        $delete = new Registration(new DBDriver(DBConnector::getConnect()),
            new Validation(), 'users');
        $delUser = $delete->delete(['id' => $this->request->post('id')]);
        $delPic = $this->request->post('pic');
        print_r($delPic);
        unlink("photos/$delPic");

        if ($delUser) {
            header('location:/userlist');
        }
    }

    public function signIn()
    {
        $login = new Registration(new DBDriver(DBConnector::getConnect()),
            new Validation(), 'users');
        $user = $login->getByLogin(['login' => $this->request->post('log')]);
        if (!$user) {
            echo "Не верный Логин!";
            return false;
        }
        $mathced = $this->getHash($this->request->post('pass')) === $user['password'];
        if (!$mathced) {
            echo " Не верные данные !";
        }
//      Авторизация
        $serviceAuth = new Auth();
        $serviceAuth->login($user['id']);
      //  print_r($user['id']);
        header('location:/userlist');
    }
}