<?php
require_once "./database.php";

try{
    
    $showsingle = $conn->prepare('SELECT * FROM perfume WHERE id = :id');
    $shownsingle->bindParam(":id",1);
    $showsingle->execute();

    $row = $showsingle->fetch();

}catch(Exception $e){
    echo "Error Found : ".$e->getMessage();
}


?>

