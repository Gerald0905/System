<?php
include("../dbconnect.php");

$sid = $_GET['sid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_student WHERE stud_ID = '$sid'"); 
$rec = mysqli_fetch_assoc($sql);

$sql1 = mysqli_query($conn, "SELECT * FROM tbl_student as t2 inner join tbl_teacher as t3 on t2.section_name = t3.section_name WHERE t2.stud_ID = '$sid'"); 
$rec1 = mysqli_fetch_assoc($sql1);

$strands = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strands_ID > 0 ORDER BY strands_ID ASC");
$track = mysqli_query($conn, "SELECT * FROM tbl_tracks WHERE track_ID > 0 ORDER BY track_ID ASC");
$year = mysqli_query($conn, "SELECT * FROM tbl_yearlevel ORDER BY yearlevel_ID ASC");

$sec = mysqli_query($conn, "SELECT * FROM tbl_section WHERE section_ID > 0 ORDER BY section_ID ASC");
$syAll = mysqli_query($conn, "SELECT * FROM tbl_schoolyear");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student's Record | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style type="text/css">
		.delete-student{
			float: right;
			margin-bottom: 20px;
		}
		.delete-student a{
			text-decoration: none;
			font-size: 14px;
			color: red;
			padding: 5px 5px;
			border: 1px solid crimson;
			border-radius: 10px;
		}
		.delete-student a:hover{
			color: white;
			background: crimson;
			border: 1px solid crimson;
			transition: .2s ease;
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
		.header h4{
			padding: 10px 20px;
			background-color:#37474f;
			color: white;
		}
		.track_list{
			width: 252px;
		}
		.adviser_list{
			width: 240px;
		}
		.address{
			width: 89.5%;
		}
		.footer-links{
			display: flex;
			justify-content: space-between;
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
		.table1{
			border-bottom: 2px solid #002366;
			width: 100%;
		}
		.lrn_id{
			width: 240px;
		}
	</style>
</head>
<body>
	<?php
		include('navbar.php')
	?>

	<div class="container">
		<div class="header">
			<h4>Student's Information</h4>
		</div>

		<form method="post">
			<table class="table1">
				<div>
					<tr>
						<td class="head">Student ID</td>
						<td><input type="number" class="lrn_id" name="stud_ID" value="<?php echo $rec['stud_ID']; ?>" readonly></td>
						<td colspan="6">	
							<div class="delete-student">
								<a href="deleteStudInfo.php?sid=<?php echo $rec['stud_ID']; ?>" onclick="confirm('Are you sure to delete this student record with its student portal account?');">Delete Record</a>
							</div>
						</td>
					</tr>
						<td class="head">First Name</td>
						<td><input class="adviser_list" type="text" name="stud_firstname" required value="<?php echo $rec['stud_firstname']; ?>">
						<td><input class="adviser_list" type="text" name="stud_middleinitial" required value="<?php echo $rec['stud_middleinitial']; ?>">
						<td><input class="adviser_list" type="text" name="stud_lastname" required value="<?php echo $rec['stud_lastname']; ?>">
						</td>
					<td class="head" align="center">Sex</td>
						<td>
							<select name="sex" required>
								<option selected hidden><?php echo $rec['sex']; ?></option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</td>
						<td class="head">Birthday</td>
						<td><input type="date" name="bday" required value="<?php echo $rec['bday']; ?>"></td>
						
						
					</tr>
					<tr>
						<td class="head">Address</td>
						<td colspan="3"><input type="text" class="address" name="student_address" required value="<?php echo $rec['student_address']; ?>"></td>
						<td class="head">Email Address</td>
						<td><input type="text"  name="email_address" required value="<?php echo $rec['email_address']; ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="4">
							<p class="desc">Barangay/Municipality/Province</p>
						</td>
					</tr>
					<tr>
						<td class="head">Guardian</td>
						<td><input type="text" class="adviser_list" name="student_guardian" required value="<?php echo $rec['student_guardian']; ?>"></td>
						<td class="head" align="center">Contact Number</td>
						<td><input type="number" name="guardian_contact_number" required value="<?php echo $rec['guardian_contact_number']; ?>"></td>
						<td></td>
					</tr>
				</div>
			</table>
			<br>
			<div class="header">
				<h4>School Information</h4>
			</div>

			<table class="table1">
				<tr>
					<td class="head">LRN</td>
					<td><input type="number" name="stud_lrn" class="lrn_id" required value="<?php echo $rec['stud_lrn']; ?>"></td>
				</tr>
				<tr>
					<td class="head">Track</td>
						<td>
							<select name="track_desc" class="track_list">
								<option selected hidden><?php echo $rec['track_desc']; ?></option>
								<?php
									while($list = mysqli_fetch_assoc($track)){
								?>
								<option disabled>
									<?php echo $list['track_desc']; ?>
								</option>
								<?php } 
								?>
							</select>
						</td>

					<td class="head">Strand</td>
					<td>
						<select name="strands_name">
							<option selected hidden><?php echo $rec['strands_name']; ?></option>
							<?php
								while($list2 = mysqli_fetch_assoc($strands)){
							?>
							<option disabled>
								<?php echo $list2['strands_name']; ?>
							</option>
							<?php } 
							?>
						</select>
					</td>
					<td class="head">Status</td>
					<td>
						<select name="student_status" required>
							<option selected hidden><?php echo $rec['student_status']; ?></option>
							<option>Regular</option>
							<option disabled>Irregular</option>
						</select>
					</td>
				</tr>
				<tr>
						<td></td>
						<td>
							<p class="desc">The TRACK is not changeable. Always check before proceeding.</p>
						</td>
						<td></td>
						<td>
							<p class="desc">The STRAND is not changeable. Always<br>check before proceeding.</p>
						</td>
				</tr>
				<tr>
					<td class="head">Section</td>
					<td>
						<select name="section_name">
							<option selected hidden><?php echo $rec['section_name']; ?></option>
							<?php
								while($list = mysqli_fetch_assoc($sec)){
							?>
							<option>
								<?php echo $list['section_name']; ?>
							</option>
							<?php } 
							?>
						</select>
					</td>
					<td class="head">Year level</td>
					<td>
						<select name="yearlevel_name">
							<option selected hidden><?php echo $rec['yearlevel_name']; ?></option>
							<?php
								while($list1 = mysqli_fetch_assoc($year)){
							?>
							<option>
								<?php echo $list1['yearlevel_name']; ?>
							</option>
							<?php } 
							?>
						</select>
					</td>
					<td class="head">School Year</td>
					<td>
						<select name="sy">
							<option hidden><?php echo $rec['schoolyear']; ?></option>
							<?php 
							while ($syAllResult = mysqli_fetch_assoc($syAll)){	?>
							<option><?php echo $syAllResult['schoolyear_desc']; ?></option>
							<?php }
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="head">Teacher</td>
					<td >
						<?php
							if ($rec1 == 0) {	?>
								<input type="text" class="adviser_list" name="teacher_name"  readonly value="No Adviser Yet"> <?php
							}
							elseif ($rec1['teacher_sex'] == 'Male'){ ?>
								<input type="text"  class="adviser_list" name="teacher_name" value="<?php echo 'Sir ' .$rec1['teacher_name']; ?>" readonly> <?php
							}
							elseif ($rec1['teacher_sex'] == 'Female'){ ?>
								<input type="text"  class="adviser_list" name="teacher_name" value="<?php echo 'Ms. ' .$rec1['teacher_fname'] .' ' .$rec1['teacher_mname'].' '.$rec1['teacher_lname'] ; ?>" readonly> <?php
							}
						 ?>
							
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p class="desc">The current class adviser of the student.</p>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td align="left">
						
					</td>
				</tr>
			</table>

			<div class="footer-links">
				<div class="back-btn">
					<a href="studentslist.php">Back</a>
				</div>
				<div class="update-btn">
					<input type="submit" class="update-btn" name="update" value="Update" id="update">
				</div>
			</div>



	</div>

<?php
	if(isset($_REQUEST['update'])){
		$sid = $_GET['sid'];
		$stud_firstname = $_POST['stud_firstname'];
		$stud_middleinitial = $_POST['stud_middleinitial'];
		$stud_lastname = $_POST['stud_lastname'];
		$stud_lrn = $_POST['stud_lrn'];
		$track_desc = $_POST['track_desc'];
		$strands_name = $_POST['strands_name'];
		$section_name = $_POST['section_name'];
		$email_address = $_POST['email_address'];
		$yearlevel_name = $_POST['yearlevel_name'];
		$student_status = $_POST['student_status'];
		$sex = $_POST['sex'];
		$bday = $_POST['bday'];
		$sy = $_POST['sy'];
		$student_address = $_POST['student_address'];
		$student_status = $_POST['student_status'];
		$student_guardian = $_POST['student_guardian'];
		$guardian_contact_number = $_POST['guardian_contact_number'];
		

		$up = mysqli_query($conn, "UPDATE tbl_student SET stud_firstname = '$stud_firstname', stud_middleinitial = '$stud_middleinitial', stud_lrn = '$stud_lrn', stud_lastname = '$stud_lastname', email_address = '$email_address', sex = '$sex', bday = '$bday', student_address = '$student_address', student_guardian = '$student_guardian', guardian_contact_number = '$guardian_contact_number', section_name = '$section_name', student_status = '$student_status', track_desc = '$track_desc', strands_name = '$strands_name', yearlevel_name = '$yearlevel_name', schoolyear = '$sy' WHERE stud_ID = '$sid'");

		$up2 = mysqli_query($conn, "UPDATE tbl_studentaccount SET stud_lrn = '$stud_lrn', email_address = '$email_address'  WHERE stud_ID = '$sid'");
		$up1 = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET stud_lrn = '$stud_lrn' WHERE stud_ID = '$sid'");

		if($up AND $up2){	?>
			<script type="text/javascript">
			alert("The student's information has been updated.");
			window.location="studentslist.php";
			</script> <?php
		}

	}
					?>
	
		</form>



</body>
</html>