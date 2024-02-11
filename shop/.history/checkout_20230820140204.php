<?php
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {


    if (isset($_POST['checkout'])) {
        echo "Checkout button clicked!";

        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            $id = $_POST['perfumeid'];
            $qtyval = $_POST['qtyvalue'];
            $priceval = $_POST['pricevalue'];
            $updatestmt = $conn->prepare("UPDATE addtocart SET quantity = :qty, totalprice = :priceval WHERE perfume_id = :id");

            $updatestmt->bindParam(':qty', $qtyval, PDO::PARAM_INT);
            $updatestmt->bindParam(':priceval', $priceval, PDO::PARAM_STR);
            $updatestmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($updatestmt->execute()) {
                echo "Database updated successfully!";
            } else {
                echo "Database update failed.";


            }






        }

        echo $id;

    }




}
?>