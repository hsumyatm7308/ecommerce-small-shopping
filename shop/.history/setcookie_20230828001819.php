<?php 
session_start();
ob_start();

require_once "temporaryid.php";

// Check if 'id' exists in the session before setting the cookie
if (isset($_SESSION['id'])) {
    $temp_customer_id = $_SESSION['id'];
    
    // Set the cookie with an explicit path
    setcookie("temp", $temp_customer_id, time() + 3600 * 24, "/");
}

ob_end_flush();
?>
