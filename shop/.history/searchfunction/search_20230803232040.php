<?php
require_once "database.php";



try{
    $searchstmt = $conn->prepare('SELECT ')
    $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice ORDER BY $sortOption");


}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}


?>