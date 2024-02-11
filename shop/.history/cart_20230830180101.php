<?php
require_once "database.php";
require_once "temporaryid.php";

$tempid = $_SESSION['id'];
$temp_customer_id = $_COOKIE["tempid".$tempid];

// echo $temp_customer_id;





if (isset($_POST['action']) && $_POST['action'] === "data") {
    $id = $_POST["id"];
    $pfimg = $_POST["pfimg"];
    $perfumename = $_POST["perfumename"];
    $brandname = $_POST["brandname"];
    $mili = $_POST["mili"];
    $categoryname = $_POST["categoryname"];
    $quantity = $_POST["quantity"];
    $price = $_POST['price'];

    $totalprice = $quantity * $price;


    $selectimg = $conn->prepare("SELECT * FROM perfume WHERE id = :id");
    $selectimg->bindParam(":id",$id);
    $selectimg->execute();


    $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
    $seletemp->bindParam(":temp",$temp_customer_id);
    $seletemp->execute();
    
    $row = $seletemp->fetch();



    if ($id) {

        $checkstmt = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id AND temporaryid = :temp");
        $checkstmt->bindParam(':id', $id );
        $checkstmt->bindParam(':temp', $row['id'] );
        $checkstmt->execute();



        if ($checkstmt->rowCount() > 0) {
            
            echo "already_added";

        } else {


            // echo $row['id'];


            $cartstmt = $conn->prepare("INSERT INTO addtocart(perfumeimg, perfumename,brandname,mili,category,perfumeprice,quantity,totalprice,perfume_id,temporaryid) VALUES (:perfumeimg, :name,:brand,:mili,:ctg,:price,:qty,:ttprice,:id,:tempid)");
            $cartstmt->bindParam(':perfumeimg', $pfimg);
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