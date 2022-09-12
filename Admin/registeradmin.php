<?php
include("../dbconnect.php");

$max = mysqli_query($conn, "SELECT MAX(adminaccount_ID) as max FROM tbl_adminaccount");
$num = mysqli_fetch_assoc($max);

?>

<!DOCTYPE html>
<html>
<head>
	<title>New Admin Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="./css/register.css">
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
		input[type="submit"]{
			text-decoration: none;
			margin-left: 540px;
			margin-bottom: 20px;
			margin-top: 20px;
			width: 200px;
			font-size: 12px;
			font-weight: bold;
			color: #002366;
			padding: 10px 10px;
			background-color: white;
			border: 1px solid gray;
			border-radius: 10px;		
		}
		input[type="submit"]:hover{
			border: none;
			background: red;
			color: white;
			transition: .3s;
		}
		.header h4{
			padding: 10px 20px;
			background-color:#37474f;
			color: white;
		}
		table{
			width: 100%;
		}
		.label{
			font-size: .7rem;
			font-style: italic;
		}
		input{
			width: 300px;
		}
		select{
			width: 315px;
		}
		.footer-links{
			display: flex;
			justify-content: space-between;
		}
		.back-btn{
			text-decoration: none;
			float: left;
			margin-bottom: 20px;
			margin-top: 20px;
			width: 250px;
			font-size: 12px;
			font-weight: bold;
			color: #002366;
			padding: 10px 10px;
			background-color: white;
			border-radius: 10px;	
		}
		.text{
			font-size: .7rem;
		}
	</style>
</head>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>System Registration of a New Web Master</h4>
		</div>

		<div class="form">
			<form method="post">
				<table>
					<tr>
						<td class="head">Administrator ID</td>
						<td><input type="text" name="adminaccount_ID" value="<?php echo $num['max'] + 1; ?>" disabled></td>
						<input type="hidden" name="adminaccount_ID_hidden" value="<?php echo $num['max'] + 1; ?>">
					</tr>
					<tr>
						<td class="head">Name</td>
						<td><input type="text" name="admin_name" placeholder="" required></td>
					</tr>
					<tr>
						<td class="head">Email Address</td>
						<td><input type="email" name="admin_email" placeholder="" required></td>
					</tr>
					<tr>
						<td class="head">Status</td>
						<td>
							<select name="admin_status">
								<option hidden selected><p class="desc">Choose here</p></option>
								<option>Active</option>
								<option>Inactive</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<p class="text">System Admin with an INACTIVE account are prohibited to<br>access the system.</p>
						</td>
					</tr>
					<tr>
						<td class="head">Username</td>
						<td><input type="text" name="admin_username" placeholder="" required></td>
					</tr>
					<tr>
						<td colspan="2">
							<p class="label">
								Note: Upon clicking the Register button, an auto generated password will be set to the admin's account.
							</p>
						</td>
						<?php
							$code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm!@#$%^&*()_+='),0,16);
						 ?>
						 <td>
						 	<input type="hidden" class="initialPass" value="<?php echo $code; ?>" readonly name="admin_password" >
						 </td>
					</tr>
				</table>

				<div class="footer-links">
					<div class="back-btn">
							<a href="adminslist.php">Back</a>
						</div>
					<div class="submit-btn">
						<input type="submit" name="submit" value="Register">
					</div>
				</div>

					<?php
						if(isset($_POST['submit'])){
							$adminaccount_ID = $_POST['adminaccount_ID_hidden'];
							$admin_name = $_POST['admin_name'];
							$admin_email_address = $_POST['admin_email'];
							$admin_status = $_POST['admin_status'];
							$admin_username = $_POST['admin_username'];
							$admin_password = md5($_POST['admin_password']);


							$insert = mysqli_query($conn, "INSERT INTO tbl_adminaccount vALUES ('$adminaccount_ID', '$admin_name', '$admin_email_address', '$admin_status', '$admin_username', '$admin_password')");

							if($insert){	
								include('email4.php');
								?>
								<script type="text/javascript">
									alert("You have registered a new system administrator.");
									window.location = "adminslist.php";
								</script>	<?php
							}
						}

					?>
			</form>
			<?php include 'scroll-up.php' ?>
		</div>
	</div>
</body>
</html>