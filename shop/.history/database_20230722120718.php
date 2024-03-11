<?php
// Replace these with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perumdej";

try {
    // Create a database connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the image data from the file input field
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        // Prepare the SQL query with a parameter placeholder for binary data
        $stmt = $conn->prepare("INSERT INTO images (id, image_data) VALUES (:id, :image_data)");

        // Replace ':id' with the ID for this image, and bind the binary data to the parameter
        $id = 1; // Change this ID as needed
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':image_data', $imageData, PDO::PARAM_LOB);

        // Execute the query
        $stmt->execute();

        echo "Image inserted successfully.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>



<!-- INSERT INTO brand(brand_name,country_of_origin,website)
 VALUES ( Burbettry,british,burbettry.com )
 (Calvin Klein,england,calvinklein.com)
 (Royal,england,royal.com)
 (Coldana,thai,coldana.com)
 (Revlon,british,revolon.com)
 (Calvin Klein,england,calvinklein.com)
 -->

