<?php
require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl,mili FROM perfume");
    $stmt->execute(); // Execute the query to fetch data


    $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Men','Unisex','Women')");
    $pricestmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
    $pricestmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
    $pricestmt->execute();
    
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}




?>