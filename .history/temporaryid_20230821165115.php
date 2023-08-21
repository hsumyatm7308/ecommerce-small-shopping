<?php 
session_start();



if (isset($_SESSION['temp_customer_id'])) {
    // Session variable 'temp_customer_id' exists.
    $temp_customer_id = $_SESSION['temp_customer_id'];
    echo "Temporary Customer ID: " . $temp_customer_id;
} else {
    echo "Temporary Customer ID is not set.";
}

foreach ($_SESSION as $key => $value) {
    echo "Session variable '$key' has the value: $value<br>";
}


?>