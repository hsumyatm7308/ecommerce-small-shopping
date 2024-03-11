<?php
require_once "database.php";

if (isset($_GET['items'])) {
    $id = $_GET['items'];
    try {
        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Check if there are any rows returned from the query
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                // Your code to display the review details for each row
                // For example:
                echo "Username: " . $row['username'] . "<br>";
                echo "Review: " . $row['userreview'] . "<br>";
                echo "Rating: " . $row['userrating'] . "<br>";
                echo "Datetime: " . $row['datetime'] . "<br>";
                echo "<hr>";
            }
        } else {
            // No rows found with the given $id
            echo "No reviews found for this item.";
        }

    } catch (Exception $e) {
        echo "Error Found : " . $e->getMessage();
    }
}

?>



<?php while ($row = $stmt->fetch()): ?>
   
<?php endwhile ?>
