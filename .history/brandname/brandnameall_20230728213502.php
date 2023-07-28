<?php
require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT fsletter FROM perfume  ORDER BY fsletter ASC");
    $stmt->execute(); // Execute the query to fetch data


    $shownLetters = array();

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>

<?php while ($row = $stmt->fetch()): ?>
    <?php
    if (!in_array($row['fsletter'], $shownLetters)) {
        $shownLetters[] = $row['fsletter'];
        ?>
        <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">
            <a href="menfrg.php?letters=<?php echo $row['fsletter'] ?>"> <?php echo $row['fsletter'] ?> </a>
        </li>
    <?php } ?>


    

<?php endwhile; ?>





