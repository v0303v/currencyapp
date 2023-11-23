<?php
require_once '../vendor/autoload.php';

$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

switch ($url) {
    case '/':
    case 'login':
        include '../views/login.php';
        break;
    case '/registration':
        include '../views/registration.php';
        break;
    case '/currency':
        include '../views/currency.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        break;
}

//$user = new app\Auth\User();

//$authController = new app\Auth\AuthController($user);

//$authController->registerUser('username', 'password');
//$authController->loginUser('username', 'password');