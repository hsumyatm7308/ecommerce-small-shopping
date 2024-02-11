<?php

require_once ('../database.php');

if(isset($_POST['rating_data'])){
    $data = array(
		':username'		    =>	$_POST["user_name"],
		':userrating'		=>	$_POST["rating_data"],
		':userreview'		=>	$_POST["user_review"],
		':datetime'			=>	time()
	);


    $query = "
	INSERT INTO reviewtable 
	(user_name, user_rating, user_review, datetime) 
	VALUES (:user_name, :user_rating, :user_review, :datetime)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";
}


?>