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
    $averagerating  = 0;
    $totalreview = 0;
    $onestarreview = 0;
    $twostarreview = 0;
    $threestarreview = 0;
    $fourstarreview = 0;
    $fivestarreview = 0;
    $totaluserrating = 0;
    $review_content = array();

    $query = "
	SELECT * FROM review_table 
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);


}

?>