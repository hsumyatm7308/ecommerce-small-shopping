<?php
session_start();
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

    if ($id) {

        $checkstmt = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id");
        $checkstmt->bindParam(':id', $id);
        $checkstmt->execute();

        if ($checkstmt->rowCount() > 0) {
            //already added 
            echo '$("#alertcart").html(`<span class="flex justify-start items-center p-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
            <span>Item already added </span>
        </span>
        <a href="shopcartpage.php" class="text-indigo-500 mr-4 hover:text-indigo-700">
            View cart 
        </a>`);';
        } else {
            $cartstmt = $conn->prepare("INSERT INTO addtocart(perfumename,brandname,mili,category,perfumeprice,quantity,totalprice,perfume_id) VALUES (:name,:brand,:mili,:ctg,:price,:qty,:ttprice,:id)");
            $cartstmt->bindParam(':name', $perfumename);
            $cartstmt->bindParam(':brand', $brandname);
            $cartstmt->bindParam(':mili', $mili);
            $cartstmt->bindParam(':ctg', $categoryname);
            $cartstmt->bindParam(':price', $price);
            $cartstmt->bindParam(':qty', $quantity);
            $cartstmt->bindParam(':ttprice', $totalprice);
            $cartstmt->bindParam(':id', $id);

            $cartstmt->execute();


        }

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();

    }



}
?>