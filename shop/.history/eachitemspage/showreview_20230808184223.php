<?php 
require_once "database.php";

try{

    $stmt = $conn->prepare("SELECT * FROM reviewtable");

}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}

?>