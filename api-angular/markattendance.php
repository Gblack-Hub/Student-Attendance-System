<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();

	#delete student by id
	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);

		#authenticate data from front end before updating the database
		if ($count = count(get_object_vars($data)) != 2 || $data->courseId == 1){
			echo "Select a course";
		} else {
			$studentId  = (int)$data->studentId;
			$courseId  = (int)$data->courseId;

			$sql = mysqli_query($connect, "INSERT INTO `attendance_tb` (`course_id`,`student_id`,`status_id`) VALUES ('$courseId','$studentId','1')");

			if ($sql) {
				echo 'TRUE';
			} else {
				echo mysqli_error($connect);
			}
		}
	}
	exit;
?>