<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();
	#get the data
	$position = array();
	$sql = "SELECT id, position FROM admin_position_tb";

	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$cr = 0;
		while($row = mysqli_fetch_assoc($result))
		{
		    $position[$cr]['id']    = $row['id'];
		    $position[$cr]['position']  = $row['position'];

		    $cr++;
		}
	}
	echo json_encode($position);
	exit;
?>
