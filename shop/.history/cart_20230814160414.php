<?php 
if (isset($_POST['action']) && $_POST['action'] === "data") {
    $id = $_GET["id"];
    $perfumename = $_POST["perfumename"];
    echo $perfumename . "," . $id; // Separate with a comma
}
?>
