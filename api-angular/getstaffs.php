<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();
	#get the data
	$staffs = array();
	$sql = "SELECT id, first_name, last_name, email, gender, position, phone_number FROM admin_tb JOIN admin_position_tb USING (id)";

	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$cr = 0;
		while($row = mysqli_fetch_assoc($result))
		{
		    $staffs[$cr]['id']    = $row['id'];
		    $staffs[$cr]['firstname']  = $row['first_name'];
		    $staffs[$cr]['lastname'] = $row['last_name'];
		    $staffs[$cr]['email'] = $row['email'];
		    $staffs[$cr]['gender'] = $row['gender'];
		    $staffs[$cr]['position'] = $row['position'];
		    $staffs[$cr]['phonenumber'] = $row['phone_number'];

		    $cr++;
		}
	}
	echo json_encode($staffs);
	exit;
?>
