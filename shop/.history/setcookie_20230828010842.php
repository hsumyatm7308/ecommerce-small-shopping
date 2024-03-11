<?php

require_once "temporaryid.php";

$temp_customer_id = $_SESSION['id'];

$getcookie = $_COOKIE['tempid'.$temp_customer_id];

if(isset($getcookie)){
    echo "Cookie 'tempid{$temp_customer_id}' exists.";
} else {
    setcookie('tempid'.$temp_customer_id, $temp_customer_id, time() + (3600 * 24));
    echo "Cookie 'tempid{$temp_customer_id}' has been set.";
    // You can perform additional actions here if the cookie is set for the first time
}

?>
