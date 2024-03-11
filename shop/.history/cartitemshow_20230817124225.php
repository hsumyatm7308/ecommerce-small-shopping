<?php

require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM addtocart');
    $stmt->execute();

    if (isset($_POST['remove'])) {
        $id = $_GET['remove'];
        echo $id;
        $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();



        header("Location: shopcartpage.php");
        exit;
    }


} catch (Exception $e) {
    echo 'Error:' . $e->getMessage();
}

?>




<?php
