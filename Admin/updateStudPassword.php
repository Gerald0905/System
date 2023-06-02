<?php
include("../dbconnect.php");
$sid = $_GET['sid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_studentaccount as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID WHERE t1.stud_ID = '$sid'");
$rec = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifying Student's Account  | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="./css/register.css">
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
			margin-top: 2rem;
		}
		.update-btn{
			opacity: .9;
			background-color: crimson;
			border: 1px solid transparent;
			color: #fff;
			margin-left: 350px;
			margin-top: -20px;
			cursor: pointer;
		}
		.update-btn:hover{
			opacity: 1;
		}
		.back-btn{
			margin-top: 1px;
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
			<h4>Student Account Credentials</h4>
		</div>

		<form method="post">
			
			<table>

				<tr>
					<td class="head">ID</td>
					<td><input type="number" readonly name="stud_ID" value="<?php echo $rec['stud_ID']; ?>"></td>
				</tr>

				<tr>
					<td class="head">Name</td>
					<td><input type="text" readonly name="stud_name" value="<?php echo $rec['stud_firstname'].' '. $rec['stud_lastname'] ?>"></td>
					
				</tr>

				<tr>
					<td class="head">LRN</td>
					<td><input type="number" name="stud_lrn" value="<?php echo $rec['stud_lrn']; ?>"></td>
				</tr>

				<tr>
					<td colspan="2">
						<p class="label">
							Note: Upon clicking the Update button, an auto generated password will be set to the student's account.
						</p>
					</td>
						<?php
							$autoPassword = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()_+='),0,12);
						?>
					<td>
						<input type="hidden" class="initialPass" value="<?php echo $autoPassword; ?>" readonly name="stud_password" >
						<input type="hidden" name="email_address" value="<?php echo $rec['email_address']; ?>">
					</td>
				</tr>
			</table>

				<div class="footer-links">

					<div class="submit-btn">
						<input type="submit" class="update-btn" name="updateStudentAccount" value="Update Account">
								
					</div>

					<div class="back-btn">
						<a href="studentslist.php">Back</a>
					</div>
							
				</div>

				<?php

				if(isset($_POST['updateStudentAccount'])){
					$stud_lrn = $_POST['stud_lrn'];
					$lrnCount = strlen($stud_lrn);
					$email_address = $_POST['email_address'];
					$hashAutoPassword = ($_POST['stud_password']);

					if($lrnCount == 12){	
						$update = mysqli_query($conn, "UPDATE tbl_studentaccount SET stud_lrn = '$stud_lrn', stud_password = '$hashAutoPassword' where stud_ID = '$sid'"); 
						$update1 = mysqli_query($conn, "UPDATE tbl_student SET stud_lrn = '$stud_lrn' WHERE stud_ID = '$sid'");
						$update2 = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET stud_lrn = '$stud_lrn' WHERE stud_ID = '$sid'");

						if($update AND $update1 AND $update2){	
							include('email1.php');
							?>
							<script type="text/javascript">
								alert("You have updated the student account password with an auto generated one.");
								window.location = "studentslist.php";
							</script>	<?php
						}
					}
					elseif($lrnCount > 12 OR $lrnCount < 12) {	?>
						<script>
							alert("The LRN must contain 12 numerical characters.");
							window.location = "updateStudPassword.php?sid=<?php echo $rec['stud_ID']; ?>";
						</script>	<?php
					}

					

					
				}
				?>

		</form>

	</div>


</body>
</html>