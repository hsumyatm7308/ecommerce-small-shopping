<?php
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['checkout'])) {
        echo "Checkout button clicked!";


        if(isset($_POST['action']) && $_POST['action'] === 'update'){
            $id = $_POST['perfumeid'];
            $qtyval = $_POST['qtyvalue'];
            $pricevalue = $_POST['pricevalue'];
        }
    }

    
}
?>