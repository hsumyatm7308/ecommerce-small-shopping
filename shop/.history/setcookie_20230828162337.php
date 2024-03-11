<?php
require_once "temporaryid.php";
require_once "database.php";

$temp_customer_id = $_SESSION['id'];


$selectStmt = $conn->prepare('SELECT COUNT(*) FROM tempidtable WHERE tempid = :tempid');
$selectStmt->bindParam(":tempid", $temp_customer_id);
$selectStmt->execute();
$rowCount = $selectStmt->fetchColumn();

echo $rowCount;

if ($rowCount > 0) {


    // echo "Cookie 'tempid{$temp_customer_id}' exists.";
} else {


    // echo "Cookie 'tempid{$temp_customer_id}' has been set.";

    setcookie("tempid{$temp_customer_id}", $temp_customer_id, time() + (30 * 24 * 60 * 60), "/");

    $insertStmt = $conn->prepare('INSERT INTO tempidtable (tempid) VALUES (:tempid)');
    $insertStmt->bindParam(":tempid", $temp_customer_id);
    $insertStmt->execute();

}




?>

<!-- CREATE TABLE IF NOT EXISTS tempidtable (
    id INT AUTO_INCREMENT  NOT NULL,
    tempid VARCHAR(255) PRIMARY KEY
    ) -->