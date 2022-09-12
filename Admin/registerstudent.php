<?php
include("../dbconnect.php");

$error = mysqli_query($conn, "SELECT * FROM tbl_error");
$errorResult = mysqli_fetch_assoc($error);

$max = mysqli_query($conn, "SELECT MAX(stud_ID) as max FROM tbl_student");
$num = mysqli_fetch_assoc($max);

$max1 = mysqli_query($conn, "SELECT MAX(studentaccount_ID) as max1 FROM tbl_studentaccount");
$num1 = mysqli_fetch_assoc($max1);

$sec = mysqli_query($conn, "SELECT * FROM tbl_section WHERE section_ID > 0 ORDER BY section_ID ASC");

$strands = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strands_ID > 0 ORDER BY strands_ID ASC");
$track = mysqli_query($conn, "SELECT * FROM tbl_tracks WHERE track_ID > 0 ORDER BY track_ID ASC");
$year = mysqli_query($conn, "SELECT * FROM tbl_yearlevel ORDER BY yearlevel_ID ASC");

$syActive = mysqli_query($conn, "SELECT * FROM tbl_schoolyear WHERE schoolyear_status = 'Active'");
$syResult = mysqli_fetch_assoc($syActive);

$syAll = mysqli_query($conn, "SELECT * FROM tbl_schoolyear");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Registration | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style>
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
			<h4>System Registration for the Students</h4>
		</div>

		<div class="form">
			
			<form method="post">

				<table class="table1">
					<tr><input type="hidden" class="lrn_id" name="stud_ID_error" readonly value="<?php echo $numError['max'] + 1; ?>">
						<td class="head">Student ID</td>
						<td><input type="text" class="lrn_id" name="stud_ID" readonly value="<?php echo $num['max'] + 1; ?>"></td>
						<input type="hidden" name="stud_ID_hidden" value="<?php echo $num['max'] + 1; ?>">
						<input type="hidden" name="studentaccount_ID" value="<?php echo $num1['max1'] + 1; ?>">
					</tr>
					<tr>
						<td class="head">First Name</td>
						<td><input type="text" class="adviser_list" name="firstname" placeholder="" value="<?php echo $errorResult['stud_firstname']; ?>" required></td>
						<td class="head">Middle Initial</td>
						<td><input type="text" class="adviser_list" name="middleinitial" placeholder="" value="<?php echo $errorResult['stud_middleinitial']; ?>"></td>
						<td class="head">Last Name</td>
						<td><input type="text" class="adviser_list" name="lastname" placeholder="" value="<?php echo $errorResult['stud_lastname']; ?>" required></td>
					</tr>
					<tr>
						<td class="head" align="left">Sex</td>
						<td>
							<select name="sex" class="adviser_list">
								<option hidden><p class="desc"><?php echo $errorResult['sex']; ?></p></option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</td>
						<td class="head">Birthday</td>
						<td><input type="date" name="bday" value="<?php echo $errorResult['bday']; ?>" required class="adviser_list"></td>
					</tr>
					<tr>
						<td class="head">Address</td>
						<td colspan="3"><input type="text" class="address" name="student_address" value="<?php echo $errorResult['student_address']; ?>" required></td>
						<td class="head">Email Address</td>
						<td><input type="email" name="email_address" class="adviser_list" value="<?php echo $errorResult['email_address']; ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="4">
							<p class="desc">Barangay/Municipality/Province</p>
						</td>
					</tr>
					<tr>
					 
						<td class="head">Guardian</td>
						<td><input type="text" name="student_guardian" class="adviser_list" value="<?php echo $errorResult['student_guardian']; ?>" required></td>
						<td class="head" align="center">Contact Number</td>
						<td><input type="number" name="guardian_contact_number" min="0" value="<?php echo $errorResult['guardian_contact_number']; ?>" required  class="adviser_list"></td>
					</tr>
				</table>
				<br>
				<div class="header">
					<h4>School Information</h4>
				</div>

				<table class="table1">
					<tr>
						<td class="head">LRN</td>
						<td><input type="number" required name="stud_lrn" class="lrn_id"></td>
					</tr>
					<tr>
						<td class="head">Track</td>
						<td>
							<select name="track_desc" class="track_list">
								<option selected hidden><p class="desc"><?php echo $errorResult['track_desc']; ?></p></option>
								<?php
									while($list1 = mysqli_fetch_assoc($track)){
								?>
								<option><?php echo $list1['track_desc']; ?></option>
								<?php } 
								?>
							</select>
						</td>
						<td class="head">Strand</td>
						<td><select name="strands_name">
								<option selected hidden><p class="desc"><?php echo $errorResult['strands_name']; ?></p></option>
								<?php
									while($list2 = mysqli_fetch_assoc($strands)){
								?>
								<option><?php echo $list2['strands_name']; ?></option>
								<?php } 
								?>
							</select>
						</td>
						<td class="head">Status</td>
						<td>
							<select name="student_status">
								<option selected hidden><p class="desc"><?php echo $errorResult['student_status']; ?></p></option>
								<option>Regular</option>
								<option disabled>Irregular </option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td align="left"><p class="desc">Academic Track (ABM, HUMSS, and GAS), <br>TVL Track (CSS, CCS, and Technical Drafting).</p></td>
						<td></td>
						<td align="left"><p class="desc">The TRACK & STRAND are not changeable. <br>Always check before proceeding.</p></td>
					</tr>
					<tr>
						<td class="head">Year Level</td>
						<td><select name="yearlevel_name">
								<option selected hidden><p class="desc"><?php echo $errorResult['yearlevel_name']; ?></p></option>
								<?php
									while($list2 = mysqli_fetch_assoc($year)){
								?>
								<option><?php echo $list2['yearlevel_name']; ?></p></option>
								<?php } 
								?>
							</select>
						</td>
						<td class="head">Section</td>
						<td><select name="section_name">
								<option selected hidden><p class="desc"><?php echo $errorResult['section_name']; ?></p></option>
								<?php
									while($list = mysqli_fetch_assoc($sec)){
								?>
								<option><?php echo $list['section_name']; ?></p></option>
								<?php } 
								?>
							</select>
						</td>
						<td class="head">School Year</td>
						<td>
							<select name="sy">
								<option selected hidden><?php echo $syResult['schoolyear_desc']; ?></option>
								<?php 
								while ($syAllResult = mysqli_fetch_assoc($syAll)) { ?>
								<option><?php echo $syAllResult['schoolyear_desc']; ?></option>
								<?php }
								?>
							</select>
						</td>
					</tr>
					<tr><td></td><td></td><td></td><td></td><td></td>
					<td align="left"><p class="desc">The ACTIVE school year is <?php echo $syResult['schoolyear_desc']; ?>.</p></td></tr>
					<tr><td></td>
					 </tr>
					<tr>
						<td colspan="6">
							<p class="label">
								Note: Upon clicking the Register button, an auto generated password will be set to the student's account.
							</p>
						</td>
						<?php
							$code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm!@#$%^&*()_+='),0,12);
						 ?>
						 <td>
						 	<input type="hidden" class="initialPass" value="<?php echo $code; ?>" readonly name="stud_password" >
						 </td>
					</tr>
				</table>
				<div class="footer-links">
					<div class="back-btn">
						<a href="studentslist.php">Back</a>
					</div>
					<div class="update-btn">
						<input type="submit" class="update-btn" name="submit" value="Register" id="update">
					</div>
				</div>

				<?php
				if(isset($_POST['submit'])){			
					$stud_ID = $_POST['stud_ID_hidden'];
					$studentaccount_ID = $_POST['studentaccount_ID'];
					$firstname = $_POST['firstname'];
					$middleinitial = $_POST['middleinitial'];
					$lastname = $_POST['lastname'];
					$stud_lrn = $_POST['stud_lrn'];
					$track_desc = $_POST['track_desc'];
					$strands_name = $_POST['strands_name'];
					$section_name = $_POST['section_name'];
					$yearlevel_name = $_POST['yearlevel_name'];
					$email_address = $_POST['email_address'];
					$sex = $_POST['sex'];
					$bday = $_POST['bday'];
					$student_address = $_POST['student_address'];
					$syy = $_POST['sy'];
					$student_status = $_POST['student_status'];
					$student_guardian = $_POST['student_guardian'];
					$guardian_contact_number = $_POST['guardian_contact_number'];
					$stud_password = md5($_POST['stud_password']);

					$lrnCount = strlen($stud_lrn);

					if ($lrnCount == 12) {
						$insert = mysqli_query($conn, "INSERT INTO tbl_student VALUES ('$stud_ID', '$firstname', '$middleinitial', '$lastname', '$stud_lrn', '$email_address', '$sex', '$bday', '$student_address', '$student_guardian', '$guardian_contact_number', '$section_name', '$student_status', '$track_desc', '$strands_name', '$yearlevel_name', '$syy')");
							
						$insert1 = mysqli_query($conn, "INSERT INTO tbl_studentaccount VALUES ('$studentaccount_ID', '$email_address', '$stud_ID', '$stud_lrn', '$stud_password', '')");

						if($strands_name == 'ABM') {
							$search = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE strands_ID = '1'");
							while($listSubjs = mysqli_fetch_assoc($search)){
								$subject_name = $listSubjs['subject_name'];
								$subject_type = $listSubjs['subject_type'];
								$strands_ID = $listSubjs['strands_ID'];
								$semester = $listSubjs['semester'];
								$yearlevel = $listSubjs['yearlevel'];

								$insertSubjs = mysqli_query($conn, "INSERT INTO tbl_enrolledsubjects VALUES ('', '$stud_ID', '$stud_lrn', '$strands_ID', '$subject_name', '$subject_type', '$yearlevel', '$semester',  '0', '0')");
							}
						}
						elseif($strands_name == 'HUMSS' ) {
							$search = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE strands_ID = '2'");
							while($listSubjs = mysqli_fetch_assoc($search)){
								$subject_name = $listSubjs['subject_name'];
								$subject_type = $listSubjs['subject_type'];
								$strands_ID = $listSubjs['strands_ID'];
								$semester = $listSubjs['semester'];
								$yearlevel = $listSubjs['yearlevel'];

								$insertSubjs = mysqli_query($conn, "INSERT INTO tbl_enrolledsubjects VALUES ('', '$stud_ID', '$stud_lrn', '$strands_ID', '$subject_name', '$subject_type', '$yearlevel', '$semester',  '0', '0')");
							}
						}
						elseif($strands_name == 'GAS') {
							$search = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE strands_ID = '3'");
							while($listSubjs = mysqli_fetch_assoc($search)){
								$subject_name = $listSubjs['subject_name'];
								$subject_type = $listSubjs['subject_type'];
								$strands_ID = $listSubjs['strands_ID'];
								$semester = $listSubjs['semester'];
								$yearlevel = $listSubjs['yearlevel'];

								$insertSubjs = mysqli_query($conn, "INSERT INTO tbl_enrolledsubjects VALUES ('', '$stud_ID', '$stud_lrn', '$strands_ID', '$subject_name', '$subject_type', '$yearlevel',  '$semester', '0', '0')");
							}
						}
						elseif($strands_name == 'CSS') {
							$search = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE strands_ID = '4'");
							while($listSubjs = mysqli_fetch_assoc($search)){
								$subject_name = $listSubjs['subject_name'];
								$subject_type = $listSubjs['subject_type'];
								$strands_ID = $listSubjs['strands_ID'];
								$semester = $listSubjs['semester'];
								$yearlevel = $listSubjs['yearlevel'];

								$insertSubjs = mysqli_query($conn, "INSERT INTO tbl_enrolledsubjects VALUES ('', '$stud_ID', '$stud_lrn', '$strands_ID', '$subject_name', '$subject_type', '$yearlevel', '$semester', '0', '0')");
							}
						}
						elseif($strands_name == 'CCS') {
							$search = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE strands_ID = '5'");
							while($listSubjs = mysqli_fetch_assoc($search)){
								$subject_name = $listSubjs['subject_name'];
								$subject_type = $listSubjs['subject_type'];
								$strands_ID = $listSubjs['strands_ID'];
								$semester = $listSubjs['semester'];
								$yearlevel = $listSubjs['yearlevel'];

								$insertSubjs = mysqli_query($conn, "INSERT INTO tbl_enrolledsubjects VALUES ('', '$stud_ID', '$stud_lrn', '$strands_ID', '$subject_name', '$subject_type', '$yearlevel', '$semester', '0', '0')");
							}
						}
						elseif($strands_name == 'Technical Drafting') {
							$search = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE strands_ID = '6'");
							while($listSubjs = mysqli_fetch_assoc($search)){
								$subject_name = $listSubjs['subject_name'];
								$subject_type = $listSubjs['subject_type'];
								$strands_ID = $listSubjs['strands_ID'];
								$semester = $listSubjs['semester'];
								$yearlevel = $listSubjs['yearlevel'];

								$insertSubjs = mysqli_query($conn, "INSERT INTO tbl_enrolledsubjects VALUES ('', '$stud_ID', '$stud_lrn', '$strands_ID', '$subject_name', '$subject_type', '$yearlevel', '$semester', '0', '0')");
							}
						}
					}
					elseif ($lrnCount < 12 OR $lrnCount > 12) {	
						$errorQry = mysqli_query($conn, "INSERT INTO tbl_error VALUES ('$stud_ID', '$firstname', '$middleinitial', '$lastname', '$stud_lrn', '$email_address', '$sex', '$bday', '$student_address', '$student_guardian', '$guardian_contact_number', '$section_name', '$student_status', '$track_desc', '$strands_name', '$yearlevel_name', '$syy')");
					?>
						<script type="text/javascript">
							alert("The student LRN must have 12 numerical characters. Please try again.");
							window.location = "registerstudent.php";
						</script>	<?php
					}


					if($insert AND $insert1 AND $insertSubjs){	
						include('email.php');
						$deleteError = mysqli_query($conn, "DELETE FROM tbl_error WHERE stud_ID = '$stud_ID'");
						?>
						<script type="text/javascript">
							alert("You have registered and created an account for <?php echo $firstname .' ' .$lastname; ?>.");
							window.location = "studentslist.php";
						</script>	<?php
					}
				}
				?>
			</form>
				<?php include 'scroll-up.php' ?>
		</div>


	</div>


</body>
</html>