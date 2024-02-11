<?php
require_once "database.php";
require_once "temporaryid.php";

$tempid = $_SESSION['id'];
$temp_customer_id = $_COOKIE["tempid".$tempid];

// echo $temp_customer_id;





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

        $checkstmt = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id AND temporaryid = :temp");
        $checkstmt->bindParam(':id', $id );
        $checkstmt->bindParam(':temp', $temp_customer_id );
        $checkstmt->execute();



        if ($checkstmt->rowCount() > 0) {
            
            echo "already_added";

        } else {

            $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
            $seletemp->bindParam(":temp",$temp_customer_id);
            $seletemp->execute();
            
            $row = $seletemp->fetch();

            // echo $row['id'];


            $cartstmt = $conn->prepare("INSERT INTO addtocart(perfumename,brandname,mili,category,perfumeprice,quantity,totalprice,perfume_id,temporaryid) VALUES (:name,:brand,:mili,:ctg,:price,:qty,:ttprice,:id,:tempid)");
            $cartstmt->bindParam(':name', $perfumename);
            $cartstmt->bindParam(':brand', $brandname);
            $cartstmt->bindParam(':mili', $mili);
            $cartstmt->bindParam(':ctg', $categoryname);
            $cartstmt->bindParam(':price', $price);
            $cartstmt->bindParam(':qty', $quantity);
            $cartstmt->bindParam(':ttprice', $totalprice);
            $cartstmt->bindParam(':id', $id);
            $cartstmt->bindParam(':tempid', $row['id']);

            $cartstmt->execute();
            echo "item_added";



        }



    }



}
?>