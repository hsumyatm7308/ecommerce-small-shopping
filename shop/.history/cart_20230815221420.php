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

    if ($id) {

        $checkstmt = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id");
        $checkstmt->bindParam(':id', $id);
        $checkstmt->execute();

        if ($checkstmt->rowCount() > 0) {
            $checkstmt = $conn->prepare("
            DELIMITER //
            
            CREATE TRIGGER addtocart_afc
            AFTER INSERT ON addtocart FOR EACH ROW
            BEGIN
                DECLARE message VARCHAR(100);
                SELECT CONCAT('Item already added') INTO message;
            
                IF NEW.age IS NULL THEN 
                    INSERT INTO addtocart(perfume_id, message)
                    VALUE(NEW.id, message);
                END IF;
            END; //
            
            DELIMITER ;");
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

    }



}
?>