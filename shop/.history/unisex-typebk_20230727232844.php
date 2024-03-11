<?php

require_once "database.php";

try{
    $stmt = $conn->prepare("SELECT * FROM perfume");

}catch(Exception $e){
    echo 'Error: '. $e->getMessage();
}

?>