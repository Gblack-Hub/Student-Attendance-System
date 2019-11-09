<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();

	#delete student by id
	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);

		$id  = (int)$data->staffId;

    	$sql = "DELETE FROM `admin_tb` WHERE `id` = $id LIMIT 1";

		$sqlpost = mysqli_query($connect, $sql);
		if ($sqlpost) {
			echo "Deleted!";
		} else {
			echo "ERROR: not deleted";
		}
	}
	exit;
?>
