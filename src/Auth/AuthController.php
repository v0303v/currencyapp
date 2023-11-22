<?php

namespace src\Auth;

class AuthController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function registerUser($username, $password)
    {
        $this->user->register($username, $password);
        // Дополнительные действия при успешной регистрации
    }

    public function loginUser($username, $password)
    {
        if ($this->user->login($username, $password)) {
            // Дополнительные действия при успешной авторизации
        } else {
            // Обработка ошибки авторизации
        }
    }
}