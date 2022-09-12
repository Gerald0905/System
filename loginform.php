<?php
include("dbconnect.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		body{

		}
		.container{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			text-align: center;
			width: 450px;
			padding: 50px 60px;
			background: white;
			border-radius: 2px;
			border: 1px solid gray;
			border-radius: 10px;
			box-shadow: 4px 6px gray;
		}
		.header h4{
			font-size: 14px;
		}
		.header h5{
			font-size: 13px;
			padding-bottom: 8px;
		}
		.header img{
			height: 20px;
			width: 0 auto;
			float: left;
		}
		label{
			font-size: 13px;
		}
		.form-floating input{
			border-radius: 25px;
		}
		input[type="submit"]{
			padding: 10px 10px;
			width: 200px;
			margin: 20px 0;
			outline: none;
			border: 1px solid gray;
			color: gray;
			background: none;
			border-radius: 20px;
			cursor: pointer;
			font-weight: bold;
		}
		input[type="submit"]:hover{
			background: #009879;
			transition: .4s ease;
			color: white;
		}
		.dir{
			color: #34495e;
			font-size: 13px;
			margin-top: 30px;
		}
		.dir label{
			color: black;
		}
		.dir a{
			text-decoration: none;
			color: #3498db;
			padding: 7px 7px;
			border: 0px;
			border-radius: 10px;
			font-weight: bold;
		}
		.dir a:hover{	
			color: white;
			background: #2ecc71;
			transition: .4s ease;
		}
		.forgot_pass{
			font-size: 12px;
			padding: 2px 2px;
		}
		.forgot_pass a{
			color: #3498db;
			text-decoration: none;
			float: right;
		}
		.forgot_pass a:hover{
			text-decoration: underline;
		}

	</style>
</head>
<body>
	<form method="post" action="login.php">
		<div class="container">
			<div class="header">
				<img src="Images/logo.png">
				<h4>Dasmariñas East Integrated High School - SHS Department Student Portal</h4><hr>
				<h5><marquee direction="left" scrollamount="7">Login Form for Students</marquee></h5>
			</div>
			<div class="form-floating mb-3">
			  <input type="number" name="stud_lrn" required class="form-control" id="floatingInput" placeholder="LRN">
			  <label for="floatingInput">Student LRN</label>
			</div>
			<div class="form-floating">
			  <input type="password" class="form-control" name="stud_password" required id="floatingPassword" placeholder="Password">
			  <label for="floatingPassword">Password</label>
			</div>
			<div class="forgot_pass">
				<a href="####" onclick="window.alert('If in case you forgot your password, kindly contact your adviser teacher to further assist you with your concern. Thank you.');">Forgot your password?</a>
			</div>	
			<div class="btn">
				<input type="submit" name="studSubmit" value="Login">
			</div><hr>
			<div class="dir">
				<label for="not">Not a Student? Log in as</label>
				<a href="teacherLogin.php" name="not">Adviser</a><a href="subteacherLogin.php" name="not">Subject Teacher</a> <label>or </label>
				<a href="adminLogin.php" name="not">Administrator</a>
			</div>
		</div>
	</form>
</body>
</html>