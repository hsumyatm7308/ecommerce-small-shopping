<?php
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {



    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id = $_POST['perfumeid'];
        $qtyval = $_POST['qtyvalue'];
        $priceval = $_POST['pricevalue'];

        if (isset($_POST['checkout'])) {
            echo "Checkout button clicked!";
            // $updatestmt = $conn->prepare("UPDATE addtocart SET quantity = :qty, toalpricee = :priceval WHERE perfume_id = :id");
            // $updatestmt->bindParam('');
            // $updatestmt->execute();
            echo $id, $qtyval, $priceval;

        }

    }




}
?>