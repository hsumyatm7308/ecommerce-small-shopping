<?php
require_once "../database.php";

try {
    $data = $_POST['data'];
    $searchstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE perfume_name LIKE '%$data%' OR brand_name LIKE '%$data%'");
    $searchstmt->execute();
    $result = $searchstmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo $row['perfume_name'] . "<br>";
        // Add other data fields you want to display here
    }
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>
