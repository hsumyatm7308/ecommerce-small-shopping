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

            <!-- <a href="javascript:void(0);" value='menfrg.php?<?php echo $row['fsletter'] ?>' onclick="handleLetterClick('<?php echo $row['fsletter'] ?>')"> -->
                <a href="menfrg.php?menpage=1?letters=<?php echo $row['fsletter'] ?>">

                    <?php echo $row['fsletter'] ?>
                </a>
            <!-- </a> -->

        </li>

    <?php } ?>
<?php endwhile; ?>