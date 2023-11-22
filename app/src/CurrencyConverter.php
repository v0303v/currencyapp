<?php

namespace app;

class CurrencyConverter
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function convertToRubles($amount, $currencyCode)
    {
        // Получаем курс валюты из базы данных или другого источника
        $exchangeRate = $this->getExchangeRate($currencyCode);

        // Проводим конвертацию
        $result = $amount * $exchangeRate;

        return $result;
    }

    public function convertFromRubles($amount, $currencyCode)
    {
        // Получаем курс валюты из базы данных или другого источника
        $exchangeRate = $this->getExchangeRate($currencyCode);

        // Проводим конвертацию
        $result = $amount / $exchangeRate;

        return $result;
    }

    private function getExchangeRate($currencyCode): float
    {
        // Получаем курс из базы данных или другого источника
        // Пример: $query = $this->db->prepare("SELECT rate FROM exchange_rates WHERE currency_code = ?");
        // $query->execute([$currencyCode]);
        // $exchangeRate = $query->fetchColumn();

        // Здесь нужно реализовать логику получения курса валюты

        // Возвращаем тестовое значение для примера
        return 70.0;
    }
}