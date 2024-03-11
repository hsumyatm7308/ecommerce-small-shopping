<?php
require_once "database.php";
require_once "temporaryid.php";
$temp_customer_id = $_COOKIE['tempid'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {


    // if (isset($_POST['checkout'])) {
    // echo "Checkout button clicked!";

  

    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id = $_POST['perfumeid'];
        $qtyval = $_POST['qtyvalue'];

        $checkstmt = $conn->prepare("SELECT perfumeprice FROM addtocart WHERE perfume_id = :id AND temporaryid = :temp");
        $checkstmt->bindParam(':id', $id);
        $checkstmt->bindParam(':temp', $temp_customer_id);
        $checkstmt->execute();

        $row = $checkstmt->fetch();

        $priceval = $qtyval * $row['perfumeprice'];


        $updatestmt = $conn->prepare("UPDATE addtocart SET quantity = :qty, totalprice = :priceval WHERE perfume_id = :id AND temporaryid = :temp");

        $updatestmt->bindParam(':qty', $qtyval, PDO::PARAM_INT);
        $updatestmt->bindParam(':priceval', $priceval, PDO::PARAM_STR);
        $updatestmt->bindParam(':id', $id, PDO::PARAM_INT);
        $updatestmt->bindParam(':temp', $temp_customer_id);
    
        if ($updatestmt->execute()) {
            echo "Database updated successfully!";
        } else {
            echo "Database update failed.";
    
    
        }

        echo $priceval;

    }



  




}
?>