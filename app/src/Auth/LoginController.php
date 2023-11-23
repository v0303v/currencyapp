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
//        if (isset($post)) {
            (new CurrencyJob())->execute();
//        }

        var_dump((new CurrencyConverter())->convertFromRubles(100, 'EUR'));
        var_dump((new CurrencyConverter())->converttoRubles(100, 'EUR'));
    }
}