<?php

namespace app\CurrencyHandler;

use app\Database\DatabaseConnection;
use DateTime;
use DateTimeZone;

class CurrencyParser
{
    private $db;
    private $datetime;

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
     * @throws \Exception
     */
    private function saveCurrencyRatesToDatabase($data)
    {
        $this->datetime = new DateTime('now', new DateTimeZone('Asia/Tashkent'));
        $date = $this->datetime->format('Y-m-d H:i:s');
        $query = $this->db->prepare("INSERT INTO currencies 
                            (id, num_code, char_code, nominal, name, value, previous, timestamp) 
                            VALUES (:id, :num_code, :char_code, :nominal, :name, :value, :previous, :timestamp)
                            ON DUPLICATE KEY UPDATE 
                            num_code = :num_code, char_code = :char_code, 
                            nominal = :nominal, name = :name, 
                            value = :value, previous = :previous, timestamp = :timestamp");

        foreach ($data as $currency) {
            $query->bindParam(':id', $currency['ID']);
            $query->bindParam(':num_code', $currency['NumCode']);
            $query->bindParam(':char_code', $currency['CharCode']);
            $query->bindParam(':nominal', $currency['Nominal']);
            $query->bindParam(':name', $currency['Name']);
            $query->bindParam(':value', $currency['Value']);
            $query->bindParam(':previous', $currency['Previous']);
            $query->bindParam(':timestamp', $date);

            $query->execute();
        }
    }
}