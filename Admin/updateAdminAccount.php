<?php
include("../dbconnect.php");

$aid = $_GET['aid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_adminaccount WHERE adminaccount_ID = '$aid'");
$rec = mysqli_fetch_assoc($sql);

$sql1 = mysqli_query($conn, "SELECT COUNT(adminaccount_ID) AS num FROM tbl_adminaccount");
$IDcount = mysqli_fetch_assoc($sql1);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifying System Admin's Account | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style type="text/css">
		button{
			margin-left: 5px;
			background: #ff971A;
			padding: 8px 10px;
			border-radius: 10px;
			color: white;
			font-size:13px;
			border: none;
			border: none;
		}
		button:hover{
			background: #ff971A;
			cursor: pointer;
			color: white;
			font-weight: bold;
			border: none;
		}
		.initialPass{
			background: none;
			text-align: center;
			color: crimson;
			font-weight: bold;
			cursor: pointer;
		}
		.footer-links{
			margin-top: 3rem;
		}
		.update-btn{
			opacity: .9;
			background-color: #76BA1b;
			border: 1px solid transparent;
			color: #fff;
			padding: 10px 10px;
			cursor: pointer;
			width: 180px;
		}

		.update-btn1{
			opacity: .9;
			background-color: #1663be;
			border: 1px solid transparent;
			color: #fff;
			padding: 10px 10px;
			cursor: pointer;
			width: 180px;
		}
		table{
			width: 100%;
		}
		.footer-links{
			display: flex;
			justify-content: space-between;
		}
		.back-btn{
			text-decoration: none;
			float: left;
			margin-bottom: 20px;
			width: 250px;
			font-size: 12px;
			font-weight: bold;
			color: #002366;
			padding: 10px 10px;
			background-color: white;
			border-radius: 10px;	
		}
		.update-btn:hover, .update-btn1:hover{
			opacity: 1;
		}
		.header h4{
			padding: 10px 20px;
			color: white;
			background-color:#37474f;
		}
		input{
			width: 300px;
		}
		select{
			width: 315px;
		}
	</style>
</head>
<body>
	<?php
		include('navbar.php')
	?>

	<div class="container">
		<div class="header">
			<h4>Web Master Credentials</h4>
		</div>

		<form method="post">
			<table>
				<tr>
					<td><input type="hidden" disabled name="adminaccount_ID" value="<?php echo $IDcount['num']; ?>">
						<input type="hidden" name="adminaccount_ID_hidden" value="<?php echo $IDcount['num']; ?>">
					</td>
				</tr>
				<tr>
					<td class="head">ID</td>
					<td><input type="number" readonly name="admin_ID" value="<?php echo $rec['adminaccount_ID']; ?>"></td>
				</tr>
				<tr>
					<td class="head">Name</td>
					<td><input type="text" required name="admin_name" value="<?php echo $rec['admin_name']; ?>"></td>
				</tr>
				<tr>
					<td class="head">Email Address</td>
					<td><input type="text" required name="admin_email" value="<?php echo $rec['admin_email_address']; ?>"></td>
				</tr>
				<tr>
					<td class="head">Status</td>
					<td>
						<select name="admin_status" required>
							<option selected hidden><?php echo $rec['admin_status']; ?></option>
							<option>Active</option>
							<option>Inactive</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="head">Account Username</td>
					<td><input type="text" required name="admin_username" value="<?php echo $rec['admin_username']; ?>"></td>
				</tr>
			</table>

			<div class="footer-links">
				<div class="back-btn">
					<a href="adminslist.php">Back</a>
				</div>
				<div class="submit-btn">
					<input type="submit" class="update-btn1" name="submit_oldPassword" value="Update with Old Password">	
					<input type="submit" class="update-btn" name="submit_newPassword" value="Update with New Password">	

					<?php
						$code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm!@#$%^&*()_+='),0,16);
					?>
					<input type="hidden" class="initialPass" value="<?php echo $code; ?>" readonly name="admin_password" >	

				</div>	
			</div>

			<?php

			if(isset($_POST['submit_oldPassword'])){
					$adminaccount_ID = $_POST['adminaccount_ID_hidden'];
					$admin_name = $_POST['admin_name'];
					$admin_email_address = $_POST['admin_email'];
					$admin_status = $_POST['admin_status'];
					$admin_username = $_POST['admin_username'];

					$update = mysqli_query($conn, "UPDATE tbl_adminaccount SET admin_name = '$admin_name', admin_email_address = '$admin_email_address', admin_status = '$admin_status', admin_username = '$admin_username' where adminaccount_ID = '$aid'"); 

					if($update){	?>
						<script type="text/javascript">
							alert("You have updated the admin account with the old password.");
							window.location = "adminslist.php";
						</script>	<?php
					}
				}

				if(isset($_POST['submit_newPassword'])){
					$adminaccount_ID = $_POST['adminaccount_ID_hidden'];
					$admin_name = $_POST['admin_name'];
					$admin_email_address = $_POST['admin_email'];
					$admin_status = $_POST['admin_status'];
					$admin_username = $_POST['admin_username'];
					$admin_password = md5($_POST['admin_password']);

					$update = mysqli_query($conn, "UPDATE tbl_adminaccount SET admin_name = '$admin_name', admin_email_address = '$admin_email_address', admin_status = '$admin_status', admin_username = '$admin_username', admin_password = '$admin_password' WHERE adminaccount_ID = '$aid'"); 

					if($update){	
						include('email5.php');
						?>
						<script type="text/javascript">
							alert("You have updated the admin account with the new password.");
							window.location = "adminslist.php";
						</script>	<?php
					}
				}

				?>
		</form>
	</div>


</body>
</html>