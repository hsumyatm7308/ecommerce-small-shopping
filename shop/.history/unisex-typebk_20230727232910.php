<?php

require_once "database.php";

try{
    $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl,mili FROM perfume WHERE category_name = 'Women' ");
    $womenstmt->execute(); /

}catch(Exception $e){
    echo 'Error: '. $e->getMessage();
}

?>