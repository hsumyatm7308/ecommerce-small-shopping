<?php
require_once "./database.php";

try {

    if (isset($_GET['items'])) {
        $id = $_GET['items'];
        $showsingle = $conn->prepare('SELECT * FROM perfume WHERE id = :id');
        $shownsingle->bindParam(":id", $id);
        $showsingle->execute();

        $row = $showsingle->fetch();
    }

} catch (Exception $e) {
    echo "Error Found : " . $e->getMessage();
}


?>