<?php

namespace app\Auth;

use app\CurrencyHandler\CurrencyParser;
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
        if (isset($post)) {
//           var_dump($this->user->login($post));
            echo "<pre>";
           print_r((new CurrencyParser())->parseCurrencyRates());
            echo "</pre>";
        }
    }
}