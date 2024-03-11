<?php
require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl,mili FROM perfume");
    $stmt->execute(); // Execute the query to fetch data
    
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}




?>