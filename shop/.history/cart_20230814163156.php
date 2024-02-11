<?php 
if (isset($_POST['action']) && $_POST['action'] === "data") {
    $id = $_POST["id"];
    $perfumename = $_POST["perfumename"];
    $brandname = $_POST["brandname"];
    $mili = $_POST["mili"];
    $categoryname = $_POST["categoryname"];
    $quantity = $_POST["quantity"];
    
    echo $perfumename . "," . $id . "," . $brandname . "," . $mili ."," . $categoryname .",". $quantity; 

    
}
?>
