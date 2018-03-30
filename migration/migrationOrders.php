<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once "../App/models/Order.php";

Capsule::schema()->dropIfExists('orders');

Capsule::schema()->create('orders', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('user_id')->nullable();
    $table->string('adress'); //varchar 255
    $table->string('phone'); //varchar 255
    $table->string('mail')->unique(); //varchar 255
    $table->string('good'); //varchar 255
    $table->string('photo'); //varchar 255
    $table->string('desc'); //varchar 255

});
