<?php

namespace app\Auth;

class RegistrationController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function registerUser($post)
    {

    }
}