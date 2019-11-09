<?php session_start();

	$msg = ""; $msg2 = ""; $email = "";

	require '../api-angular/connect.php';
	require '../api-angular/handler.php';
	$connect = connect();

	if(isset($_POST['submit'])){

		$email = $_POST['email'];
		$password = $_POST['pwd'];
		$remember = isset($_POST['remember']);

		if(empty($email)) {
			$msg = "<div class='alert alert-danger py-1'>Please enter your email</div>";
		}
		else if(empty($password)) {
			$msg2 = "<div class='alert alert-danger py-1'>Please enter your password</div>";
		} else if(email_exists($email, $connect)){
			$result = mysqli_query($connect, "SELECT password FROM admin_tb where email= '$email'");
			$row = mysqli_fetch_assoc($result);

			if(sha1($password) !== $row['password']){
				$msg2 = "<div class='alert alert-danger py-1'>Password is incorrect!</div>";
			} else {
				$_SESSION['email'] = $email;
				if ($remember == 'on') {
					setcookie('cookieEmail',$email, time()+30);
				}
				header("Location: index.php");
			}
		} else {
			$msg = "<div class='alert alert-danger py-1'>Email doesn't exist</div>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<style type="text/css">
		body {
			padding-top: 17vh;
			padding-bottom: 17vh;
			background: linear-gradient(0deg,rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(images/home-bgd.jpg);
			background-size: cover;
		}
	</style>
	<script type="text/javascript" src="../bootstrap/js/angular.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script> -->
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-4"></div>
			<div class="col-sm-12 col-md-4 col-lg-4">
				<div class="card shadow-md">
					<div class="card-header text-center bg-primary">
						<h4 class="text-white">Admin Login</h4>
					</div>
					<div class="card-body">
						<form method="post">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
							</div>
							<?php echo $msg; ?>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="pwd">
							</div>
							<?php echo $msg2; ?>
							<div class="form-group">
								<input type="checkbox" name="remember"> &nbsp; keep me logged in
							</div>
							<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block" />
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4"></div>
		</div>
	</div>
</body>
</html>