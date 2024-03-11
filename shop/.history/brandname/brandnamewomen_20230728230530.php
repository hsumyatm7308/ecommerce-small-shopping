<?php
require_once "database.php";

try {
    global $conn;

    $womenstmt = $conn->prepare("SELECT fsletter FROM perfume WHERE category_name IN ('Women','Unisex') ORDER BY fsletter ASC");
    $womenstmt->execute(); // Execute the query to fetch data


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
        <a href="javascript:void(0);" onclick="handleLetterClick('<?php echo $row['fsletter'] ?>')">
            <?php echo $row['fsletter'] ?>
        </a>
    <?php } ?>




<?php endwhile; ?>