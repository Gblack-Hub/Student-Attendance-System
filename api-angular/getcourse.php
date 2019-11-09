<?php

	header("Access-Control-Allow-Origin: *");
	
	require 'connect.php';

	$connect = connect();
	#get the data
	$courses = array();
	$sql = "SELECT id, course_title, course_detail, first_name, last_name FROM course_tb JOIN admin_tb USING (id)";

	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$cr = 0;
		while($row = mysqli_fetch_assoc($result))
		{
		    $courses[$cr]['id'] = $row['id'];
		    $courses[$cr]['course_title'] = $row['course_title'];
		    $courses[$cr]['course_detail'] = $row['course_detail'];
		    $courses[$cr]['firstname'] = $row['first_name'];
		    $courses[$cr]['lastname'] = $row['last_name'];

		    $cr++;
		}
	}
	echo json_encode($courses);
	exit;
?>
