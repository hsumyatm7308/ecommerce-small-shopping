<?php 
if (isset($_POST['action']) && $_POST['action'] === "data") {
    $id = $_POST["id"];
    $perfumename = $_POST["perfumename"];
    $brandname = $_POST["brandname"];
    $perfumename = $_POST["perfumename"];

    echo $perfumename . "," . $id; /
}
?>
