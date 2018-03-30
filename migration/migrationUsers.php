<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once "../App/models/User.php";

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('login')->unique(); //varchar 255
    $table->string('password'); //varchar 255
    $table->string('name'); //varchar 255
    $table->integer('age');
    $table->string('description'); //varchar 255
    $table->string('photo'); //varchar 255
});


