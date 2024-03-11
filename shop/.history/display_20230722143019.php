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

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <table>
        <tr>
            <th>ID</th>
            <th>Perfume Name</th>
            <th>Brand ID</th>
            <th>Category ID</th>
            <th>Price</th>
            <th>Image</th>
        </tr>

        <?php while ($row = $stmt->fetch()) : ?>
            <!-- id, perfume_name, brand_id, category_id, price, imageurl -->

            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['perfume_name'] ?></td>
                <td><?php echo $row['brand_id'] ?></td>
                <td><?php echo $row['category_id'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td>
                    <?php
                    // Get the image data (BLOB) from the 'image_data' column
                    $binary_data = $row['imageurl'];

                    // Convert the binary data to base64 encoding
                    $base64_image = base64_encode($binary_data);

                    // Display the image using the <img> tag with data URI
                    echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image">';
                    ?>
                </td>
            </tr>

        <?php endwhile; ?>

    </table>

</body>

</html>
