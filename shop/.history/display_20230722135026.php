<?php

require_once "database.php";

try{
    global $conn;

    $stmt = $conn->prepare("SELECT * perfume");

    $stmt->rowCount();

    $stmt->execute();

}catch(Exception $e){
    "Error Found : ". $e->getMessage();
}

?>