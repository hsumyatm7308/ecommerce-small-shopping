<?php
require_once "database.php";



if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];
    try {
        global $conn;

        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume  WHERE category_name IN ('Men','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
        $menstmt->bindParam(":letter", $letter);
        $menstmt->execute();



    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
}


?>






<?php while ($row = $menstmt->fetch()): ?>
   





<?php endwhile; ?>