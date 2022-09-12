<?php
include("../dbconnect.php");

$esid = $_GET['esid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE es_ID = '$esid'");
$rec = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Updating the Grades</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/add.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
</head>
<style>

	input[type = 'number']{
		margin-top:10px;
		border: 1px solid gray;
		width: 120px;
	}
	.btn1{
		float:right;
		margin-top:20px;
		color: white;
		border-radius: 7px;
		background: crimson;
		border: 1px solid transparent;
		opacity: .9;
	}
	.btn1:hover{
		opacity: 1;
	}
	.btn{
		margin-top:20px;
		background: none;
		border: 1px solid transparent;
		border-radius: 8px;
		background: orange;
		width: 85px;
	}
	.btn a{
		color: white;
		font-size: 13px;
	}
</style>
<body>
	<?php
		include ('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Student Grades</h4>
		</div>
		<div class="content">
			<form method="post">
				<table>
					<tr class="head">
						<td width="900px">Subject Name</td>
						<td width="500px">Subject Type</td>
						<td>FIRST QUARTER</td>
						<td>SECOND QUARTER</td>
					</tr>
					<tr class="content">
						<td><?php echo $rec['subject_name']; ?></td>
						<td><?php echo $rec['subject_type']; ?></td>
						<td>
							<input type="number" name="first_grade" value="<?php echo $rec['first_grade']; ?>">
						</td>
						<td>
							<input type="number" name="second_grade" value="<?php echo $rec['second_grade']; ?>">
						</td>
					</tr>
					<tr class="btns">
						<td colspan="4">
							<button class="btn"><a href="studentgrades.php?sid=<?php echo $rec['stud_ID']; ?>">Go Back</a></button>
							<button class="btn1" name="update">Update</button>
							<?php
								if (isset($_POST['update'])) {
									$first = $_POST['first_grade'];
									$second = $_POST['second_grade'];

									$updateGrade = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET first_grade = '$first', second_grade = '$second' WHERE es_ID = '$esid'");

									if ($updateGrade) { ?>
										<script type="text/javascript">
											alert("You have updated the grade of the student.");
											window.location = "updateGrades.php?esid=<?php echo $rec['es_ID']; ?>";
										</script>	<?php									
									}

								}
							?>
						</td>
					</tr>
				</table>
			</form>
			
		</div>
	</div>
</body>
</html>