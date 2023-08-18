<?php

if (isset($_POST['remove'])) {
    $id = $_POST['remove'];
    echo $id;
    // $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id');
    // $stmt->bindParam(':id', $id);
    // $stmt->execute();



    header("Location: shopcartpage.php");
    exit;
}

?>