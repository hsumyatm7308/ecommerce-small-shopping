<?php
require_once "database.php";

try {
    global $conn;

    // Original query to get all letters
    $lettersStmt = $conn->prepare("SELECT fsletter FROM perfume WHERE category_name IN ('Men','Unisex') ORDER BY fsletter ASC");
    $lettersStmt->execute();

    $shownLetters = array();

    if (isset($_GET['letters'])) {
        $letter = $_GET['letters'];

        // Modify your query to include the filtering based on the 'fsletter' column
        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name IN ('Men','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
        $menstmt->bindParam(":letter", $letter);
    } else {
        // Original query to get all perfumes
        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name IN ('Men','Unisex')");
    }

    $menstmt->execute();
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>

<!-- Display the letters -->
<div class="letter-history">
    <?php while ($row = $lettersStmt->fetch()): ?>
        <?php
        if (!in_array($row['fsletter'], $shownLetters)) {
            $shownLetters[] = $row['fsletter'];
        ?>
            <span class="letter-item">
                <a href="javascript:void(0);" data-letter="<?php echo $row['fsletter'] ?>">
                    <?php echo $row['fsletter'] ?>
                </a>
            </span>
        <?php } ?>
    <?php endwhile; ?>
</div>

<!-- Display the filtered perfumes -->
<div class="grid grid-cols-3">
    <?php while ($row = $menstmt->fetch()): ?>
        <div class="w-full m-5 flex justify-center items-center flex-col">
            <!-- Display your perfume information here -->
            <span><?php echo $row['perfume_name'] ?> by <?php echo $row['brand_name'] ?> EDT 3.3 OZ <?= $row['mili'] ?> spray for <?= $row['category_name'] ?></span>
        </div>
    <?php endwhile; ?>
</div>

<script>
    // Get all anchor elements with the data-letter attribute
    const letterAnchors = document.querySelectorAll('.letter-item a');

    // Attach click event listeners to each anchor element
    letterAnchors.forEach(letterAnchor => {
        letterAnchor.addEventListener('click', handleLetterClick);
    });

    // Click event handler for the letters
    function handleLetterClick(event) {
        event.preventDefault();
        const letter = this.getAttribute('data-letter');

        // Make an AJAX request to fetch the filtered results
        fetch(`menfrg.php?letters=${letter}`)
            .then(response => response.text())
            .then(data => {
                // Replace the content of the perfumes container with the filtered results
                const perfumesContainer = document.querySelector('.grid.grid-cols-3');
                perfumesContainer.innerHTML = data;

                // Re-attach the event listeners to the newly loaded anchor elements
                const letterAnchors = document.querySelectorAll('.letter-item a');
                letterAnchors.forEach(letterAnchor => {
                    letterAnchor.addEventListener('click', handleLetterClick);
                });
            })
            .catch(error => console.error('Error fetching filtered results:', error));
    }
</script>
