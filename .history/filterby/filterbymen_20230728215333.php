<?php
require_once "database.php";

try {
    global $conn;

    $menstmt = $conn->prepare("SELECT fsletter FROM perfume WHERE category_name IN ('Men','Unisex') ORDER BY fsletter ASC");
    $menstmt->execute(); // Execute the query to fetch data


    if(isset($_GET['letters'])){
        
    }

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>

<?php while ($row = $menstmt->fetch()): ?>
  

    <span class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
            <span> <?php $row['fsletter'] ?></span>
            <span class="text-xs text-stone-500 font-sans mx-1">x</span>
        </span>




<?php endwhile; ?>