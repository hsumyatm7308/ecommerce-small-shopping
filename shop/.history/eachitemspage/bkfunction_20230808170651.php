<?php
require_once "./database.php";


if (isset($_GET['items'])) {
    $id = $_GET['items'];
    // echo $id;

    try {
        global $conn;

        $showsingle = $conn->prepare('SELECT * FROM perfume WHERE id = :id');
        $showsingle->bindParam(":id", $id);
        $showsingle->execute();

        $row = $showsingle->fetch();

    } catch (Exception $e) {
        echo "Error Found : " . $e->getMessage();
    }
}







?>

<?php
if (isset($_POST['rating_data'])) {
    $rating_data = $_POST['rating_data'];
    // Do something with the rating data, like storing it in the database
    // ...
    echo "Rating value received: " . $rating_data;
}
?>
