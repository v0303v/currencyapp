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