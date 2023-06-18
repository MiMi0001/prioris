<?php

namespace Prioris\model;
use Dotenv\Dotenv;

// Singleton class
class Database
{
    private static Database $instance;
    private static bool $isInstanceExists = false;
    public \PDO $pdo;

    // Constructor is private, to deny making new instances of the class
    private function __construct()
    {
        // Loading environment variables from .env file
        $dotenv = Dotenv::createImmutable(__DIR__."/../");
        $dotenv->load();

        // Setting variable from necessary for database connection
        $host=$_ENV["host"];
        $database=$_ENV["database"];
        $username=$_ENV["username"];
        $password=$_ENV["password"];
        $dsn="mysql:host=$host;dbname=$database";

        // Connecting to the database with PDO
        $this->pdo=new \PDO($dsn, $username, $password);
    }

    // Get the single instance
    public static function getInstance()
    {
        if (!self::$isInstanceExists) {
            self::$instance = new Database();
            self::$isInstanceExists = true;
        }

        return self::$instance;
    }
}
