<?php

require_once '../vendor/autoload.php';

// Инициализация базы данных
$dbConfig = require_once '../config/database.php';
$db = new PDO(
    "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']};charset={$dbConfig['charset']}",
    $dbConfig['username'],
    $dbConfig['password']
);

// Инициализация класса для работы с пользователями
$user = new Auth\User($db);

// Инициализация контроллера авторизации
$authController = new Auth\AuthController($user);

// Пример использования контроллера
$authController->registerUser('username', 'password');
$authController->loginUser('username', 'password');