<?php
require_once "database.php";



try{
    $searchstmt = $conn->prepare('SELECT perfume_name, brand_name FROM perfume');
    $row = $searchstmt->rowCount();
    for($i = 0; $i < )

}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}


?>