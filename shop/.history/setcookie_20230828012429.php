<?php
require_once "temporaryid.php";

$temp_customer_id = $_SESSION['id'];

// Check if the 'tempid' cookie with the customer's ID exists
if (isset($_COOKIE['tempid'.$temp_customer_id])) {
    echo "Cookie 'tempid{$temp_customer_id}' exists.";
} else {
    // Set the 'tempid' cookie only if it doesn't exist
    setcookie('tempid'.$temp_customer_id, $temp_customer_id, time() + (3600 * 24));
    echo "Cookie 'tempid{$temp_customer_id}' has been set.";
}
?>
