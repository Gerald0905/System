<?php
include("../dbconnect.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | Subject Teacher</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="./css/logindesign.css">
</head>
<body>
<div class="background">
	<img src="../Images/2.jpg" alt="school">

	</div>
	<form method="post" action="../login.php">
		<div class="container">
			<div class="header">
				<img src="../Images/logo.png">
				<h4>Dasmariñas East Integrated High School SHS Department - Student Portal</h4>
			</div>
			<div class="header-label">
				<h5><marquee direction="left" scrollamount="7">Login Form for Subject Teachers</marquee></h5>
			</div>
			<div class="form-floating mb-3">
			  <input type="text" name="teacher_username" required class="form-control" id="floatingInput" placeholder="username">
			  <label for="floatingInput">Teacher's Username</label>
			</div>
			<div class="form-floating">
			  <input type="password" class="form-control" name="teacher_password" required id="floatingPassword" placeholder="Password">
			  <label for="floatingPassword">Password</label>
			</div>
			<div class="show-password">
				<input type="checkbox" onclick="myFunction()" id="show-pass">
				<label for="show-pass" class="label-show-password">Show Password</label>
			</div>
			
			<div class="btn">
				<input type="submit" name="subteacherSubmit" value="Login">
			</div><div class="forgot_pass">
				<a href="####" onclick="window.alert('If in case you forgot your password, kindly contact the system administrator to further assist you with your concern. Thank you.');">Forgot your password?</a>
			</div>
			<hr>
			<div class="dir">
				<label for="not">Not a Subject Teacher? Log in as</label>
				<a href="studentLogin.php" name="not">Student</a> <label>or </label> <a href="teacherlogin.php" name="not">Adviser</a><label>or </label>
				<a href="adminLogin.php" name="not">Administrator</a>
			</div>
		</div>
		<?php
		include 'viewpass.js'
		?>
	</form>
</body>
</html>