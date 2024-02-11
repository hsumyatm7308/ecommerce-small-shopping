<?php
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['checkout'])) {
        echo "Checkout button clicked!";


    }
}
?>