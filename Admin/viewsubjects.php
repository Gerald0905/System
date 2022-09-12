<?php
	include("../dbconnect.php");

	$strand_id = $_GET['strand_id'];

	$subjectQry = mysqli_query($conn, "SELECT * FROM tbl_subjects as t1 inner join tbl_strands as t2 on t1.strands_ID = t2.strands_ID WHERE t1.strands_ID = '$strand_id'");

	$subjectQry1 = mysqli_query($conn, "SELECT * FROM tbl_subjects as t1 inner join tbl_strands as t2 on t1.strands_ID = t2.strands_ID WHERE t1.strands_ID = '$strand_id'");
	$qryResult = mysqli_fetch_assoc($subjectQry1);

	$strandQry = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strands_ID = '$strand_id'");
	$strandQryResult = mysqli_fetch_assoc($strandQry);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Subjects List</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<style type="text/css">
		.reg i{
			margin-right:5px;
		}
		.add-new{
			margin-bottom: 2rem;
		}
		.table{
			font-size: .9rem;
			margin-top: 3rem;
		}
		.table-header{
			font-weight: bold;
		}
		td{
			padding: 10px 2px;
		}
		td .action{
			margin-right: -10px;
		}
		
		form .head{
			font-weight: bolder;
			font-size: .8rem;
			text-transform: uppercase;
			color: white;
			text-indent: 15px;
			margin-top:20px;
		}
		.header{
			text-transform: uppercase;
			font-size: 1.1rem;
		}
		.content{
			font-size: 1rem;
		}
		.back{
			text-decoration: none;
			float: left;
			margin-bottom: 20px;
			margin-top: 20px;
			padding: 10px;		
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
		.table-header{
			background-color: #546e7a;
			color: #fff;
		}
	</style>
</head>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4><?php echo $strandQryResult['strands_desc']; ?></h4>
		</div>

		<div class="add-new">
			<a class="reg" href="addnewsubject.php?strand_idd=<?php echo $strandQryResult['strands_ID']; ?>"><i class="fas fa-user-plus"></i>Add New Subject</a>
		</div><br>


		<form method="post">
		<div class="table">
			<table class="student-table">
				<tr>
					<td colspan="5">
					<div class="buttons">
						<label for="filter">Filter</label>
						<select name="filterr" id="filter">
							<option selected hidden>See all</option>
							<option>Grade 11-First Semester</option>
							<option>Grade 11-Second Semester</option>
							<option>Grade 12-First Semester</option>
							<option>Grade 12-Second Semester</option>
						</select>
						<input type="submit" name="submit" value="Search">
						<?php
							if (isset($_POST['submit'])) {
								$var = $_POST['filterr'];

								if ($var == 'Grade 11-First Semester') {
									$subjectQry = mysqli_query($conn, "SELECT * FROM tbl_subjects as t1 inner join tbl_strands as t2 on t1.strands_ID = t2.strands_ID WHERE t1.strands_ID = '$strand_id' AND t1.semester = 'First' AND t1.yearlevel = 'Grade 11'");
								}
								elseif ($var == 'Grade 11-Second Semester') {
									$subjectQry = mysqli_query($conn, "SELECT * FROM tbl_subjects as t1 inner join tbl_strands as t2 on t1.strands_ID = t2.strands_ID WHERE t1.strands_ID = '$strand_id' AND t1.semester = 'Second' AND t1.yearlevel = 'Grade 11'");
								}
								elseif ($var == 'Grade 12-First Semester') {
									$subjectQry = mysqli_query($conn, "SELECT * FROM tbl_subjects as t1 inner join tbl_strands as t2 on t1.strands_ID = t2.strands_ID WHERE t1.strands_ID = '$strand_id' AND t1.semester = 'First' AND t1.yearlevel = 'Grade 12'");
								}
								elseif ($var == 'Grade 12-Second Semester') {
									$subjectQry = mysqli_query($conn, "SELECT * FROM tbl_subjects as t1 inner join tbl_strands as t2 on t1.strands_ID = t2.strands_ID WHERE t1.strands_ID = '$strand_id' AND t1.semester = 'Second' AND t1.yearlevel = 'Grade 12'");
								}
							}	
						?>
					</div>
					</td>
				</tr>
				<tr class="table-header">
					<td>Subject Name</td>
					<td>Subject Type</td>
					<td align="center">Time Taken</td>
				</tr>
				<?php 
				while($subjectQryResult = mysqli_fetch_assoc($subjectQry)){	?>
					<tr class="content">
						<td><?php echo $subjectQryResult['subject_name']; ?></td>
						<td><?php echo $subjectQryResult['subject_type']; ?></td>
						<td align="center"><?php echo $subjectQryResult['yearlevel'] .' - ' .$subjectQryResult['semester']; ?> Semester</td>
					</tr>
				<?php }
				?>
			</table>
			<div class="footer-links">
				<div class="back-btn">
					<a href="viewstrands.php?track_id=<?php echo $strandQryResult['track_ID']; ?>">Back</a>
				</div>
			</div>
		</div>
		</form>
	</div>
</body>
</html>