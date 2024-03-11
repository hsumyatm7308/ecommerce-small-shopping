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

    <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td>
                <?php echo "{$row['id']}" ?>
            </td>
            <td>
                <?php echo "{$row['firstname']} {$row['lastname']}" ?>
            </td>
            <td>
                <?php echo "{$row['email']}" ?>
            </td>
            <td>
                <?= "{$row['dob']}" ?>
            </td>
            <td>
                <?= "{$row['phone']}" ?>
            </td>
            <td>
                <?= "{$row['address']}" ?>
            </td>
        </tr>
    <?php endwhile; ?>



    <?php  while($row = $stmt->fetch()) : >?
    
    


    ?>

</body>

</html>