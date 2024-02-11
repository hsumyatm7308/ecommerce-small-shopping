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
                    // Get the image data (base64 encoded) from the 'imageurl' column
                    $binary_data = $row['imageurl'];

                    // Decode the image data
                    $decoded_data = base64_decode($binary_data);

                    // Generate a unique file name for each image
                    $output_file = "men". $row['id'] . '.jpg';
                    echo $output_file."decode";

                    // Create the directory if it doesn't exist
                    $output_directory = dirname($output_file);
                    if (!is_dir($output_directory)) {
                        mkdir($output_directory, 0777, true);
                    }

                    // Save the image to a file
                    file_put_contents($output_file, $decoded_data);
                    ?>

                    <!-- Display the image -->
                    <img src="<?php echo $output_file; ?>" alt="Image">
                </td>
            </tr>

        <?php endwhile; ?>

    </table>

</body>

</html>
