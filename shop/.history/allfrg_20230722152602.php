<?php
require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT id, perfume_name, brand_id, category_id, price, imageurl FROM perfume");
    $stmt->execute(); // Execute the query to fetch data

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}
?>

<div class="grid grid-cols-3">
    <?php while ($row = $stmt->fetch()): ?>
        <div class="w-full m-5 flex justify-center items-center flex-col">
            <?php
            $binary_data = $row['imageurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            ?>

            <a href="" class="w-64 self-start">
                <?php echo $row['perfume_name'] ?> by Burbettry EDT 3.3 OZ 100ml spray for Men
            </a>
            <span class="self-start mt-2">$33.80</span>
        </div>
    <?php endwhile; ?>
</div>
