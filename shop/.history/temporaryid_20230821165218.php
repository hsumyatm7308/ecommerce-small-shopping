<?php 
session_start();



if (!isset($_SESSION['temp_customer_id'])) {
    $temp_customer_id = uniqid('temp_customer_');
    $_SESSION['temp_customer_id'] = $temp_customer_id;
}



?>