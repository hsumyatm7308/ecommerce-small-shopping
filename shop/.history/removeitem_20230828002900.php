<?php

require_once "database.php";
require_once "temporaryid.php";
$temp_customer_id = $_COOKIE['tempid'];

if (isset($_POST['action']) && $_POST['action'] === 'del') {
    $id = $_POST['id'];
    echo $id;

    $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id AND temporaryid = :temp');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':temp', $temp_customer_id);
    $stmt->execute();

}
?>