<?php

namespace app;

class Handler
{
    /**
     * @return void
     */
    public function currencyConversion()
    {
        $currencyConverter = new \app\CurrencyHandler\CurrencyConverter();

        $fromAmount = $_POST['fromAmount'];
        $fromCurrency = $_POST['fromCurrency'];
        $toAmount = $_POST['toAmount'];
        $toCurrency = $_POST['toCurrency'];

        $toResult = $currencyConverter->convertToRubles($fromAmount, $fromCurrency);
        $fromResult = $currencyConverter->convertFromRubles($toAmount, $toCurrency);

        echo json_encode([
            'toResult' => $toResult,
            'fromResult' => $fromResult
        ]);
    }

    /**
     * @throws \Exception
     */
    public function loginUser()
    {
        $login = new \app\Auth\LoginController();

        $result = $login->loginUser($_POST);

        echo json_encode([
            'result' => $result
        ]);
    }
}