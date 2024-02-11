<?php

require_once ('../database.php');

if(isset($_POST['rating_data'])){
    $data = array(
		':username'		    =>	$_POST["username"],
		':userrating'		=>	$_POST["rating_data"],
		':userreview'		=>	$_POST["userreview"],
		':datetime'			=>	time(),
        ':perfumeid'        =>  $_GET["items"]
	);


    $query = "
	INSERT INTO reviewtable 
	(username, userrating, user_review, datetime,perfume_id) 
	VALUES (:username, :userrating, :userreview, :datetime,:perfumeid)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";
}



if(isset($_POST['action'])){
    
}

?>