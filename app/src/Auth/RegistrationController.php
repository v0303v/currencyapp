<?php

namespace app\Auth;

class RegistrationController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @param $post
     * @return string
     */
    public function registerUser($post): string
    {
        return $this->user->register($post['username'], $post['password']);
    }
}