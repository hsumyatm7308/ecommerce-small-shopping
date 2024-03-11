<?php
require_once "../database.php";

try {
    if (isset($_POST['data'])) {
        $data = $_POST['data'];
        $searchstmt = null;

        if (!empty($data)) {
            $searchstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE perfume_name LIKE '%$data%' OR brand_name LIKE '%$data%'");
        } else {
            $searchstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE perfume_name LIKE '%$data%'");
        }

        $searchstmt->execute();
        $result = $searchstmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            echo $row['perfume_name'] . "<br>";
        }
    } else {
        echo "No data received.";
    }
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>
