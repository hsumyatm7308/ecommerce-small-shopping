<?php 

require_once "temporaryid.php";

$temp_customer_id = $_SESSION['id'];



setcookie('tempid'.$temp_customer_id,$temp_customer_id,time()+ (3600 * 24 ));

?>