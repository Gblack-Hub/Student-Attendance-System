<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();

	#delete student by id
	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);

		#authenticate data from front end before updating the database
		if ($count = count(get_object_vars($data)) != 2){
			echo "Select a course";
		} else {
			$studentId  = (int)$data->studentId;

	    	$sql = mysqli_query($connect, "DELETE FROM `attendance_tb` WHERE `attendance_tb`.`student_id` = $studentId");

			if ($sql) {
				echo 'TRUE';
			} else {
				echo mysqli_error($connect);
			}
		}
	}
	exit;
?>