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
		$email  = $data->email;
		$gender = $data->gender;
		$position  = (int)$data->position;
		$password  = sha1($data->password);
    	$phone_number = $data->phone;

    	if($email  == '' && $password == '' && $phone_number == '' && $phone_number == '' ) return;

    	$sql = "INSERT INTO `admin_tb`(`first_name`,`last_name`,`email`,`gender`,`position_id`,`password`,`phone_number`)
    							VALUES ('$first_name','$last_name','$email','$gender','$position','$password','$phone_number')";

		$sqlpost = mysqli_query($connect,$sql);
		if ($sqlpost) {
			echo "staff added successfully";
		} else {
			echo "ERROR: not added";
		}
	}
	exit;
?>