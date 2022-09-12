<?php
include("../dbconnect.php");

$sid = $_GET['sid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_student WHERE stud_ID = '$sid'");

$core = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_coresubjects as t2 on t1.yearlevel_ID = t2.yearlevel_ID inner join tbl_semester as t3 on t2.sem_ID = t3.sem_ID WHERE t1.yearlevel_ID = '1' AND t1.stud_ID = '$sid' AND t2.sem_ID = '1'");

$applied = mysqli_query($conn, "SELECT * FROM tbl_appliedsubjects as t1 inner join tbl_student as t2 on t1.strands_ID = t2.strands_ID WHERE t2.stud_ID = '$sid' AND t1.yearlevel_ID = '1' AND t1.strands_ID = t2.strands_ID AND t1.sem_ID = '1'");

$special = mysqli_query($conn, "SELECT * FROM tbl_specialsubjects as t1 inner join tbl_student as t2 on t1.strands_ID = t2.strands_ID WHERE t2.stud_ID = '$sid' AND t1.yearlevel_ID = '1' AND t1.strands_ID = t2.strands_ID AND t1.sem_ID = '1'");



$core1 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_coresubjects as t2 on t1.yearlevel_ID = t2.yearlevel_ID inner join tbl_semester as t3 on t2.sem_ID = t3.sem_ID WHERE t2.yearlevel_ID = '1' AND t1.stud_ID = '$sid' AND t2.sem_ID = '2'");

$applied1 = mysqli_query($conn, "SELECT * FROM tbl_appliedsubjects as t1 inner join tbl_student as t2 on t1.strands_ID = t2.strands_ID WHERE t2.stud_ID = '$sid' AND t1.yearlevel_ID = '1' AND t1.strands_ID = t2.strands_ID AND t1.sem_ID = '2'");

$special1 = mysqli_query($conn, "SELECT * FROM tbl_specialsubjects as t1 inner join tbl_student as t2 on t1.strands_ID = t2.strands_ID WHERE t2.stud_ID = '$sid' AND t1.yearlevel_ID = '1' AND t1.strands_ID = t2.strands_ID AND t1.sem_ID = '2'");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Students Grades</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		body{
			
		}
		.container{
			margin: 1px 0;
		}
		.header h4{
			padding: 10px 20px;
			background-color: #002366;
			color: white;
		}
		table{
			width: 100%;
			border-collapse: collapse;
			border-bottom: 2px solid #002366;
		}
		.head{
			background: #002366;
			color: white;
			font-weight: bold;
		}
		td{
			padding: 5px 5px;
		}
		.footer{
			margin: 30px 15px;
			text-decoration: none;
			font-size: 13px;
			transition: .3s ease;
		}
		.footer a{
			color: black;
		}
		.footer i{
			margin-right: 8px;
		}
		.footer:hover{
			text-decoration: underline;
		}

	</style>
</head>
<body>
	<?php
		include('teacherindex.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Advisees' Grades</h4>
		</div>

		<form method="post">
			<table class="table1">
				<?php
				while($list = mysqli_fetch_assoc($sql)){				
				?>
				<tr>
					<td colspan="4">Student Name: <b><?php echo $list['stud_name']; ?></b></td>
				</tr>
				<tr>
					<td colspan="4">LRN: <b><?php echo $list['stud_lrn']; ?></b></td>
				</tr>
				<tr>
					<td colspan="4">Section: <b><?php echo $list['section_name']; ?></b></td>
				</tr>
				<?php } 
				?>
				<tr>
					<td class="head">Subjects | First Semester</td>
					<td class="head">First Grading</td>
					<td class="head">Second Grading</td>
					<td class="head">Remarks</td>
				</tr>

				<?php
					while($list1 = mysqli_fetch_assoc($core)){				
				?>
				<tr class="content">
					<td><?php echo $list1['coresubject_name']; ?></td>
					<td><input type="number" name="grades" value="####"></td>
					<td><input type="number" name="grades" value="####"></td>
				</tr>
				<?php } 
				?>

				<?php
					while($list2 = mysqli_fetch_assoc($applied)){				
				?>
				<tr class="content">
					<td><?php echo $list2['appliedsubject_name']; ?></td>
					<td><input type="number" name="grades" value="####"></td>
					<td><input type="number" name="grades" value="####"></td>
				</tr>
				<?php } 
				?>

				<?php
					while($list3 = mysqli_fetch_assoc($special)){				
				?>
				<tr class="content">
					<td><?php echo $list3['specialsubject_name']; ?></td>
					<td><input type="number" name="grades" value="####"></td>
					<td><input type="number" name="grades" value="####"></td>
				</tr>
				<?php } 
				?>
				<tr>
					<td></td>
					<td class="average">GPA: </td>
					<td class="average">GPA: </td>
				</tr>
				<tr>
					<td class="head">Subjects | Second Semester</td>
					<td class="head">Third Grading</td>
					<td class="head">Fourth Grading</td>
					<td class="head">Remarks</td>
				</tr>
				<?php
					while($list4 = mysqli_fetch_assoc($core1)){				
				?>
				<tr class="content">
					<td><?php echo $list4['coresubject_name']; ?></td>
					<td><input type="number" name="grades" value="####"></td>
					<td><input type="number" name="grades" value="####"></td>
				</tr>
				<?php } 
				?>

				<?php
					while($list5 = mysqli_fetch_assoc($applied1)){				
				?>
				<tr class="content">
					<td><?php echo $list5['appliedsubject_name']; ?></td>
					<td><input type="number" name="grades" value="####"></td>
					<td><input type="number" name="grades" value="####"></td>
				</tr>
				<?php } 
				?>

				<?php
					while($list6 = mysqli_fetch_assoc($special1)){				
				?>
				<tr class="content">
					<td><?php echo $list6['specialsubject_name']; ?></td>
					<td><input type="number" name="grades" value="####"></td>
					<td><input type="number" name="grades" value="####"></td>
				</tr>
				<?php } 
				?>
				<tr>
					<td></td>
					<td class="average">GPA: </td>
					<td class="average">GPA: </td>
				</tr>
			</table>
		</form>

		<div class="footer">
			<a href="teacheradvisees.php"><i class="fas fa-chevron-circle-left"></i>Advisees Page</a>	
		</div>
		<div>
        <?php 
        include 'scroll-up.php'
        ?>
    </div>
	</div>

</body>
</html>