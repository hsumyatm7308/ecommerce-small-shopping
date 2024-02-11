<?php
require_once "database.php";




try {
    global $conn;

    $menstmt = $conn->prepare("SELECT fsletter FROM perfume WHERE category_name IN ('Men','Unisex') ORDER BY fsletter ASC");
    $menstmt->execute(); // Execute the query to fetch data


    $shownLetters = array();

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>
<?php while ($row = $menstmt->fetch()): ?>
    <?php
    if (!in_array($row['fsletter'], $shownLetters)) {
        $shownLetters[] = $row['fsletter'];
        ?>
        <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">
            <a href="menfrg.php?letters=<?php echo $row['fsletter'] ?>" data-value="<?php echo $row['fsletter'] ?>">
                <?php echo $row['fsletter'] ?>
            </a>
        </li>

    <?php } ?>
<?php endwhile; ?>


<script>
    // Use a more specific selector targeting the anchor with data-value attribute
    const anchorElement = document.querySelector('li a[data-value]');

    // Check if the element exists before trying to access its attribute
    if (anchorElement) {
        // Get the value from the data-value attribute
        const value = anchorElement.getAttribute('data-value');

        console.log("Value attribute: " + value);
    } else {
        console.log("Anchor element not found.");
    }
</script>
