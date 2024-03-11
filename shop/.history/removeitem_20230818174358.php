<?php
require_once "database.php";

if (isset($_POST['action']) && $_POST['action'] === 'del') {
    $id = $_POST['id'];

    $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo "Item deleted successfully"; // Echo a response
}
?>
