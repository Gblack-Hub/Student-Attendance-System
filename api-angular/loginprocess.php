<?php

	require 'connect.php';

	$connect = connect();

	// $postdata = file_get_contents("php://input");
	
	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);

		#// $backEndName = $request -> newName;
		# $email  = preg_replace('/[^a-zA-Z ]/','',$data->email);
		$email = $data->email;
		$pwd = $data->pwd;

    	if($email  == '' || $pwd == '') return;

    	$sql = "SELECT email, password FROM `admin_tb` WHERE email = '$email' AND password = '$pwd'";

		$sqlpost = mysqli_query($connect,$sql);
		if ($sqlpost) {
			echo "Logged In Successfully";
			// header("Location: dashpage.htm");
		} else {
			echo "ERROR: not logged in";
		}
	}
	exit;
?>