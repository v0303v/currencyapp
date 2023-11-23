<?php

namespace app\CurrencyHandler;

use app\Database\DatabaseConnection;

class CurrencyParser
{
    private $db;

    public function __construct()
    {
        $database = new DatabaseConnection();
        $this->db = $database->getPdo();
    }

    /**
     * Используем cURL для получения данных с сайта ЦБ РФ
     * @return void
     */
    public function parseCurrencyRates()
    {
        $url = 'https://www.cbr-xml-daily.ru/daily_json.js';
        $data = file_get_contents($url);
        $currencyData = json_decode($data, true);
        // Сохраняем данные в базу данных или обрабатываем как необходимо
        $this->saveCurrencyRatesToDatabase($currencyData['Valute']);
    }

    /**
     * Реализация сохранения данных в базу данных
     * @param $data
     * @return void
     */
    private function saveCurrencyRatesToDatabase($data)
    {
        foreach ($data as $currency) {
            $query = $this->db->prepare("INSERT INTO currencies 
                            (cbr_id, num_code, char_code, nominal, name, value, previous) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");

            $query->execute([
                $currency['ID'],
                $currency['NumCode'],
                $currency['CharCode'],
                $currency['Nominal'],
                $currency['Name'],
                $currency['Value'],
                $currency['Previous']
            ]);
        }
    }
}