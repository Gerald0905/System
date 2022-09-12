<?php
include("../dbconnect.php");

$stid = $_GET['stid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher WHERE teacher_ID = '$stid'");
$rec = mysqli_fetch_assoc($sql);

$strands = mysqli_query($conn, "SELECT * FROM tbl_strands ORDER BY strands_ID ASC");
$sec = mysqli_query($conn, "SELECT * FROM tbl_section ORDER BY section_ID ASC");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher's Record | System Admin</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style type="text/css">
		.delete-teacher{
			margin-left: 577px;
			margin-bottom: 20px;
		}
		.delete-teacher a{
			text-decoration: none;
			font-size: 14px;
			color: red;
			padding: 5px 5px;
			border: 1px solid crimson;
			border-radius: 10px;
		}
		.delete-teacher a:hover{
			color: white;
			background: crimson;
			border: 1px solid crimson;
			transition: .2s ease;
		}
		input[type="submit"]{
			text-decoration: none;
			margin-left: 389px;
			margin-bottom: 20px;
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
		.table1{
			border-bottom: 2px solid #002366;
			width: 100%;
		}
		.lrn_id{
			width: 240px;
		}
		.track_list{
			width: 252px;
		}
		.adviser_list{
			width: 240px;
		}
		.address{
			width: 95%;
		}
		.footer-links{
			display: flex;
			justify-content: space-between;
		}
		.email{
			width: 39.5rem;
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
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Teacher's Information</h4>
		</div>

		<form method="post">
			<table class="table1">
				<tr>
					<td class="head">Teacher ID</td>
					<td><input type="number" class="lrn_id" name="teacher_ID" value="<?php echo $rec['teacher_ID']; ?>" readonly></td>
					<td colspan="4" align="right">
						<div class="delete-teacher">
							<a href="deletesubTeacherinfo.php?stid=<?php echo $rec['teacher_ID']; ?>" onclick="confirm('Are you sure to delete this record with its account?');">Delete Record</a>
						</div>
					</td>
				</tr>
				<tr>
               		<td class="head">First Name</td>
					<td><input type="text" class="adviser_list" value="<?php echo $rec['teacher_fname']; ?>" placeholder="" required name="teacher_fname"></td>
                    <td class="head">Middle Name</td>
                    <td><input type="text" class="adviser_list" value="<?php echo $rec['teacher_mname']; ?>" placeholder="" required name="teacher_mname"></td>
                    <td class="head">Last Name</td>
                    <td><input type="text" class="adviser_list" value="<?php echo $rec['teacher_lname']; ?>" placeholder="" required name="teacher_lname"></td>
				</tr>
				<tr>
					<td class="head">Sex</td>
					<td>
						<select name="teacher_sex" required>
							<option selected hidden><?php echo $rec['teacher_sex']; ?></option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</td>
					<td class="head">Birthday</td>
					<td><input type="date" name="teacher_bday" required value="<?php echo $rec['teacher_bday']; ?>"></td>
				</tr>
				<tr>
				</tr>
				<tr>
					<td class="head">Address</td>
					<td colspan="5"><input type="text" name="teacher_address" class="address" required value="<?php echo $rec['teacher_address']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p class="desc">Barangay/Municipality/Province</p>
					</td>
					</td>				
				</tr>
				<tr>
					<td class="head">Email Address</td>
					<td colspan="3"><input type="text" name="teacher_email_address" class="email" required value="<?php echo $rec['teacher_email_address']; ?>"></td>
					<td class="head">Contact Number</td>
					<td><input type="number" name="teacher_contact_number" required value="<?php echo $rec['teacher_contact_number']; ?>"></td>
				</tr>
				<tr>
					<td class="head">Strands</td>
					<td>
						<select name="strands_name">
							<option selected hidden><?php echo $rec['strands_name']; ?></option>
								<?php
									while($list = mysqli_fetch_assoc($strands)){
								?>
								<option><?php echo $list['strands_name']; ?></option>
								<?php } 
								?>
						</select>
					</td>
					<td class="head">Assigned Subject</td>
						<td  >
                            <select name="subject_name" class="chosen" > 
							<option selected hidden><?php echo $rec['subject_teaching']?></option>
							<?php
									$sec = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects ORDER BY es_ID ASC");
									while($list1 = mysqli_fetch_assoc($sec)){
								?>
								
								
								<option><?php echo $list1['subject_name']; ?></option>
								<?php } 
								?>
								
							</select>
						</td>
						<td class="head">Status</td>
						<td>
							<select name="teacher_status" required>
								<option selected hidden><?php echo $rec['teacher_status']; ?></option>
								<option>Active</option>
								<option>Inactive</option>
							</select>
						</td>
				</tr>
				<tr>
					<td></td>
				</tr>

			</table>

			<div class="footer-links">
				<div class="back-btn">
					<a href="subteacherlist.php">Back</a>
				</div>
				<div class="update-btn">
					<input type="submit" name="update" value="Update" id="update">
				</div>
			</div>

			<?php
				if(isset($_REQUEST['update'])){
					$tid = $_GET['stid'];
					$teacher_lname = $_POST['teacher_lname'];
					$teacher_fname = $_POST['teacher_fname'];
					$teacher_mname = $_POST['teacher_mname'];
					$teacher_email_address = $_POST['teacher_email_address'];
					$teacher_sex = $_POST['teacher_sex'];
					$teacher_bday = $_POST['teacher_bday'];
					$subject_teaching = $_POST['subject_name'];
					$teacher_address = $_POST['teacher_address'];
					$teacher_contact_number = $_POST['teacher_contact_number'];
					$strands_name = $_POST['strands_name'];
					$teacher_status = $_POST['teacher_status'];

					$up = mysqli_query($conn, "UPDATE tbl_subjectteacher SET teacher_lname = '$teacher_lname',teacher_fname = '$teacher_fname',teacher_mname = '$teacher_mname',teacher_email_address = '$teacher_email_address', teacher_sex = '$teacher_sex', teacher_bday = '$teacher_bday', teacher_address = '$teacher_address', teacher_contact_number = '$teacher_contact_number', strands_name = '$strands_name', subject_teaching = '$subject_teaching', teacher_status = '$teacher_status' WHERE teacher_ID = '$tid'");
					$up1 = mysqli_query($conn, "UPDATE tbl_subteacheraccount SET teacher_email_address = '$teacher_email_address' WHERE subteacher_ID = '$tid'");

					if ($up AND $up1) { ?>
						<script type="text/javascript">
							alert("The teacher's information has been updated.");
							window.location="subteacherlist.php";
						</script> <?php
					}
				}
					?>
		</form>

	</div>

</body>
<script type="text/javascript">
	$(".chosen").chosen();
</script>
</html>