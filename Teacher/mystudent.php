<?php
include("../dbconnect.php");

session_start();

$tid = $_SESSION['tid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_teacher as t1 inner join tbl_enrolledsubjects as t2 on t1.subject_teaching = t2.subject_name inner join tbl_student as t3 on t2.stud_lrn = t3.stud_lrn inner join tbl_semester as t5 on t2.semester = t5.sem_name WHERE t1.teacher_ID = '$tid' AND t5.sem_status = 'Active' AND t3.yearlevel_name = t2.yearlevel ORDER BY stud_lastname ASC");
$sql1 = mysqli_query($conn, "SELECT * FROM tbl_teacher as t1 inner join tbl_enrolledsubjects as t2 on t1.subject_teaching = t2.subject_name inner join tbl_student as t3 on t2.stud_lrn = t3.stud_lrn inner join tbl_semester as t5 on t2.semester = t5.sem_name WHERE t1.teacher_ID = '$tid' AND t5.sem_status = 'Active' AND t3.yearlevel_name = t2.yearlevel ORDER BY stud_lastname ASC");
$sql1Result = mysqli_fetch_assoc($sql1);
?>

<!DOCTYPE html>
<html>    
<head>
	<title>My Advisees | Teacher</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/grade.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/add_grade.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
    <style type="text/css">
    	*{
			margin: 0;
			padding: 0;
		}
		body{
			
		}
		.container{
			
			margin-top:20px;
		}
	
	
		.header h4{
			margin-top:90px;
		}
		@media screen and (max-width:500px) {
			.content{
				margin-top:100px;
			}
		}

		
		table{
			width: 100%;
			border-bottom: 3px solid gray;
			border-collapse: collapse;
			
		}
		td{
			padding: 10px 5px;
		}
		.action .action1{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: green;
			border-radius: 5px;
			margin-right: 10px;
		}
		.action .action2{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: orange;
			border-radius: 5px;
			margin-right: 10px;
		}
		.action .action3{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: #1663b3;
			border-radius: 5px;
			margin-right: 10px;
		}
		.head{
			font-weight: bold;
			text-transform: uppercase;
			border-bottom: 1px solid gray;
		}
		.content1{
			font-size:13px;
		}
		.content1:hover{
			background-color: #f3f3f3;
		}
		.masterlist-btn{
			float: right;
			text-align: center;
			margin-bottom: 25px;
		}
		.masterlist-btn a{
			padding: 9px 9px;
			border: none;
			border-radius: 8px;
			text-decoration: none;
			color: white;
			background: #EE4B2B;
			transition: .2s ease;
		}
		.masterlist-btn a:hover{
			background: crimson;
		}
		.graded-label{
			padding: .3rem .4rem;
			border: 1px solid transparent;
			background-color: crimson;
			width: 4rem;
			border-radius: 15px;
			color: #fff;
		}
		.submitGrade{
			padding: .2rem .4rem;
		}
	</style>
</head>
<body>
	<?php
		include('nav.php');
	?>
	<?php 
	if($sql1Result == 0){	?>
		<script>
			alert("You have no current students registered in this subject. For further concern, kindly contact the system administrator.");
			window.location = "teacheradvisees.php";
		</script>	<?php	
	}
	elseif($sql1Result != 0){	?>
		<div class="container">
		<div class="header">
			<h4>Your Advisees |
			<?php 
				if ($sql1Result['semester'] == 'First') {
					echo 'First Quarter';
				}
				else {
					echo 'Third Quarter';
				}
				?>	
			</h4>
			<br>
			<div class="masterlist-btn">
				<a href="masterlist.php">View Master List</a>
			</div>
			<br>
		</div>

		<div class="content">
			<form method="post" action="./addgrades1_advisees.php">
				<table>
					<tr class="head">
						<td>Student's Name</td>
						<td align="left">LRN</td>
						<td align="center">Year Level</td>
						<td align="center">Status</td>
						<td align="center">Grade Input</td>
						<td align="center">Action</td>
					</tr>
					
					<tr class="content1">
					<?php
						while($list = mysqli_fetch_assoc($sql)){
					?>
						<td>
							<input type="hidden" name="stud_id_advisee" value="<?php echo $list['stud_ID']; ?>">
							<input type="number" name="es_idd" value="<?php echo $list['es_ID']; ?>">
							<input type="hidden" name="stud_lrn" value="<?php echo $list['stud_lrn']; ?>">
							<?php echo $list['stud_lastname'] .', ' .$list['stud_firstname'] .' ' .$list['stud_middleinitial']; ?>.
						</td>
						<td align="left">
							<?php echo $list['stud_lrn']; ?>	
						</td>
						<td align="center">
							<?php echo $list['yearlevel_name']; ?>
						</td>
						<td align="center">
							<?php echo $list['student_status']; ?>
						</td>
						<td align="center">
							<?php 
							if ($list['first_grade'] == 0) {	?>
								<input type="number"  id="grade" name="grade" min="60" max="100" placeholder="eg. 90">
							<?php }
							elseif ($list['first_grade'] != 0) {	?>
								<div class="graded">
									<p class="graded-label">Graded</p>
								</div>
							<?php }
							?>
						</td>
						<td align="center">
							<?php 
							if ($list['first_grade'] == 0) {	?>
								<div class="action">
									<input type="submit" name="uploadFirstGrade" class="submitGrade" value="Upload Grade">
								</div>
							<?php }
							elseif ($list['first_grade'] != 0) {	?>
								<div class="action">
								<input type="submit" disabled name="uploadFirstGrade" class="submitGrade" value="Upload Grade">
							</div>
							<?php }
							?>
						</td>
					</tr>
					<?php } 
					?>
				</table>
			</form>
		</div>
		<?php include 'scroll-up.php' ?>
	</div>
	<?php }
	?>
</body>
</html>