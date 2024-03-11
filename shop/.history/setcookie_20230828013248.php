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
    $selectStmt = $conn->prepare('SELECT COUNT(*) FROM addtocart WHERE temporary_id = :tempid');
    $selectStmt->bindParam(":tempid", $temp_customer_id);
    $selectStmt->execute();
    $rowCount = $selectStmt->fetchColumn();

    if ($rowCount > 0) {
        // Temporary ID exists in the database
        $registerstmt = $conn->prepare('UPDATE customerinfo SET name = :name, email = :email, password = :password WHERE temporary_id = :temp');
        $registerstmt->bindParam(":name", $name);
        $registerstmt->bindParam(":email", $email);
        $registerstmt->bindParam(":password", $password);
        $registerstmt->bindParam(":temp", $temp_customer_id);
        $registerstmt->execute();

      

        // echo "Update a new record with temporary ID: $temp_customer_id";

    } else {
        // Temporary ID does not exist in the database
        $insertStmt = $conn->prepare('INSERT INTO customerinfo (name, email, password, temporary_id) VALUES (:name, :email, :password, :tempid)');
        $insertStmt->bindParam(":name", $name);
        $insertStmt->bindParam(":email", $email);
        $insertStmt->bindParam(":password", $password);
        $insertStmt->bindParam(":tempid", $temp_customer_id);

        if ($insertStmt->execute()) {
            $_SESSION['regemail'] = $email;
            $_SESSION['regpassword'] = $password;
        }

      
        // echo "Inserted a new record with temporary ID: $temp_customer_id";

    }



   
}
?>

<!-- tempid64eb9c386394d -->