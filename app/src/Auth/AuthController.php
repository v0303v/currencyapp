<?php

namespace app\Auth;

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
    }
}