<?php

	header("Access-Control-Allow-Origin: *");

	require 'connect.php';

	$connect = connect();
	#get the data

	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){
		$data = json_decode($postdata);
		$courseId  = (int)$data->courseId;

		$students = array();

		$sql = "SELECT s.id, s.first_name, s.last_name, s.matric_no, aa.count_result from student_tb s join (SELECT student_id, count(*) count_result FROM attendance_tb where course_id= '$courseId' GROUP by student_id) as aa on (s.id = aa.student_id)";

		if ($result = mysqli_query($connect, $sql)) {
			$count = mysqli_num_rows($result);

			$cr = 0;
			while($row = mysqli_fetch_assoc($result))
			{
			    $students[$cr]['id'] = $row['id'];
			    $students[$cr]['firstname'] = $row['first_name'];
			    $students[$cr]['lastname'] = $row['last_name'];
			    $students[$cr]['matricno'] = $row['matric_no'];
			    $students[$cr]['countresult'] = $row['count_result'];

			    $cr++;
			}
		}
		echo json_encode($students);
	}
	exit;

?>