<?php
require_once "database.php";



try{
 

    $d = $_POST['d'];
    for($i = 0; $i < $row; $i++){

        if($_POST['perfumename'] === $searchstmt[$i]['perfume_name']){
              echo $searchstmt[$i]['perfume_name'];
        }
    
    }

    $searchstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili  FROM perfume WHERE perfume_name AND brand_name LIKE '%$d%'");
    $row = $searchstmt->rowCount();


}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}


?>