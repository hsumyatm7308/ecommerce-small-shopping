<?php 

require_once "database.php";

try{

    $stmt = $conn->prepare('SELECT * FROM addtocart');

}catch(Exception $e){
    echo 'Error:'.$e->getMessage();
}

?>