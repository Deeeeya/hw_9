<?php

    require_once '../../app/models/Product.php';

    header('Content-Type: application/json');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
        try {
            $keyword = $_GET['search'];
            $productModel = new Product();
            $products = $productModel->searchProducts($keyword);

            // Debugging
            file_put_contents('../../logs/debug.log', json_encode($products) . PHP_EOL, FILE_APPEND);

            echo json_encode(["success" => true, "data" => $products]);
            exit;
        } catch (Exception $e) {
            echo json_encode(["success" => false, "error" => $e->getMessage()]);
            exit;
        }
    }

?>