<?php
include("../dbconnect.php");

if(isset($_POST['password_reset_link']))
{
	$email = mysqli_real_escape_string($conn, $_POST['email_address']);
	$token = md5(rand());

	$check_email = "SELECT email_address FROM tbl_student WHERE email_address= "$email" ";
	$check_email_run = mysqli_query($conn, $check_email);

		if(mysqli_num_rows($check_email_run) >0)
		{
			$row = mysqli_fetch_array($check_email_run);
			$get_name = $row['stud_name'];
			$get_email = $row['email_address'];

			
		}
		else
		{
			$_SESSION['sid'] = "No email found";
			header("location: resetpass.php);
			exit(0);
		}
}