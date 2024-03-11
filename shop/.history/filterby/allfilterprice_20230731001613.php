<?php

require_once "database.php";

if (isset($_GET['startprice']) && isset($_GET['endprice'])) {
        $startprice = $_GET['startprice'];
    $endprice = $_GET['endprice'];
    try {
        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Men','Unisex','Women')");
        $stmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $stmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error Found " . $e->getMessage();
    }

}


?>