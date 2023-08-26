<?php

require_once "database.php";
require_once "temporaryid.php";
$temp_customer_id = $_SESSION['id'];

if (isset($_POST['action']) && $_POST['action'] === 'del') {
    $id = $_POST['id'];
    echo $id;


    // $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id');
    // $stmt->bindParam(':id', $id);
    // $stmt->execute();

    // header("Location: shopcartpage.php");
    // exit;

    // if (isset($_POST['remove'])) {
       
        $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id WHERE temporaryid = :temp');
        $stmt->bindParam(':id', $id);
        $stmt->execute();



        // header("Location: shopcartpage.php");
        // exit;
    // }

}
?>