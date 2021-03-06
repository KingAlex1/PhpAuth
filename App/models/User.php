<?php

namespace App\models;
use App\models\Order;
require_once 'Order.php';
require __DIR__ . "/../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'test',
    'username' => 'root',
    'password' => 'mars100',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

class User extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    public $table = 'users';

    public function orders()
    {
        return $this->hasMany('App\models\Order', 'user_id', 'id');
    }
}





































