<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === "remove" && isset($_GET['id'])) {
    $itemId = $_GET['id'];

    foreach ($_SESSION["cart"] as $key => $value) {
        if ($value['id'] === $itemId) {
            unset($_SESSION["cart"][$key]);
            echo json_encode(['success' => true, 'message' => 'Item removed']);
            exit;
        }
    }

    echo json_encode(['success' => false, 'message' => 'Item not found']);
}
?>
