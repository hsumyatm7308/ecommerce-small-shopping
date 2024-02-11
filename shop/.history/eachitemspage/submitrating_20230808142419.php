<?php

require_once ('../database.php');

if(isset($_POST['rating_data'])){
    $data = array(
		':username'		    =>	$_POST["user_name"],
		':userrating'		=>	$_POST["rating_data"],
		':userreview'		=>	$_POST["user_review"],
		':datetime'			=>	time()
	);


    echo $data;
}


?>