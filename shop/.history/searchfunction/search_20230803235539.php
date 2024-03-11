<?php
require_once "database.php";



try{
    $searchstmt = $conn->prepare('SELECT perfume_name, brand_name FROM perfume');
    $row = $searchstmt->rowCount();
    for($i = 0; $i < $row; $i++){

        if($_POST['perfumename'] === $searchstmt[$i]['perfume_name']){

        }
    
    }

}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}


?>