<?php 
if (isset($_POST['action']) && $_POST['action'] === "data") {
    $id = $_POST["id"];
    $perfumename = $_POST["perfumename"];
    $brandname = $_POST["brandname"];
    $mili = $_POST["mili"];
    $categoryname = $_POST["categoryname"];
    
    echo $perfumename . "," . $id; 
}
?>
