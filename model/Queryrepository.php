<?php

namespace Prioris\model;

use Prioris\model\Database as DB;

class Queryrepository
{
    private static Queryrepository $instance;
    private static bool $isInstanceExist = false;
    private \PDO $pdo;

    private function __construct()
    {
        $this->pdo = DB::getInstance()->pdo;
    }

    public static function getInstance()
    {
        if (!self::$isInstanceExist) {
            self::$instance = new  Queryrepository();
            self::$isInstanceExist = true;
        }

        return self::$instance;
    }

    public function getUserPassword(string $userName)
    {
        $query = "SELECT password FROM users
                WHERE username=:username";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue("username", $userName, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch()['password'];
    }

    public function saveUser(string $username, string $hashedPassword)
    {
        $query = "INSERT INTO users (username, password, role)
                VALUES (:username, :password, 'user')";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue("username", $username, \PDO::PARAM_STR);
        $statement->bindValue("password", $hashedPassword, \PDO::PARAM_STR);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

    public function getAllusers()
    {
        $query="SELECT id, username, role
                FROM users;";
        $statement=$this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
