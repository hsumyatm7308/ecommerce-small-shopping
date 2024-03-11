<?php
require_once "database.php";

session_start();

if (isset($_SESSION['temp_customer_id'])) {
    // Session variable 'temp_customer_id' exists.
    $temp_customer_id = $_SESSION['temp_customer_id'];
    echo "Temporary Customer ID: " . $temp_customer_id;
} else {
    echo "Temporary Customer ID is not set.";
}

foreach ($_SESSION as $key => $value) {
    echo "Session variable '$key' has the value: $value<br>";
}


if (isset($_POST['action']) && $_POST['action'] === "data") {
    $id = $_POST["id"];
    // $perfumeimg = $_POST["perfumeimg"];
    $perfumename = $_POST["perfumename"];
    $brandname = $_POST["brandname"];
    $mili = $_POST["mili"];
    $categoryname = $_POST["categoryname"];
    $quantity = $_POST["quantity"];
    $price = $_POST['price'];

    $totalprice = $quantity * $price;




    if ($id) {

        $checkstmt = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id");
        $checkstmt->bindParam(':id', $id);
        $checkstmt->execute();



        if ($checkstmt->rowCount() > 0) {
            //already added 
            echo "already_added";

        } else {
            $temp_customer_id = $_SESSION['temp_customer_id'];


            $cartstmt = $conn->prepare("INSERT INTO addtocart(perfumename,brandname,mili,category,perfumeprice,quantity,totalprice,perfume_id,temporaryid) VALUES (:name,:brand,:mili,:ctg,:price,:qty,:ttprice,:id,:tmpid)");
            $cartstmt->bindParam(':name', $perfumename);
            $cartstmt->bindParam(':brand', $brandname);
            $cartstmt->bindParam(':mili', $mili);
            $cartstmt->bindParam(':ctg', $categoryname);
            $cartstmt->bindParam(':price', $price);
            $cartstmt->bindParam(':qty', $quantity);
            $cartstmt->bindParam(':ttprice', $totalprice);
            $cartstmt->bindParam(':id', $id);
            $cartstmt->bindParam(':tmpid', $temp_customer_id);

            $cartstmt->execute();
            echo "item_added";



        }



    }



}
?>