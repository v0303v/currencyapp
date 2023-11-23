<?php

namespace app\CurrencyHandler;

use app\Database\DatabaseConnection;
use Exception;
use PDO;

class CurrencyConverter
{
    private $db;

    public function __construct()
    {
        $database = new DatabaseConnection();
        $this->db = $database->getPdo();
    }

    /**
     * @param float $amount
     * @param string $currencyCode
     * @return string
     */
    public function convertToRubles(float $amount,string $currencyCode): string
    {
        $exchangeRate = $this->getExchangeRate($currencyCode);
        $result = $amount * $exchangeRate;
        return $result . ' ' . $currencyCode;
    }

    /**
     * @param float $amount
     * @param string $currencyCode
     * @return string
     */
    public function convertFromRubles(float $amount, string $currencyCode): string
    {
        $exchangeRate = $this->getExchangeRate($currencyCode);
        $result = $amount / $exchangeRate;
        return $result . ' ' . $currencyCode;
    }

    /**
     * Получаем курс из базы данных
     * @param string $currencyCode
     * @return float
     */
    private function getExchangeRate(string $currencyCode): float
    {
        try {
            $query = $this->db->prepare("SELECT value FROM currencies WHERE char_code = ?");
            $query->execute([$currencyCode]);

            $currencyData = $query->fetch(PDO::FETCH_ASSOC);

            if (!$currencyData) {
                return false;
            }

            return $currencyData['value'];
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * @return array
     */
    public function getCurrenciesList(): array
    {
        $query = $this->db->query("SELECT char_code, name FROM currencies");
        return $query->fetchAll(PDO::FETCH_KEY_PAIR);
    }
}