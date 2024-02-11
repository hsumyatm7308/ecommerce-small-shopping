<?php
require_once('../database.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['username'], $_POST['userreview'], $_POST['rating_data'])) {
    $username = $_POST['username'];
    $userreview = $_POST['userreview'];
    $rating_data = $_POST['rating_data'];
    $id = $_GET['items'];
  
    // $conn = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");
    $stmt = $conn->prepare("INSERT INTO reviewtable (username, userreview, userrating,perfume_id) VALUES (:username, :userreview, :rating,:id)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':userreview', $userreview);
    $stmt->bindParam(':rating', $rating_data);
    $stmt->execute();

    
    echo "Username: " . $username . ", Review: " . $userreview . ", Rating: " . $rating_data;
  }
}



// if (isset($_POST['rating_data'])) {
//     $data = array(
//         ':username' => $_POST["username"],
//         ':userrating' => $_POST["rating_data"],
//         ':userreview' => $_POST["userreview"],
//         ':datetime' => time(),
//         ':perfumeid' => $_GET["items"]
//     );

//     $query = "
// 	INSERT INTO reviewtable 
// 	(username, userrating, user_review, datetime,perfume_id) 
// 	VALUES (:username, :userrating, :userreview, :datetime,:perfumeid)
// 	";

//     $statement = $connect->prepare($query);

//     $statement->execute($data);

//     echo "Your Review & Rating Successfully Submitted";
// }

// if (isset($_POST['action'])) {
//     $averagerating = 0;
//     $totalreview = 0;
//     $onestarreview = 0;
//     $twostarreview = 0;
//     $threestarreview = 0;
//     $fourstarreview = 0;
//     $fivestarreview = 0;
//     $totaluserrating = 0;
//     $review_content = array();

//     $query = "
// 	SELECT * FROM reviewtable 
// 	ORDER BY id DESC
// 	";

//     $result = $connect->query($query, PDO::FETCH_ASSOC);

//     foreach ($result as $row) {
//         $review_content[] = array(
//             'username' => $row["username"],
//             'userreview' => $row["user_review"],
//             'rating' => $row["userrating"],
//             'datetime' => date('l jS, F Y h:i:s A', $row["datetime"])
//         );

//         if ($row["userrating"] == '5') {
//             $fivestarreview++;
//         } elseif ($row["userrating"] == '4') {
//             $fourstarreview++;
//         } elseif ($row["userrating"] == '3') {
//             $threestarreview++;
//         } elseif ($row["userrating"] == '2') {
//             $twostarreview++;
//         } elseif ($row["userrating"] == '1') {
//             $onestarreview++;
//         }

//         $totalreview++;
//         $totaluserrating = $totaluserrating + $row["userrating"];
//     }

//     $averagerating = $totaluserrating / $totalreview;

//     $output = array(
//         'averagerating' => number_format($averagerating, 1),
//         'totalreview' => $totalreview,
//         'fivestarreview' => $fivestarreview,
//         'fourstarreview' => $fourstarreview,
//         'threestarreview' => $threestarreview,
//         'twostarreview' => $twostarreview,
//         'onestarreview' => $onestarreview,
//         'reviewdata' => $review_content
//     );

//     echo json_encode($output);
// }
?>
