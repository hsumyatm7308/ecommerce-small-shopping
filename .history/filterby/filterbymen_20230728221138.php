<?php
session_start();

if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];

    // Add the selected letter to the session array if it's not already there
    if (!in_array($letter, $_SESSION['selectedLetters'])) {
        $_SESSION['selectedLetters'][] = $letter;
    }

    try {
        global $conn;

        // Prepare and execute the query
        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name IN ('Men','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
        $menstmt->bindParam(":letter", $letter);
        $menstmt->execute();
    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
}

// ...
// Rest of your code
// ...
?>


<?php foreach ($selectedLetters as $letter): ?>
    <span class="bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
        <span><?php echo $letter; ?></span>
        <span class="text-xs text-stone-500 font-sans mx-1">x</span>
    </span>
<?php endforeach; ?>
