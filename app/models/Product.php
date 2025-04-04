<?php

    require_once __DIR__ . '/../../config/Database.php';

    class Product {
        private $db;

        public function __construct() {
            $this->db = Database::getInstance();
        }

        public function searchProducts($keyword) {
            $query = "SELECT * FROM products WHERE name LIKE :keyword";
            $stmt = $this->db->prepare($query);
            $stmt->execute(['keyword' => "%$keyword%"]);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($results)) {
                return ["message" => "No products found for '$keyword'"];
            }

            return $results;
        }
    }

?>