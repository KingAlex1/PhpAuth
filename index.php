<?php
error_reporting(E_ALL);
session_start();

require __DIR__."/vendor/autoload.php";

use App\controllers\UserController;
use App\core\request;

function __autoload($classname) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';

}
$routes = explode('/', $_SERVER['REQUEST_URI']);

if ($_POST) {

    $request = new Request($_GET, $_POST, $_SERVER, $_COOKIE, $_FILES, $_SESSION);
    echo "<pre>";

    if (isset($_POST['delete'])){

        $controller = new UserController($request);
        $controller->deleteUser();
    }

    if (isset($_POST['log'])&& isset($_POST['pass'])){

        $controller = new UserController($request);
        $controller->signIn();
    }

    $controller = new UserController($request);
    $controller->addUser();

}

$controllerName = "Authorization";
$actionName = "index";

if (!empty($routes[1])) {
    $controllerName = $routes[1];
}

if (!empty($routes[2])) {
    $actionName = $routes[2];
}

$fileName = "App/controllers/" . ucfirst($controllerName) . ".php";

try {
    if (file_exists($fileName)) {
        require_once $fileName;

    } else {
        throw new Exception("File not found");
    }

    $className = "\App\\controllers\\" . ucfirst($controllerName);

    if (class_exists($className)) {
        $controller = new $className;
    } else {
        throw  new Exception(" File Found but class not found");
    }

    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        throw new Exception("Method not found");
    }
} catch (Exception $e) {
    require "App/core/errors/404.php";
}






