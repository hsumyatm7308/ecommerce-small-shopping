<?php 
session_start();
ob_start();

require_once "temporaryid.php";

    $temp_customer_id = $_SESSION['id'];
    
    setcookie("temp", $temp_customer_id, time() + 3600 * 24, "/");

ob_end_flush();
?>
