<?php

namespace App\models\classes\Database;

require_once('dbCredentials.php');

use \PDO;
class Database {
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . DB_SERVER  . ";dbname=" . DB_DATABASE;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false, 
            ];

            $this->conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        } catch (PDOException $e) {
            die("Database connection failed" . $e->getMessage());
        }
    }

    public function confirmResultSet($resultSet) {
        if(!$resultSet) {
            die("Error in query" . $this->conn->errorInfo()[2]);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function dbDisconnect() {
        $this->conn = null;
    }
}


