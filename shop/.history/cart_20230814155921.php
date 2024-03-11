<?php 

if(isset($_POST['action']) === "data"){
    $id = $_GET["id"];
    $perfumename = $_POST["perfumename"];
    echo $perfumename,$id;
}

?>