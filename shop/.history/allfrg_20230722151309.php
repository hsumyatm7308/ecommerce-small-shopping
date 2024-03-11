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

<?php while ($row = $stmt->fetch()): ?>
    <div class="grid grid-cols-3">
        <div class="w-full m-5 flex justify-center items-center flex-col">
            <!-- <img src="./assets/img/perfume/men/men1.jpg" alt="" style="max-width: 200px;"> -->
            <?php
            // Get the image data (BLOB) from the 'image_data' column
            $binary_data = $row['imageurl'];

            // Convert the binary data to base64 encoding
            $base64_image = base64_encode($binary_data);

            // Display the image using the <img> tag with data URI
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image">';
            ?>
            <a href="" class="w-64 self-start">
                <?php $row['perfume_name'] ?> by Burbettry EDT 3.3 OZ 100ml spray for Men
            </a>
            <span class="self-start mt-2">$33.80</span>
        </div>

        <div class="w-full m-5 flex justify-center items-center flex-col">
            <img src="./assets/img/perfume/women/women1.jpg" alt="" style="max-width: 200px;">
            <a href="" class="w-64 self-start">
                Eternity by Calvin Klein EDP 3.3 OZ 100ml spray for Women
            </a>
            <span class="self-start mt-2">$34.78</span>
        </div>

        <div class="w-full m-5 flex justify-center items-center flex-col">
            <img src="./assets/img/perfume/unisex/unisex1.jpg" alt="" style="max-width: 200px;">
            <a href="" class="w-64 self-start">
                CK one by Calvin Klein EDT 6.7 OZ 100ml spray for Unisex
            </a>
            <span class="self-start mt-2">$33.80</span>
        </div>
    </div>


<?php endwhile; ?>