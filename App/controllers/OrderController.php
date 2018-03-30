<?php

namespace App\controllers;

use App\core\Request;
use App\core\validation;
use App\core\Auth;
use App\models\Order;

class OrderController
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function addOrder()
    {
        try {
            $clearData = Validation::checkData([
                'user_id' => $this->request->session('user'),
                'adress' => $this->request->post('adress'),
                'phone' => $this->request->post('phone'),
                'mail' => $this->request->post('mail'),
                'good' => $this->request->post('good'),
                'photo' => $this->request->post('image'),
                'desc' => $this->request->post('description')
            ]);
            $user = Order::create($clearData);
        } catch (\Exception $e) {
            echo "Введите корректные данные" . $e->getMessage();
        }
        header('location:/orders');
    }

//    public function deleteUser()
//    {
//        $user = User::find($this->request->post('id'));
//        $delUser = $user->delete();
//        $delPic = $this->request->post('pic');
//        print_r($delPic);
//        unlink("photos/$delPic");
//        if ($delUser) {
//            header('location:/userlist');
//        }
//    }
//
}