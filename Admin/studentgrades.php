<?php
include("../dbconnect.php");

$sid = $_GET['sid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_teacher as t3 on t2.section_name = t3.section_name WHERE t1.stud_ID = '$sid' AND yearlevel = 'Grade 11' AND semester = 'First'");
$rec = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Viewing of Grades</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	
</head>
<style>
	.container{
		font-size: .9rem;
	}
	.btn{
		background-color:green;
		border-radius:8px;
		padding: 7px 7px;
		border: 1px solid transparent;
	}
	.btn a{
		font-size:13px;
		color:white;
	}
	.button{
		padding: 4px 4px;
		margin: 30px 5px;
		border-radius:7px;
		padding:5px;
		background-color: orange;
		color:white;
		border: 1px solid transparent;
	}
	.button a{
		color:white;
	}
	.studinfo{
		font-size: 14px;
	}
	.filterr{
		padding: 4px 4px;
		border-radius: 8px;
	}
	.btn1{
		color: black;
		padding: 4px 4px;
		border: 1px solid transparent;
		border-radius: 8px;
	}
	.btn1:hover{
		background: red;
		color: white;
		transition: .2s ease;
	}
	.studinfo, .studinfo2{
		border-bottom: 1px solid black;
	}

</style>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Viewing of Grades</h4>

			<div class="content">
				<form method="post">
					<table>
						<tr class="studinfo">
							<td colspan="2"><b>STUDENT NAME</b>
							<td align="center" colspan="2"><b>LEARNER'S REFERENCE NUMBER</b></td>
							<td align="center"><b>CLASS SECTION</b></td>
							<td align="right"><b>CLASS ADVISER</b></td>
						</tr>
						<tr class="studinfo2">
							<td colspan="2"><?php echo $rec['stud_lastname'].' , '. $rec['stud_firstname'].'  '. $rec['stud_middleinitial'].'.'; ?></td>
							<td colspan="2" align="center"><?php echo $rec['stud_lrn']; ?></td>
							<td align="center"><?php echo $rec['section_name']; ?></td>
							<td align="right"><?php echo $rec['teacher_lname'].' , '. $rec['teacher_fname'].'  '. $rec['teacher_mname'].'.'; ?></td>
						</tr>

						<tr>
							<td colspan="7" align="right">
								<select name="filter" class="filterr">
									<option selected>See All</option>
									<option>Grade 11 - First Semester</option>
									<option>Grade 11 - Second Semester</option>
									<option>Grade 12 - First Semester</option>
									<option>Grade 12 - Second Semester</option>
								</select>
								<button class="btn1" name="submit1">Search</button>
								<?php
									if (isset($_POST['submit1'])) {
										$var = $_POST['filter'];

										if ($var == 'See All') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_teacher as t3 on t2.section_name = t3.section_name WHERE t1.stud_ID = '$sid'");
										}
										elseif ($var == 'Grade 11 - First Semester') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_teacher as t3 on t2.section_name = t3.section_name WHERE t1.stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST'");
										}
										elseif ($var == 'Grade 11 - Second Semester') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_teacher as t3 on t2.section_name = t3.section_name WHERE t1.stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND'");
										}
										elseif ($var == 'Grade 12 - First Semester') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_teacher as t3 on t2.section_name = t3.section_name WHERE t1.stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'FIRST'");
										}
										elseif ($var == 'Grade 12 - Second Semester') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_teacher as t3 on t2.section_name = t3.section_name WHERE t1.stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND'");
										}
									}
								?>
							</td>
						</tr>

						<tr class="head">
							<td>Subject Name</td>
							<td>Subject Type</td>
							<td>Semester</td>
							<td>Year Level</td>
							<td>First Quarter</td>
							<td>Second Quarter</td>
							<td>Action</td>
						</tr>

						<?php
							while($list = mysqli_fetch_assoc($sql)){				
						?>
						<tr class="content">
							<td><?php echo $list['subject_name']; ?></td>
							<td><?php echo $list['subject_type']; ?></td>
							<td><?php echo $list['semester']; ?></td>
							<td><?php echo $list['yearlevel']; ?></td>
							<td><?php echo $list['first_grade']; ?></td>
							<td><?php echo $list['second_grade']; ?></td>
							<td>
								<button class="btn" name="submit">
									<a href="updateGrades.php?esid=<?php echo $list['es_ID']; ?>">Update</a>
								</button>
							</td>
						</tr>
						<?php } 
						?>
					</table>
					
			<button class="button"> <a href="studentslist.php">Go Back</button>	
		</div>
				</form>
				
			</div>
		</div>
	</div>
</body>
</html>