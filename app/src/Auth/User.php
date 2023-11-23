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

    public function register($username, $password)
    {
        try {
            $checkUsername = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $checkUsername->execute([$username]);

            $existingUser = $checkUsername->fetchAll();

            if (count($existingUser) > 0) {
                return "Username exists.";
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $insertUser = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $insertUser->execute([$username, $hashedPassword]);

            return true;

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