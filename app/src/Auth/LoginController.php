<?php

namespace app\Auth;

use app\CurrencyHandler\CurrencyConverter;
use app\CurrencyHandler\CurrencyJob;

class LoginController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @throws \Exception
     */
    public function loginUser($post)
    {
        (new CurrencyJob())->execute();

//        if (isset($post)) {
//        }

    }
}