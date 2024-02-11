<?php
require_once "database.php";
require_once "temporaryid.php";





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




if (isset($_SESSION['id'])) {
    $temp_customer_id = $_SESSION['id'];

    // echo $temp_customer_id  ."<br>";
} else {
    echo "Temporary Customer ID is not set.";
}


    if ($id) {

        $checkstmt = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id AND temporaryid = :tempid");
        $checkstmt->bindParam(':id', $id );
        $checkstmt->bindParam(':tempid', $temp_customer_id );
        $checkstmt->execute();



        if ($checkstmt->rowCount() > 0) {
            
            echo "already_added";

        } else {

            $temp_customer_id = $_SESSION['id'];


            $cartstmt = $conn->prepare("INSERT INTO addtocart(perfumename,brandname,mili,category,perfumeprice,quantity,totalprice,perfume_id,temporaryid) VALUES (:name,:brand,:mili,:ctg,:price,:qty,:ttprice,:id,:tempid)");
            $cartstmt->bindParam(':name', $perfumename);
            $cartstmt->bindParam(':brand', $brandname);
            $cartstmt->bindParam(':mili', $mili);
            $cartstmt->bindParam(':ctg', $categoryname);
            $cartstmt->bindParam(':price', $price);
            $cartstmt->bindParam(':qty', $quantity);
            $cartstmt->bindParam(':ttprice', $totalprice);
            $cartstmt->bindParam(':id', $id);
            $cartstmt->bindParam(':tempid', $temp_customer_id);

            $cartstmt->execute();
            echo "item_added";



        }



    }



}
?>