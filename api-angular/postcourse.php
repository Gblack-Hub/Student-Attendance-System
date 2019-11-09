<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();

	#delete student by id
	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);
		$title = $data->title;
		$detail = $data->detail;
		$lecturer_id = (int)$data->lecturer;

    	$sql = "INSERT INTO `course_tb`(`course_title`,`course_detail`,`lecturer_id`) VALUES ('$title','$detail','$lecturer_id')";

		$sqlpost = mysqli_query($connect,$sql);
		if ($sqlpost) {
			echo 'TRUE';
		} else {
			echo mysqli_error($connect);
		}
	}
	exit;
?>