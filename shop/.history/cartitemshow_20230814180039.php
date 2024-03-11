<?php

require_once "database.php";

try {

    $stmt = $conn->prepare('SELECT * FROM addtocart');
    $stmt->execute();



} catch (Exception $e) {
    echo 'Error:' . $e->getMessage();
}

?>

<?php while ($row = $stmt->fetch()): ?>

    <?php 
      
      if($row['perfume_id']){
        alerts("aleady added this item");
      }else{

      }

    ?>

<?php endwhile; ?>