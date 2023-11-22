<?php

namespace app\Auth;

use app\Database\DatabaseConnection;

class LoginController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function loginUser($post)
    {
        var_dump($post);die;

        if (isset($post)) {
            $this->user->login($post);
        }
    }
}