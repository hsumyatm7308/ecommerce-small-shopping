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

        $stmt = $conn->prepare("UPDATE perfume SET imgurl = :imgurl WHERE id = :id");

      


        $id = 60;
        


        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':imgurl', $imageData);


   
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
 CREATE TABLE IF NOT EXISTS perfume(
    id INT PRIMARY KEY AUTO_INCREMENT,
    imgurl BLOB(512),
    perfume_name VARCHAR (255),
     price DECIMAL(10,2) NOT NULL,
     mili VARCHAR(255),
     brand_name VARCHAR(255),
     brand_id INT,
     category_name VARCHAR(255),
     category_id INT,
     FOREIGN KEY (brand_id,brand_name) REFERENCES brand(id,brandname) ON UPDATE CASCADE ON DELETE CASCADE,
     FOREIGN KEY (category_id,category_name) REFERENCES category(id,categoryname) ON UPDATE CASCADE ON DELETE CASCADE,
    
      status INT
    )
 -->

 <!-- INSERT INTO perfume(perfume_name,price,brand_name,category_name,mili)
 VALUES('Brit',33.04,'Burbettry','Men','100ML'),
 ('CK one',38.80,'Calvin Klein','Unisex','200ML'),
 ('Eternity',34.04,'Calvin Klein','Women','100ML'),
 ('Jovan White Musk',30.90,'Jovan','Women','96ML'),
 ('Royal Copenhagen',40.99,'Royal','Men','240ML'),
 ('CK be',45.02,'Calvin Klein','Unisex','200ML'),
 ('CK all',48.05,'Calvin Klein','Unisex','200ML'),
 ('Eternity',85.45,'Calvin Klein','Men','100ML'),
 ('Charlie Blue',45.02,'Revlon','Women','100ML'),
 ('CK be',48.05,'Calvin Klein','Women','200ML'),
 ('CK One',43.05,'Calvin Klein','Unisex','100ML'),
 ('Halston Z-14',58.58,'Colodgne','Men','236ML'),
 ('Nautica Blue',47.18,'Vaporisateur','Men','100ML'),
 ('CK one',87.18,'Calvin Klein','Unisex','75g'),
 ('Elizabeth Arden Red Door',43.08,'Vaporisateur','Women','100ML'),
 ('Jontue',63.88,'Aidonull','Women','100ML'),
 ('Davidoff Cool Water',29.89,'Aidonull','Men','200ML'),
 ('Classic',69.95,'Bananarepublic','Unisex','125ML'),
 ('NYC',35.15,'Aidonull','Unisex','50ML'),
 ('Sung Alfred',35.15,'Vaporisateur','Women','100ML'),
 ('Royal Copenhagen',48.99,'Royal','Men','100ML'),
 ('Anals',34.15,'Cacharel','Women','100ML'),
 ('By The Sea 03',32.05,'Cacharel','Unisex','100ML'),
 ('Chrome Azzaro',34.85,'Azzaro','Men','100ML'),
 ('Club De Nuit',36.55,'Sillage','Unisex','100ML'),
 ('Boucherron',39.75,'Boucherron','Women','100ML'),
 ('Drkkar Noir',52.35,'Guy Larochce','Men','100ML'),
 ('Boucherron',49.70,'Boucherron','Men','100ML'),
 ('Bananarepublic',55.75,'Bananarepublic','Unisex','75ML'),
 ('Passion',49.75,'ElizaBethtaylors','Women','75ML'),
 ('Givenchy Gentleman',89.75,'Origplale','Men','100ML'),
 ('Supermacy',78.35,'Afnan','Unisex','100ML'),
 ('Casual',40.75,'Origplale','Women','120ML'),
 ('Navy',20.35,'Navy','Women','45ML'),
 ('Memoire 01',20.35,'Cacharel','Unisex','100ML'),
 ('Jovan Musk',78.35,'Jovan','Men','236ML'),
 ('Eternity',98.35,'Calvin Klein','Men','100ML'),
 ('Acqua Di Parma',58.35,'Fico Di Amalfi','Unisex','75ML'),
 ('Brit',68.34,'Burbettry','Women','100ML'),
 ('CK all',98.36,'Calvin Klein','Women','200ML'),
 ('Black Kawan Cacr',48.34,'Kawan Car','Men','100ML'),
 ('Grassland',38.34,'Bananarepublic','Unisex','75ML'),
 ('Claiborne',48.24,'liz','Women','100ML'),
 ('Hei',32.08,'Alfreobung','Men','100ML'),
 ('Oud Wood',82.98,'Tom Ford','Unisex','100ML'),
 ('Neroli Woods',62.78,'Bananarepublic','Unisex','100ML'),
 ('Explorer',82.38,'Mont Blanc','Men','100ML'),
 ('Dolce Gabana',32.90,'Light Blue','Women','100ML'),
 ('Polo',95.28,'Relphp Lauren','Men','175ML'),
 ('Supermacy',32.58,'Afnan','Unisex','100ML'),
 ('Anais',22.98,'Cacharel','Women','30ML'),
 ('Promise Me',72.88,'Aeropostale','Women','100ML'),
 ('Eternity',82.35,'Calvin Klein','Men','100ML'),
 ('Cypress Cedar',65.38,'Bananarepublic','Unisex','75ML'),
 ('Arrogant',55.38,'Aidonull','Men','100ML'),
 ('Ser Hubbee',55.38,'Lattafe','Unisex','100ML'),
 ('Movies',59.31,'Addidas','Women','30ML'),
 ('Amarige',45.36,'Givenomy','Women','100ML'),
 ('Clean',35.07,'Home Frangrances','Unisex','100ML'),
 ('Halloween',35.07,'Hallween','Men','125ML'); -->


































