<?php
require_once "database.php";

try {
    global $conn;

    $womenstmt = $conn->prepare("SELECT fsletter FROM perfume WHERE category_name IN ('Women','Unisex') ORDER BY fsletter ASC");
    $womenstmt->execute();


    $shownLetters = array();

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>

<?php while ($row = $womenstmt->fetch()): ?>
    <?php
    if (!in_array($row['fsletter'], $shownLetters)) {
        $shownLetters[] = $row['fsletter'];
        ?>
       

        <?php

        $letter = $row['fsletter'];
        if (isset($_GET['letters']) && $_GET['letters'] === $letter) {
            $backgroundClass = "bg-gray-400 text-white";
        } else {
            $backgroundClass = "bg-gray-100";
        }
        ?>

        <li class="w-7 h-7 flex justify-center items-center m-1 letter-link <?php echo $backgroundClass; ?>">
            <a href="womenfrg.php?letters=<?php echo urlencode($letter); ?>"><?php echo $letter; ?></a>
        </li>
    <?php } ?>




<?php endwhile; ?>