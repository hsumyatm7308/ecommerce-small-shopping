<?php

require_once "database.php";

try {
    global $conn;

    $stmt = $conn->prepare("SELECT * perfume");

    $stmt->rowCount();

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
   <tr>
    <td></td>
    $id = 1;
        $perfume = "Brit";
        $brand = 1;
        $category = 2;
        $price = 33.80;
   </tr>
</body>

</html>