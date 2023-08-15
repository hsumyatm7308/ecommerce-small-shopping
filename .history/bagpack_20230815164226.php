<?php
require_once "database.php";

try {
    $bagstmt = $conn->prepare("SELECT * FROM addtocart");
    $bagstmt->execute();
    echo $bagstmt->rowCount();
} catch (Exception $e) {
    echo "Error Found : " . $e->getMessage();
}
?>