<?php 

require_once "database.php";

try{

    $stmt = $conn->prepare('SELECT * FROM addtocart');
    $stmt->bindParam();

}catch(Exception $e){
    echo 'Error:'.$e->getMessage();
}

?>