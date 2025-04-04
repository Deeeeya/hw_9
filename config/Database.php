<?php

    $env = parse_ini_file(__DIR__ . '/../.env');

    if (!$env) {
        die(json_encode(["error" => ".env file is missing or unreadable"]));
    }

    define('DBNAME', $env['DBNAME']);
    define('DBHOST', $env['DBHOST']);
    define('DBUSER', $env['DBUSER']);
    define('DBPASS', $env['DBPASS']);
    define('DBPORT', $env['DBPORT']);

    class Database {
        private static $instance = null;
        private $conn;

        private function __construct() {
            try {
                $this->conn = new PDO(
                    "mysql:host=" . DBHOST . ";port=" . DBPORT . ";dbname=" . DBNAME . ";charset=utf8mb4", 
                    DBUSER, 
                    DBPASS,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } catch (PDOException $e) {
                die(json_encode(["error" => "Database Connection Failed: " . $e->getMessage()]));
            }
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new Database();
            }
            return self::$instance->conn;
        }
    }

?>