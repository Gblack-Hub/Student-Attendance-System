<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();
	#get the data
	$students = array();

	$sql = "SELECT id, first_name, last_name, matric_no FROM `student_tb`";
	// $sql = "SELECT id, first_name, last_name, matric_no FROM `attendance_tb` JOIN student_tb USING (id)";

	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$cr = 0;
		while($row = mysqli_fetch_assoc($result))
		{
		    $students[$cr]['id']    = $row['id'];
		    $students[$cr]['firstname']  = $row['first_name'];
		    $students[$cr]['lastname'] = $row['last_name'];
		    $students[$cr]['matricno'] = $row['matric_no'];
		    // $students[$cr]['email'] = $row['email'];
		    // $students[$cr]['department'] = $row['department'];
		    // $students[$cr]['phonenumber'] = $row['phone_number'];

		    $cr++;
		}
	}
	echo json_encode($students);
	exit;
?>