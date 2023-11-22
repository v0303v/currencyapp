<?php

namespace app\Database;

use PDO;
use PDOException;

class DatabaseConnection
{
    private $pdo;

    public function __construct()
    {
        $dbConfig = [
            'driver' => 'mysql',
            'host' => 'db',
            'database' => 'app',
            'username' => 'admin',
            'password' => 'admin',
            'charset' => 'utf8mb4',
        ];

        try {
            $this->pdo = new PDO(
                $dbConfig['driver'] . ":host=" . $dbConfig['host'] . ";dbname=" . $dbConfig['database'] . ";charset=" . $dbConfig['charset'],
                $dbConfig['username'],
                $dbConfig['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            // Handle connection error
            die("Connection failed: " . $e->getMessage());
        }

    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}