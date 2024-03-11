<?php
require_once "temporaryid.php";
require_once "database.php";

$temp_customer_id = $_SESSION['id'];


$selectStmt = $conn->prepare('SELECT COUNT(*) FROM customerinfo WHERE temporary_id = :tempid');
$selectStmt->bindParam(":tempid", $temp_customer_id);
$selectStmt->execute();
$rowCount = $selectStmt->fetchColumn();

if ($rowCount > 0) {
    // echo "Cookie 'tempid{$temp_customer_id}' exists.";
} else {


    // setcookie('tempid'.$temp_customer_id, $temp_customer_id, time() + (3600 * 24));
    // echo "Cookie 'tempid{$temp_customer_id}' has been set.";


    $insertStmt = $conn->prepare('INSERT INTO tempidtable (tempid) VALUES (:tempid)');
    $insertStmt->bindParam(":tempid", $temp_customer_id);
    $insertStmt->execute();

}




?>

<!-- CREATE TABLE IF NOT EXISTS tempidtable (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    tempid VARCHAR(255)
    ) -->