<?php
class Database {
    private $host = 'bubblebook-php-db-1';
    private $db_name = 'bubble';
    private $username = 'root';
    private $password = 'mariadb';
    private static $instance = null;
    private $conn;

    // Sécurisation with a private construct in order to stop directly the creation of instances
    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    // Static methode to obtain the unique PDO connection
    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
    public static function closeConnection() {
        // Close the static instance connection if necessary
        self::$instance = null;
    
        // If 'conn' is an instance property, use 'self' for a static method:
        if (isset(self::$instance)) {
            self::$instance->conn = null;
        }
    }
    
}