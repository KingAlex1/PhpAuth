<?php

namespace App\controllers;

use App\core\Auth;
use App\core\MainController;
use App\models\Order;
use App\models\User;


class Orders extends MainController
{
    public function index()
    {
        $auth = new Auth();
        if (!$auth->isAuth()) {
            header('location:/');
        }
        $orders = User::with('orders')->get()->where('id', '=', $_SESSION['user']);
        $data = $orders->toArray();
        $this->view->render('order.html', $data);
    }
}