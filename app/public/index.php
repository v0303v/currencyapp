<?php
require_once '../vendor/autoload.php';

$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

switch ($url) {
    case '/':
        include '../views/login.php';
        break;
    case '/login':
        (new \app\Handler())->loginUser();
        break;
    case '/registration':
        include '../views/registration.php';
        break;
    case '/currency':
        include '../views/currency.php';
        break;
    case '/conversion':
        (new \app\Handler())->currencyConversion();
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        break;
}
