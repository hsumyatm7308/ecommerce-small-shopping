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
        <a href="menfrg.php?letters=<?php echo $row['fsletter'] ?>"  class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">
            <a data-value="<?php echo $row['fsletter'] ?>">
                <?php echo $row['fsletter'] ?>
            </a>
    </a>

    <?php } ?>
<?php endwhile; ?>
<script>
    // Get all anchor elements with the data-value attribute
    const anchorElements = document.querySelectorAll('li a[data-value]');

    // Attach click event listeners to each anchor element
    anchorElements.forEach(anchorElement => {
        anchorElement.addEventListener('click', handleClick);
    });

    // Click event handler
    function handleClick(event) {
        event.preventDefault();
        const value = this.getAttribute('data-value');
        console.log("Value attribute: " + value);
        // You can now use the 'value' variable with the dynamic value from the data-value attribute.
        // You can perform any action based on this value here.

        // Add your filter logic here or call a function to handle the filtering based on the 'value'.
        // For example, you can use AJAX to fetch filtered results based on the 'value' and update the content.
    }
</script>