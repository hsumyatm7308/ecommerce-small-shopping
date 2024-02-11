<?php

require_once "database.php";

if (isset($_POST['action'])) {
    if (isset($_GET['action']) && $_GET['action'] === "delete") {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value['id'] === $_GET['id']) {
                unset($_SESSION["cart"][$key]);
                break;
            }
        }
    }
}


?>