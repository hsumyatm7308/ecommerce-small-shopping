<?php
require_once "temporaryid.php";

$temp_customer_id = $_SESSION['id'];

// Check if the 'tempid' cookie with the customer's ID exists
// if (isset()) {
    echo "Cookie 'tempid{$temp_customer_id}' exists.";
// } else {
    // Set the 'tempid' cookie only if it doesn't exist
    setcookie('tempid'.$temp_customer_id, $temp_customer_id, time() + (3600 * 24));
    echo "Cookie 'tempid{$temp_customer_id}' has been set.";


    $insertStmt = $conn->prepare('INSERT INTO addtocart (temporary_id) VALUES (:tempid)');
    $insertStmt->bindParam(":tempid", $temp_customer_id);
    $insertStmt->execute();

// }



if ($temp_customer_id) {
    $selectStmt = $conn->prepare('SELECT COUNT(*) FROM tempidtable');
    $selectStmt->bindParam(":tempid", $temp_customer_id);
    $selectStmt->execute();
    $rowCount = $selectStmt->fetchColumn();

    if ($rowCount > 0) {
      
      

        // echo "Update a new record with temporary ID: $temp_customer_id";

    } else {
       
      
        // echo "Inserted a new record with temporary ID: $temp_customer_id";

    }



   
}
?>

<!-- CREATE TABLE IF NOT EXISTS tempidtable (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    tempid VARCHAR(255)
    ) -->