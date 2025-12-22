<?php

namespace App\Database;

class Database
{
    // Database connection credentials
    public $dbUser;
    public $dbPass;
    public $dbHost;
    public $dbName;
    public $dbConnect;              // Database connection holder

    public function __construct()
    {
        // Initialize properties from environment variables
        $this->dbUser = $_ENV['DB_USERNAME'] ?? '';
        $this->dbPass = $_ENV['DB_PASSWORD'] ?? '';
        $this->dbHost = $_ENV['DB_HOST'] ?? '127.0.0.1';
        $this->dbName = $_ENV['DB_DATABASE'] ?? '';

        // Try connecting when the class is instantiated
        $this->connectDb();
    }

    // Returns and stores the connection
    public function returnConnect()
    {
        if (!$this->dbConnect) {
            $this->connectDb();
        }
        return $this->dbConnect;
    }

    // Establish database connection
    public function connectDb()
    {
        $this->dbConnect = new \PDO(
            "mysql:host={$this->dbHost};port=" . ($_ENV['DB_PORT'] ?? 3306) . ";dbname={$this->dbName};charset=utf8mb4",
            $this->dbUser,
            $this->dbPass
        );
        $this->dbConnect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
