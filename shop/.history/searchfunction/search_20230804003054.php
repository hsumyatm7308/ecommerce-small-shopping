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

        $keeparray = array();

        foreach ($result as $row) {

        if(!in_array($row['perfume_name'],$keeparray)){
                $keeparray[] = $row['perfume_name'];
        }

            echo '<span class="w-[82%] self-start ml-5 mb-1 p-3 border border-t-transparent border-l-transparent border-r-transparent border-b-gray-200">'.$row['perfume_name'] .'</span>';
        }
    } else {
        echo "No data received.";
    }
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>
