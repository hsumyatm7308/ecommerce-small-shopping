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
    
    echo $perfumename . "," . $id . "," . $brandname . "," . $mili ."," . $categoryname .",". $quantity; 

    $cartstmt = $conn->prepare("INSERT INTO addtocart(perfumename,brandname,mili,category,perfumeprice,quantity,totalprice) VALUES (:name,:brand,:mili,:ctg,:price,:qty,:ttprice)");
    $cartstmt->bindParam(':name',$perfumename);
    $cartstmt->bindParam(':brand',$brandname);
    $cartstmt->bindParam(':mili',$mili);
    $cartstmt->bindParam(':ctg',$categoryname);
    $cartstmt->bindParam(':ctg',$categoryname);
    $cartstmt->execute();
    
}
?>
