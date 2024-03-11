<?php 
session_start();



if (!isset($_SESSION['id'])) {
    $temp_customer_id = uniqid();
    $_SESSION['id'] = $temp_customer_id;
}



?>