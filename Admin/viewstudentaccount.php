<?php
include("../dbconnect.php");

$max = mysqli_query($conn, "SELECT MAX(studentaccount_ID) as max FROM tbl_studentaccount");
$num = mysqli_fetch_assoc($max);

$sid = $_GET['sid'];

$sql1 = mysqli_query($conn, "SELECT * FROM tbl_student WHERE stud_ID = '$sid'");
$rec = mysqli_fetch_assoc($sql1);

$sql = mysqli_query($conn, "SELECT * FROM tbl_studentaccount as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Student's Account</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<style>

		*{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		body{
			margin: 1px 1px;
		}
		.container{
			margin: 10px 0;
		}
		.header h4{
			padding: 10px 20px;
			background-color: #002366;
			color: white;
		}
		
		.footer-links{
			margin-top: 30px;
		}
		input[type="submit"]{
			text-decoration: none;
			margin-left: 165px;
			margin-bottom: 20px;
			width: 250px;
			font-size: 12px;
			font-weight: bold;
			color: black;
			padding: 10px 10px;
			background-color: white;
			border: 1px solid gray;
			border-radius: 10px;
			opacity: .8;		
		}
		input[type="submit"]:hover{
			border: none;
			background: red;
			color: white;
			transition: .3s;
		}
		.back-btn a{
			text-decoration: none;
			font-size: 15px;
			color: black;
			padding: 10px 10px;
			background-color: white;
			border: 1px solid gray;
			border-radius: 10px;
			opacity: .8;
			margin-left: 20px;
		}
		.back-btn a:hover{
			background: orange;
			color: white;
			transition: .3s;
			opacity: 1;
			border: none;
		}
		
		input[type="text"], [type="number"], [type="password"]{
			padding: 10px 10px;
			width: 200px;
			border-radius: 20px;
			border: 1px solid gray;
			font-size: 15px;
		}
		td{
			padding: 10px 25px;
			font-size: 12px;
		}
		tr .head{
			font-weight: bold;
			font-size: 13px;
		}
		table{
			border-bottom: 2px solid #002366;
		}

	</style>
</head>
<body>

	<div class="container">
		
		<div class="header">
			<h4>Creating Student Account Credentials</h4>
		</div>

		
			<form method="post">
				<table class="table">

						<tr>
							<td>
								<input type="hidden" disabled name="studentaccount_ID" value="<?php echo $num['max'] + 1; ?>">
								<input type="hidden" name="studentaccount_ID_hidden" value="<?php echo $num['max'] + 1; ?>">
							</td>
						</tr>

						<tr>
							<td class="head">Student ID</td>
							<td><input type="number" readonly name="stud_ID" value="<?php echo $rec['stud_ID']; ?>"></td>
						</tr>

						<tr>
							<td class="head">Student Name</td>
							<td><input type="text" readonly name="stud_name" value="<?php echo $rec['stud_name']; ?>"></td>
						</tr>

						<tr>
							<td class="head">LRN</td>
							<td><input type="number" readonly name="stud_lrn" value="<?php echo $rec['stud_lrn']; ?>"></td>
						</tr>

						<tr>
							<td class="head">Password</td>
							<td><input type="password" required name="stud_password"></td>
						</tr>

				</table>

					<div class="footer-links">

							<div class="submit-btn">
								<input type="submit" name="submit" value="Create Account">
								
							</div>

							<div class="back-btn">
								<a href="viewstudent.php?sid=<?php echo $rec['stud_ID']; ?>">Back</a>
							</div>
							
						</div>


				<?php

				if(isset($_POST['submit'])){
					$studentaccount_ID = $_POST['studentaccount_ID_hidden'];
					$stud_ID = $_POST['stud_ID'];
					$stud_lrn = $_POST['stud_lrn'];
					$stud_password = md5($_POST['stud_password']);

					$insert = mysqli_query($conn, "INSERT INTO tbl_studentaccount VALUES ('$studentaccount_ID', '$stud_ID', '$stud_lrn', '$stud_password')");
				

				if($insert){	?>
					<script type="text/javascript">
							alert("Student account created");
							window.location = "studentslist.php";
					</script>	<?php
				}
				}
				?>

			</form>

	</div>



</body>
</html>