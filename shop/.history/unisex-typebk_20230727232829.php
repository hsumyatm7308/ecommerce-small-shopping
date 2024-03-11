<?php

require_once "database.php";

try{
    $stmt = $conn->prepare("")

}catch(Exception $e){
    echo 'Error: '. $e->getMessage();
}

?>