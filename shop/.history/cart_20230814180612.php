<?php
require_once "database.php";

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

    // echo $perfumename . "," . $id . "," . $brandname . "," . $mili . "," . $categoryname . "," . $quantity;
    if ($id) {
        // Check if the item with the same perfume_id is already added to the cart
        $checkstmt = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id");
        $checkstmt->bindParam(':id', $perfume_id);
        $checkstmt->execute();

        if ($checkstmt->rowCount() > 0) {
            // Item with the same perfume_id is already added
            echo "Item is already added to the cart";
        } else {
            // Item with the same perfume_id is not in the cart, add it
            $cartstmt = $conn->prepare("INSERT INTO addtocart(perfumename,brandname,mili,category,perfumeprice,quantity,totalprice,perfume_id) VALUES (:name,:brand,:mili,:ctg,:price,:qty,:ttprice,:id)");
            $cartstmt->bindParam(':name', $perfumename);
            $cartstmt->bindParam(':brand', $brandname);
            $cartstmt->bindParam(':mili', $mili);
            $cartstmt->bindParam(':ctg', $categoryname);
            $cartstmt->bindParam(':price', $price);
            $cartstmt->bindParam(':qty', $quantity);
            $cartstmt->bindParam(':ttprice', $totalprice);
            $cartstmt->bindParam(':id', $perfume_id);

            $cartstmt->execute();
            echo "Item added to the cart";
        }




}
?>