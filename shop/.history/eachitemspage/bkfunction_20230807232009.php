<?php
require_once "../database.php";

try{
    
    $showsingle = $conn->prepare('SELECT * FROM perfume');

}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}


?>