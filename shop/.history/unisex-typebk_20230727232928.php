<?php

require_once "database.php";

try{
    $unisex = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl,mili FROM perfume WHERE category_name = 'Unisex' ");
    $unisex->execute(); 

}catch(Exception $e){
    echo 'Error: '. $e->getMessage();
}

?>