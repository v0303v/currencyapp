<?php

namespace app\CurrencyHandler;

use app\Database\DatabaseConnection;

class CurrencyJob
{
    private $db;

    public function __construct()
    {
        $database = new DatabaseConnection();
        $this->db = $database->getPdo();
    }

    /**
     * @throws \Exception
     */
    public function execute(): bool
    {
        if (!$this->isDataPresent()) {
            (new CurrencyParser())->parseCurrencyRates();
            // echo "Job completed.\n";
        }
        return false;
    }

    /**
     * @return bool
     */
    private function isDataPresent(): bool
    {
        $query = $this->db->query("SELECT COUNT(*) FROM currencies");
        $rowCount = $query->fetchColumn();

        return $rowCount > 0;
    }
}