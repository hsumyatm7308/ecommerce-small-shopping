<?php
require_once "../database.php";

try {
    if (isset($_POST['data'])) {
        $data = $_POST['data'];

        $searchstmt = $conn->prepare("SELECT DISTINCT perfume_name FROM perfume WHERE perfume_name LIKE '%$data%' OR brand_name LIKE '%$data%'");
        $searchstmt->execute();
        // $result = $searchstmt->fetchAll(PDO::FETCH_ASSOC);

        // foreach ($result as $row) {
        //     echo '<a href="" class="w-[82%] self-start ml-5 mb-1 p-3 border border-t-transparent border-l-transparent border-r-transparent border-b-gray-200">' . $row['perfume_name'] . '</a>';
        // }
    } else {
        echo "No data received.";
    }
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>


<?php while ($row = $searchstmt->fetch()): ?>
    <a class="w-[82%] self-start ml-5 mb-1 px-3 py-2 border border-t-transparent border-l-transparent border-r-transparent border-b-gray-200"><?php $row['perfume_name'] ?> </span>





<?php endwhile; ?>