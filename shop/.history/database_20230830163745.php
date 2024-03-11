<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perumdej";

try {
    // Create a database connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        $stmt = $conn->prepare("UPDATE perfume SET imgurl = :imgurl WHERE id = :id");

      


        $id = 136;
        


        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':imgurl', $imageData);


   
        $stmt->execute();

        echo "Image inserted successfully.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}




?>












