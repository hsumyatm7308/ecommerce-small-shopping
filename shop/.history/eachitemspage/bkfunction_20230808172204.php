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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['username'], $_POST['userreview'], $_POST['rating_data'])) {
    $username = $_POST['username'];
    $userreview = $_POST['userreview'];
    $rating_data = $_POST['rating_data'];

    // Do something with the received data, like saving it to a database
    // For example:
    // $conn = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");
    // $stmt = $conn->prepare("INSERT INTO reviews (username, userreview, rating) VALUES (:username, :userreview, :rating)");
    // $stmt->bindParam(':username', $username);
    // $stmt->bindParam(':userreview', $userreview);
    // $stmt->bindParam(':rating', $rating_data);
    // $stmt->execute();
    // echo "Review and rating saved successfully.";

    // Just for demonstration purposes, let's echo the received data
    echo "Username: " . $username . ", Review: " . $userreview . ", Rating: " . $rating_data;
  }
}
?>
