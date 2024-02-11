<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
        $id = $_GET['items'];

        echo $quantity, $id;

        $conn = new PDO("mysql:host=localhost;dbname=perumdej", "root", "");

        // Corrected the SQL keyword from WERE to WHERE
        $stmt = $conn->prepare("SELECT * FROM perfume WHERE id = :id");
        $stmt->bindParam(':id', $id);

        // Execute the statement
        $stmt->execute();

        // Fetch the row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);



    } else {
        echo "Quantity parameter is missing in the request.";
    }
}
?>