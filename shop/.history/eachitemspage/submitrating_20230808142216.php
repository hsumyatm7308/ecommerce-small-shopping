<?php

require_once ('./database.php');

if(isset($_POST['rating_data'])){
    $data = array(
		':user_name'		=>	$_POST["user_name"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	time()
	);
}


?>