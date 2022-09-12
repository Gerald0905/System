<?php
include("../dbconnect.php");

$sid = $_GET['sid'];

$studinfo = mysqli_query($conn, "SELECT * FROM tbl_student WHERE stud_ID = '$sid'");
$studRec = mysqli_fetch_assoc($studinfo);

$sql = mysqli_query($conn, "SELECT COUNT(es_ID) as num FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11'");
$subjectCount = mysqli_fetch_assoc($sql);

$sql1 = mysqli_query($conn, "SELECT COUNT(es_ID) as num1 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND first_grade != '0' AND second_grade != '0' AND yearlevel = 'GRADE 11'");
$withGradeCount = mysqli_fetch_assoc($sql1);

$sql2 = mysqli_query($conn, "SELECT COUNT(es_ID) as num2 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid'");
$allSubjectCount = mysqli_fetch_assoc($sql2);

$sql3 = mysqli_query($conn, "SELECT COUNT(es_ID) as num3 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND first_grade != '0' AND second_grade != '0'");
$withAllGradesCount = mysqli_fetch_assoc($sql3);

$sec = mysqli_query($conn, "SELECT * FROM tbl_section WHERE section_ID > 0 ORDER BY section_name ASC");

$year = mysqli_query($conn, "SELECT * FROM tbl_yearlevel ORDER BY yearlevel_ID ASC");

$qry = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_teacher as t2 on t1.section_name = t2.section_name WHERE t1.stud_ID = '$sid'");
$qryResult = mysqli_fetch_assoc($qry);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Grade Level & Section Update | Teacher</title>
	<link rel="stylesheet" type="text/css" href="css/grade.css">
	<link rel="stylesheet" type="text/css" href="css/add_grade.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<style type="text/css">
		table{
    		border-collapse: collapse;
    	}
    	table .head td{
    		border-right: 1px solid gray;
    	}
    	table .content{
    		border-bottom: 1px solid gray;
    	}
    	.select{
    		border-radius: 10px;
    		width: 170px;
    	}
    	.remarks{
    		font-size: .8rem;
    		font-style: italic;
    	}
    	input[type="submit"]{
    		padding: .35rem 1.5rem;
    		background-color: crimson;
    		border:  none;
    		border-radius: 9px;
    		color: #fff;
    		opacity: .8;		
    		cursor: pointer;
    		transition: .3s ease;
    		font-weight: 600;
    		text-transform: uppercase;
		}
		input[type="submit"]:hover{
			opacity: 1;
		}
		.header{
			margin-bottom: 35px;
		}
		.header h4{
			font-size: 1rem;
		}
		.back-btn{
			margin-top: 1.5rem;
		}
		.back-btn a{
			text-decoration: none;
			font-size: .9rem;
			color: #333;
		}
		.back-btn a:hover{
			text-decoration: underline;
		}
		ion-icon{
			padding-top: .5rem;
		}
	</style>
</head>
<body>
	<?php
		include('nav.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Update | Year Level & Section</h4>
		</div>
		<div class="content">
			<form method="post">
				<table>
				<tr class="head">
					<td>Student Name</td>
					<td align="center">Learner's Reference Number</td>
					<td align="center">Section</td>
					<td align="center">Year Level</td>
					<td align="center">Action</td>
				</tr>

				<tr class="content">
					<td><?php echo $studRec['stud_firstname'] .' ' .$studRec['stud_middleinitial'] .'. ' .$studRec['stud_lastname']; ?></td>
					<td align="center"><?php echo $studRec['stud_lrn']; ?></td>
					<td align="center">
						<select name="section_name" class="select">
							<option selected hidden><?php echo $studRec['section_name']; ?></option>
							<?php
								while($list = mysqli_fetch_assoc($sec)){	?>
									<option><?php echo $list['section_name']; ?></option>
							<?php 
								}
							?>
						</select>
					</td>
					<td align="center">
						<?php
							if ($subjectCount['num'] == $withGradeCount['num1']) {	?>
								<select name="yearlevel" class="select">
									<option selected hidden><?php echo $studRec['yearlevel_name']; ?></option>
									<?php
										while($list1 = mysqli_fetch_assoc($year)){	?>
											<option><?php echo $list1['yearlevel_name']; ?></option>
									<?php 
										}
									?>
								</select>
							<?php 
							}
							else{	?>
								<input type="hidden" name="yearlevel" value="<?php echo $studRec['yearlevel_name']; ?>">
								<p class="remarks">
									Some grades are missing. Must complete the requirements before proceeding.
								</p>
							<?php
							}
						?>
					</td>
					<td align="center">
						<input type="submit" name="updateStud" value="Update">
					</td>
					<?php
						if (isset($_POST['updateStud'])) {
							$yearlevel_new = $_POST['yearlevel'];
							$section_new = $_POST['section_name'];

							$updateStudentSection = mysqli_query($conn, "UPDATE tbl_student SET section_name = '$section_new' WHERE stud_ID = '$sid'");

							$updateStudentYearlevel = mysqli_query($conn, "UPDATE tbl_student SET yearlevel_name = '$yearlevel_new' WHERE stud_ID = '$sid'");

							if ($updateStudentSection AND !$updateStudentYearlevel) {	?>
								<script type="text/javascript">
									alert("You successfully changed the section of the student to <?php echo $section_new; ?>.");
									window.location = 'teacheradvisees.php';
								</script>
							<?php 
							}
							elseif ($updateStudentYearlevel AND !$updateStudentSection) {	?>
								<script type="text/javascript">
									alert("You successfully changed the yearlevel of the student to <?php echo $updateStudentYearlevel; ?>.");
									window.location = 'teacheradvisees.php';
								</script>
							<?php 
							}
							elseif ($updateStudentYearlevel AND $updateStudentSection) {	?>
								<script type="text/javascript">
									alert("The year level and section of was changed successfully.");
									window.location = 'teacheradvisees.php';
								</script>
							<?php 
							}
						}

					?>
				</tr>
				<tr>
					<td>
						<div class="back-btn">
							<ion-icon name="caret-back-outline"></ion-icon>
							<a href="myclass.php?tid=<?php echo $qryResult['teacher_ID']; ?>">Back</a>
						</div>
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>