<?php

$conn = new PDO("mysql:host=localhost;dbname=perumdej", "root", "");

if (isset($_POST['addtocart'])) {
    if (isset($_SESSION['cart'])) {
        $sessionarrayid = array_column($_SESSION['cart'], "id");

        if (!in_array($_POST['id'], $sessionarrayid)) { 
            $id = $_POST['id'];

            $sessionarray = array(
                "id" => $id,
                "name" => $_POST['name'],
                "brandname" => $_POST['brandname'],
                "category" => $_POST['categoryname'],
                "quantity" => $_POST['quantity']
            );

            $_SESSION['cart'][] = $sessionarray;
            echo "After setting cart: ";
        }
    } else {
        $id = $_POST['id'];

        $sessionarray = array(
            "id" => $id,
            "name" => $_POST['name'],
            "brandname" => $_POST['brandname'],
            "category" => $_POST['categoryname'],
            "quantity" => $_POST['quantity']
        );

        $_SESSION['cart'][] = $sessionarray;
        echo "After setting cart: ";
        var_dump($_SESSION['cart']);
    }
}
?>
