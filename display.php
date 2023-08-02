<?php
require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT id, perfume_name, brand_id, category_id, price, imageurl FROM perfume");
    $stmt->execute(); 

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
         

            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['perfume_name'] ?></td>
                <td><?php echo $row['brand_id'] ?></td>
                <td><?php echo $row['category_id'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td>
                    <?php
                  
                    $binary_data = $row['imageurl'];

               
                    $base64_image = base64_encode($binary_data);

             
                    echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image">';
                    ?>
                </td>
            </tr>

        <?php endwhile; ?>

    </table>

</body>

</html>
