<?php

require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM perfume");

    $stmt->rowCount();

    echo $stmt->fetch();

    $stmt->execute();

} catch (Exception $e) {
    "Error Found : " . $e->getMessage();
}

?>


<html>

<head>
    <title></title>
</head>

<body>

   



    <?php  while($row = $stmt->fetch()) : ?>
        id,perfume_name,brand_id,category_id,price, imageurl
    
        <tr>
            <td>
                <?php echo "{$row['id']}" ?>
            </td>
            <td>
                <?php echo "{$row['perfume_name']}?>
            </td>
            <td>
                <?php echo "{$row['brand_id']}" ?>
            </td>
            <td>
                <?= "{$row['category']}" ?>
            </td>
            <td>
                <?= "{$row['price']}" ?>
            </td>
            <td>
                <?= "{$row['imageurl']}" ?>
            </td>
        </tr>

    <?php endwhile; ?>

</body>

</html>