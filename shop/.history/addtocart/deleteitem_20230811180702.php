<?php 

require_once "database.php";

if(isset($_POST['action'])){
    if($_POST['action'] === "delete"){
       $id = $_POST['id'];

       $stmt = $conn->prepare("DELETE * FROM ");
    }
}


?>