<?php
if (isset($_POST['action']) && $_POST['action'] === 'remove') {
    $id = $_POST['id'];
    echo $id;


    // $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id');
    // $stmt->bindParam(':id', $id);
    // $stmt->execute();

    header("Location: shopcartpage.php");
    exit;
}
?>
