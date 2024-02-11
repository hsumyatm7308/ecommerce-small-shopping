<?php

require_once "database.php";
require_once "temporaryid.php";
$tempid = $_SESSION['id'];
$temp_customer_id = $_COOKIE["tempid".$tempid];

if (isset($_POST['action']) && $_POST['action'] === 'del') {
    $id = $_POST['id'];
    echo $id;

    
    $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
    $seletemp->bindParam(":temp",$temp_customer_id);
    $seletemp->execute();
    
    $row = $seletemp->fetch();

    $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id AND temporaryid = :temp');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':temp', $row['id']);
    $stmt->execute();

}
?>