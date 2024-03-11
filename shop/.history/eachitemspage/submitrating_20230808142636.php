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
	(username, userrating, user_review, datetime,perfume_id) 
	VALUES (:username, :userrating, :userreview, :datetime,95)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";
}


?>