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



if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];
    try {
        global $conn;

        // Modify your query to include the filtering based on the 'fsletter' column
        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name IN ('Men','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
        $menstmt->bindParam(":letter", $letter);
        $menstmt->execute();

        // Rest of your code to display the filtered results...
    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
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
    // Get all anchor elements with the data-value attribute
    const anchorElements = document.querySelectorAll('li a[data-value]');

    // Attach click event listeners to each anchor element
    anchorElements.forEach(anchorElement => {
        anchorElement.addEventListener('click', handleClick);
    });

    // Click event handler
    function handleClick(event) {
        // event.preventDefault();
        const value = this.getAttribute('data-value');
        console.log("Value attribute: " + value);
      
    }
</script>