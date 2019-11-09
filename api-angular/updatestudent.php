<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();

	#delete student by id
	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);

		$id  = (int)$data->studentId;

    	$sql = "UPDATE `student_tb`WHERE `id` = $id LIMIT 1";
    	UPDATE `attendance_db`.`student_tb` SET `matric_no` = '124' WHERE `student_tb`.`id` =3;

		$sqlpost = mysqli_query($connect,$sql);
		if ($sqlpost) {
			echo "Deleted!";
		} else {
			echo "ERROR: not deleted";
		}
	}
	exit;
?>
