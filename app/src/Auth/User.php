<?php

namespace app\src\Auth;

class User
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function register($username, $password)
    {
        // Реализация регистрации пользователя в базе данных
    }

    public function login($username, $password)
    {
        // Реализация авторизации пользователя
    }
}