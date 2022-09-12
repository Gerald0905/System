<?php
	include("../dbconnect.php");

	$strand_id = $_GET['strand_idd'];

	$subjectMax = mysqli_query($conn, "SELECT max(subject_ID) as max FROM tbl_subjects");
	$subjectMaxResult = mysqli_fetch_assoc($subjectMax);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adding New Subject</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<style type="text/css">
		.content{
			font-size: 1rem;
		}
		.footer-links{
			display: flex;
			justify-content: space-between;
		}
		input[type="submit"]{
			text-decoration: none;
			margin-top: 20px;
			width: 200px;
			font-size: 12px;
			font-weight: bold;
			color: #002366;
			padding: 10px 10px;
			background-color: white;
			border: 1px solid gray;
			border-radius: 10px;
			cursor: pointer;		
		}
		.back{
			text-decoration: none;
			float: left;
			margin-bottom: 20px;
			margin-top: 20px;
			padding: 10px;		
		}
		input[type="submit"]:hover{
			border: none;
			background: red;
			color: white;
			transition: .3s;
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
	</style>
</head>
<body>
	<?php
		include('navbar.php');
	?>
	<div class="container">
		<div class="header">
			<h4>Adding New Subject</h4>
		</div>

		<div class="body">
			<form method="post">
				<table>
					<tr class="content">
						<td>Subject Name</td>
						<td><input type="hidden" name="subject_id" value="<?php echo $subjectMaxResult['max'] + 1; ?>">
							<input type="text" name="subject_name" placeholder="eg. Reading and Writing" required>
						</td>
					</tr>
					<tr class="content">
						<td>Subject Type</td>
						<td>
							<input type="text" name="subject_type" placeholder="eg. Core, Applied, etc.">
						</td>
					</tr>
					<tr class="content">
						<td>Grade Level</td>
						<td>
							<select name="yearlevel" required>
								<option hidden>Choose here.</option>
								<option>Grade 11</option>
								<option>Grade 12</option>
							</select>
						</td>
					</tr>
					<tr class="content">
						<td>Semester</td>
						<td>
							<select name="semester" required>
								<option hidden>Choose here.</option>
								<option>First</option>
								<option>Second</option>
							</select>
						</td>
					</tr>
				</table>
				<div class="footer-links">
					<div class="back-btn">
						<a href="viewsubjects.php?strand_id=<?php echo $strand_id; ?>">Back</a>
					</div>
					<div class="update-btn">
						<input type="submit" class="update-btn" name="Register" value="Register" id="update">
					</div>
					<?php 
						if (isset($_POST['Register'])) {
							$name = $_POST['subject_name'];
							$type = $_POST['subject_type'];
							$yearlevel = $_POST['yearlevel'];
							$semester = $_POST['semester'];
							$strand_id = $strand_id;
							$subject_id = $_POST['subject_id'];

							$subjectInsertQry = mysqli_query($conn, "INSERT INTO tbl_subjects VALUES('$subject_id', '$name', '$type', '$strand_id', '$semester', '$yearlevel')");

							if ($subjectInsertQry) {	?>
								<script type="text/javascript">
									alert("You have successfully added a new subject.");
									window.location = "curriculumpage.php";
								</script>	<?php
							}
						}
					?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>