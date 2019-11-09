<?php
	function email_exists($email, $connect){
		$row = mysqli_query($connect, "SELECT id from admin_tb WHERE email = '$email'");
		{
			if(mysqli_num_rows($row) == 1){
				return true;
			} else {
				return false;
			}
		}
	}
	function loggedIn(){
		if(isset($_SESSION['email'])){
			return true;
		} else {
			return false;
		}
	}
?>