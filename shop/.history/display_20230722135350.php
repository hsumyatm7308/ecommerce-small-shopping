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
   
</body>

</html>