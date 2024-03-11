<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === "remove") {
    $itemIdToRemove = $_GET['id'];

    foreach ($_SESSION["cart"] as $key => $value) {
        if ($value['id'] === $itemIdToRemove) {
            unset($_SESSION["cart"][$key]);
            break;
        }
    }

    // Assuming the server responds with success
    echo json_encode(["status" => "success"]);
} else {
    // Handle other cases or errors
    echo json_encode(["status" => "error"]);
}
?>
