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
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        $stmt = $conn->prepare("INSERT INTO perfume (id,imgurl,price,perfume,brand_name,category_name) VALUES (:id,:imgurl,:brand,:price,:perfume,:brand_name,:category_name)");

        $brandstmt = $conn->prepare("SELECT brandname FROM brand");
        $categorystmt = $conn->prepare("SELECT categoryname FROM category");


        echo $brandstmt->fetch();


        $id = 1;
        $perfume = "Brit";
        $brand = "Burbettry";
        $category = 3;
        $price = 34.80;


        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':imgurl', $imageData);
        $stmt->bindParam(':perfume', $perfume);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam('brand_name', $brand);
        $stmt->bindParam(':category_name', $category);

        // Execute the query
        $categorystmt->execute();
        $brandstmt->execute();

        $stmt->execute();

        echo "Image inserted successfully.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>



<!-- 
CREATE TABLE IF NOT EXISTS brand(
    
    id INT AUTO_INCREMENT,
    brandname  VARCHAR(255),
    counrtyoforigin VARCHAR(255),
    website VARCHAR(255),
    
    PRIMARY KEY(id,brandname)   
)
-->





<!-- 
INSERT INTO brand(brandname,counrtyoforigin,website)
 VALUES ('Burbettry','british','burbettry.com'),
 ('Calvin Klein','england','calvinklein.com'),
 ('Royal','england','royal.com'),
 ('Coldana','thai','coldana.com'),
 ('Revlon','british','revolon.com'),
 ('Calvin Klein','england','calvinklein.com')
 -->



<!-- 
    
CREATE TABLE IF NOT EXISTS category(
    
    id INT AUTO_INCREMENT,
    categoryname VARCHAR(255),
    PRIMARY KEY(id,categoryname)
     
) 



INSERT INTO category(id,categoryname)
 VALUES (1,'all'),
 (2,'men'),
 (3,'women'),
 (4,'unisex')
 -->

<!--  
 CREATE TABLE IF NOT EXISTS perfumeitems(
    id INT PRIMARY KEY AUTO_INCREMENT,
    imgurl BLOB(512),
     price DECIMAL(10,2) NOT NULL,
     brand_name VARCHAR(255),
     brand_id INT,
     category_name VARCHAR(255),
     category_id INT,
     FOREIGN KEY (brand_id,brand_name) REFERENCES brand(id,brandname) ON UPDATE CASCADE ON DELETE CASCADE,
     FOREIGN KEY (category_id,category_name) REFERENCES category(id,categoryname) ON UPDATE CASCADE ON DELETE CASCADE,
    
      status INT
    )
 -->



