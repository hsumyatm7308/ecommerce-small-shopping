<?php
require_once "database.php";



try{
    $searchstmt = $conn->prepare('SELECT perfume_name, brand_name FROM perfume');


}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}


?>