<?php

namespace app\Auth;

use app\Database\DatabaseConnection;
use Exception;

class User
{
    private $db;

    public function __construct()
    {
        $database = new DatabaseConnection();
        $this->db = $database->getPdo();
    }

    /**
     * @param string $username
     * @param string $password
     * @return string
     */
    public function register(string $username, string $password): string
    {
        try {
            $checkUsername = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $checkUsername->execute([$username]);

            $existingUser = $checkUsername->fetchAll();

            if (count($existingUser) > 0) {
                return "Имя пользователя уже занято.";
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $insertUser = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $insertUser->execute([$username, $hashedPassword]);

            return "Пользователь создан.";

        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * @param array $data
     * @return bool|string
     */
    public function login(array $data)
    {
        try {
            $check = $this->db->prepare("SELECT * FROM users WHERE username=? AND password=?");
            $check->execute([
                $data['username'],
                md5($data['password'])
            ]);

            $user = $check->fetchAll();

            if (count($user) == 0) {
                return false;
            }
            return true;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}