<?php
require_once "./database.php";


if (isset($_GET['items'])) {
    $id = $_GET['items'];
    echo $id;

    try {
        global $conn;

        $showsingle = $conn->prepare('SELECT * FROM perfume WHERE id = :id');
        $showsingle->bindParam(":id", $id);
        $showsingle->execute();

        $row = $showsingle->fetch();

    } catch (Exception $e) {
        echo "Error Found : " . $e->getMessage();
    }
}





?>