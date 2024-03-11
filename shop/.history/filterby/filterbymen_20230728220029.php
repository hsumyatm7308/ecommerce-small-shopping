<?php
require_once "database.php";

// Check if the 'letters' parameter exists in the GET request
if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];

    try {
        global $conn;

        // Prepare and execute the query
        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume  WHERE category_name IN ('Men','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
        $menstmt->bindParam(":letter", $letter);
        $menstmt->execute();

        // Display the selected letter
        echo '
            <span class="bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                <span>' . $letter . '</span>
                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
            </span>
        ';

    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
}


?>


<?php if (!empty($letter)): ?>
    <span class="bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
        <span><?php echo $letter; ?></span>
        <span class="text-xs text-stone-500 font-sans mx-1">x</span>
    </span>
<?php endif; ?>


