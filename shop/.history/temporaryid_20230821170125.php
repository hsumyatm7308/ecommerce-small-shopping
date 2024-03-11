<?php 
session_start();



if (!isset($_SESSION['temp_customer_id'])) {
    $temp_customer_id = uniqid('');
    $_SESSION['temp_customer_id'] = $temp_customer_id;
}



?>