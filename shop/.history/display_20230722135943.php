<?php

require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM perfume");
    $stmt->execute(); // Execute the query to fetch data

} catch (Exception $e) {
    echo "Error Found : " . $e->getMessage();
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
            <th>Image URL</th>
        </tr>

        <?php  while($row = $stmt->fetch()) : ?>
            <!-- id,perfume_name,brand_id,category_id,price, imageurl -->

            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['perfume_name'] ?></td>
                <td><?php echo $row['brand_id'] ?></td>
                <td><?php echo $row['category_id'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['imageurl'] ?></td>
            </tr>

        <?php endwhile; ?>

    </table>

</body>

</html>
