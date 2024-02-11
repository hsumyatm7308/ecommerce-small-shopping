<?php 
require_once "database.php";

if(isset($_GET['items'])){
    try{

        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE id = :id");
        $stmt->bindParam(':id',$id);
        
        $stmt->execute();
    
    }catch(Exception $e){
        echo "Error Found : ".$e->getMessage();
    }
    
}
?>