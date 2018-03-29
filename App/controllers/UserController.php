<?php

namespace App\controllers;


use App\core\Request;
use App\core\validation;
use App\core\Auth;
use App\models\User;

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
   //     $clearData = Validation::checkData()
        $user = User::create([
            'login' => $this->request->post('login'),
            'password' => $this->getHash($this->request->post('password')),
            'name' => $this->request->post('name'),
            'age' => $this->request->post('age') ?? 'noAge',
            'description' => $this->request->post('description') ?? 'noDescription',
            'photo' => $this->request->post('image') ?? 'noPhoto'
        ]);
//      Авторизация
        $serviceAuth = new Auth();
        $serviceAuth->login($user['id']);
        header('location:/userlist');
    }

    public function deleteUser()
    {
        $user = User::find($this->request->post('id'));
        $delUser = $user->delete();
        $delPic = $this->request->post('pic');
        print_r($delPic);
        unlink("photos/$delPic");
        if ($delUser) {
            header('location:/userlist');
        }
    }

    public function signIn()
    {
        $login = User::all()->where('login', '=', $this->request->post('log'));
        $user = array_pop($login->toArray());

        if (!$user) {
            echo "Не верный Логин!";
            return false;
        }

        $mathced = $this->getHash($this->request->post('pass')) === $user['password'];
        if (!$mathced) {
            echo " Не верные пароль !";
        }

//      Авторизация
        $serviceAuth = new Auth();
        $serviceAuth->login($user['id']);
        //  print_r($user['id']);
        header('location:/userlist');
    }
}