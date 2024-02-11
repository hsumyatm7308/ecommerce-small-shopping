<?php
require_once "database.php";

try {
    global $conn;

    $womenstmt = $conn->prepare("SELECT fsletter FROM perfume WHERE category_name IN ('Men','Unisex') ORDER BY fsletter ASC");
    $womenstmt->execute(); // Execute the query to fetch data


    $shownLetters = array();

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>

<?php while ($row = $womenstmt->fetch()): ?>
    




        <span class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
            <span> <?php $row['fsletter'] ?></span>
            <span class="text-xs text-stone-500 font-sans mx-1">x</span>
        </span>


    <?php } ?>




<?php endwhile; ?>