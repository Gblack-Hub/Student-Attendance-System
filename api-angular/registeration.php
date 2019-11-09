<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();

	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);

		#// $backEndName = $request -> newName;
		# $email  = preg_replace('/[^a-zA-Z ]/','',$data->email);

		$first_name  = $data->firstname;
		$last_name  = $data->lastname;
		$matric_no = $data->matricno;
		$department  = $data->department;
    	$phone_number = $data->phone;
		$email  = $data->email;

  //   	if($email  == '' || $matric_no == '') return;

    	#uid section
		$microtime = microtime();
		$comps = explode(' ', $microtime);
		$uid = $matric_no.date("s").sprintf('%d%03d', $comps[1], $comps[0] * 1000);

    	$sql = mysqli_query($connect, "INSERT INTO `student_tb`(`first_name`,`last_name`,`matric_no`,`email`,`department`,`phone_number`,`uid`) VALUES ('$first_name','$last_name','$matric_no','$email','$department','$phone_number','$uid')");

    	// $uid_result = mysqli_query($connect, "SELECT id FROM student_tb WHERE matric_no = '$matric_no'");
    	// $student_id = mysqli_fetch_assoc($uid_result)['id'];
    	// echo $student_id;
		// $sql2 = mysqli_query($connect, "INSERT INTO `attendance_tb`(`course_id`,`student_id`) VALUES ('1','$student_id')");

		if ($sql) {
			echo "SUCCESS";
		} else {
			echo "ERROR:".mysqli_error($connect);
			// die($connect->connect_error);
			// echo "ERROR: not added";
		}
	}
	exit;
?>