<link rel="stylesheet" type="text/css" href="css/register.css"><?php
include("../dbconnect.php");

$tid = $_GET['stid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_subteacheraccount as t2 on t1.teacher_ID = t2.subteacher_ID WHERE t1.teacher_ID = '$tid'");
$rec = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifying Teacher's Account  | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style>
		button{
			margin-left: 5px;
			background: #1AA7EC;
			padding: 8px 10px;
			border-radius: 10px;
			color: white;
			font-size:13px;
			border: none;
			opacity: .9;
			cursor: pointer;
		}
		button:hover{
			opacity: 1;
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
			background-color: crimson;
			border: 1px solid transparent;
			color: #fff;
			margin-left: 375px;
			margin-top: -20px;
			cursor: pointer;
		}
		.update-btn:hover{
			opacity: 1;
		}
		.back-btn{
			margin-top: 10px;
		}
		.header h4{
			padding: 10px 20px;
			color: white;
			background-color:#37474f;
		}
		.label{
			font-size: .7rem;
			font-style: italic;
		}
</style> 
</head>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Teacher Account Credentials</h4>
		</div>

		<form method="post">
			<table>
				<input type="hidden" value="<?php echo $rec['subteacheraccount_ID']; ?>">
				<tr>
					<td class="head">ID</td>
					<td><input type="number" readonly name="subteacher_ID" value="<?php echo $rec['subteacher_ID']; ?>"></td>
				</tr>
				<tr>
					
				<td class="head">Last Name</td>
                <td><input type="text" class="adviser_list" value=<?php echo $rec['teacher_lname']; ?>  readonly placeholder="" required></td>
                        <td class="head">First Name</td>
                        <td><input type="text" class="adviser_list" value=<?php echo $rec['teacher_fname']; ?> readonly placeholder="" required></td>
                        <td class="head">Middle Name</td>
                        <td><input type="text" class="adviser_list" value=<?php echo $rec['teacher_mname']; ?> readonly placeholder="" required></td>
				</tr>
				<tr>
					<td class="head">Account Username</td>
					<td><input type="text" required name="teacher_username" value="<?php echo $rec['teacher_username']; ?>"></td>
				</tr>
				<tr>
					<td colspan="2">
						<p class="label">
							Note: Upon clicking the Update button, an auto generated password will be set to the teacher's account.
						</p>
					</td>
						<?php
							$autoPassword = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()_+='),0,12);
						?>
					<td>
						<input type="hidden" class="initialPass" value="<?php echo $autoPassword; ?>" readonly name="teacher_password" >
						<input type="hidden" name="teacher_email_address" value="<?php echo $rec['teacher_email_address']; ?>">
					</td>
				</tr>
			</table>

			<div class="footer-links">

				<div class="submit-btn">
					<input type="submit" class="update-btn" name="submit" value="Update Account">
								
				</div>

				<div class="back-btn">
					<a href="subteacherlist.php">Back</a>
				</div>
							
			</div>

			<?php

			if(isset($_POST['submit'])){
					$teacher_ID = $_POST['subteacher_ID'];
					$teacher_email_address = $_POST['teacher_email_address'];
					$teacher_username = $_POST['teacher_username'];
					$teacher_password = md5($_POST['teacher_password']);

					$update = mysqli_query($conn, "UPDATE tbl_subteacheraccount SET teacher_email_address = '$teacher_email_address', teacher_username = '$teacher_username', teacher_password = '$teacher_password' where subteacher_ID = '$teacher_ID'"); 

					if($update){	
						include('email3.php');
						?>
						<script type="text/javascript">
							alert("You have updated the teacher's account.");
							window.location = "subteacherlist.php";
						</script>	<?php
					}
				}
				?>


		</form>
	</div>


</body>
</html>