<?php
include("../dbconnect.php");

$max = mysqli_query($conn, "SELECT MAX(teacher_ID) as max FROM tbl_teacher");
$num = mysqli_fetch_assoc($max);

$max1 = mysqli_query($conn, "SELECT MAX(teacheraccount_ID) as max1 FROM tbl_teacheraccount");
$num1 = mysqli_fetch_assoc($max1);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Registration | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style>
		button{
			margin-left: 5px;
			background: #ff971A;
			padding: 8px 10px;
			border-radius: 10px;
			color: white;
			font-size:13px;
			border: none;
			border: none;
		}
		button:hover{
			background: #ff971A;
			cursor: pointer;
			color: white;
			font-weight: bold;
			border: none;
		}
		
		input[type="submit"]{
			text-decoration: none;
			margin-left: 460px;
			margin-top: 20px;
			margin-bottom: 20px;
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
		.label{
			font-size: .7rem;
			font-style: italic;
		}
		.table1{
			border-bottom: 2px solid #002366;
			width: 100%;
		}
		.track_list{
			width: 252px;
		}
		.adviser_list{
			width: 240px;
		}
		.address{
			width: 97%;
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
		.email{
			width: 39.5rem;
		}
		.lrn_id{
			width: 240px;
		}
		.chosen{
			width: 500px;
		}
</style> 
</head>
<body>
	<?php
		include('navbar.php');
	?>

	<div class="container">
		<div class="header">
			<h4>System Registration for Adviser Teachers</h4>
		</div>

		<div class="form-group">
			
			<form method="post">

				<table class="table1">

					<tr>
						<td class="head">ID</td>
						<td><input type="text" class="lrn_id" name="teacher_ID" value="<?php echo $num['max'] + 1; ?>" readonly></td>
						<input type="hidden" name="teacher_ID_hidden" value="<?php echo $num['max'] + 1; ?>">
						<input type="hidden" name="teacheraccount_ID" value="<?php echo $num1['max1'] + 1; ?>">
					</tr>
					<tr>
						
						<td class="head">Last Name</td>
						<td><input type="text" class="adviser_list" name="teacher_lname" placeholder="" required></td>
                        <td class="head">First Name</td>
                        <td><input type="text" class="adviser_list" name="teacher_fname" placeholder="" required></td>
                        <td class="head">Middle Name</td>
                        <td><input type="text" class="adviser_list" name="teacher_mname" placeholder="" required></td>
                    </tr>
                    <tr>
						<td class="head" >Sex</td>
						<td>
							<select name="teacher_sex">
								<option hidden selected hidden><p class="desc">Choose here</p></option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</td>
						<td class="head">Birthday</td>
						<td><input type="date" name="teacher_bday"></td>
					</tr>
					<tr>
						<td class="head">Address</td>
						<td colspan="5"><input type="text" class="address" name="teacher_address"></td>
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
						<td colspan="3"><input type="email" class="email" name="teacher_email_address"></td>
						<td class="head">Contact Number</td>
						<td><input type="number" name="teacher_contact_number"></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td class="head">Strand</td>
						<td>
							<select name="strands_name">
								<option selected disabled hidden><p class="desc">Choose here</p></option>
								<?php
									$strand = mysqli_query($conn, "SELECT * FROM tbl_strands ORDER BY strands_ID ASC");
									while($list = mysqli_fetch_assoc($strand)){
								?>
								<option><?php echo $list['strands_name']; ?></option>
								<?php }
								?>
							</select>
						</td>
						<td class="head" >Assigned Subject</td>
						<td  >
                            <select name="subject_name" class="chosen" >
							<option selected hidden><p class="desc"></p></option>
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
							<select name="teacher_status">
								<option disabled selected hidden><p class="desc">Choose here</p></option>
								<option>Active</option>
								<option>Inactive</option>
							</select>
						</td>
					</tr>	
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<p class="desc">INACTIVE teachers are prohibited to access<br>the system.</p>
						</td>
					</tr>
					<tr class="password">
						
					
					<td class="head">Handled Section</td>
						<td><select name="section_name">
								<?php
									$sec = mysqli_query($conn, "SELECT * FROM tbl_section ORDER BY section_ID ASC");
									while($list1 = mysqli_fetch_assoc($sec)){
								?>
								
								<option selected hidden><p class="desc">Choose Section</p></option>
								<option><?php echo $list1['section_name']; ?></option>
								<?php } 
								?>
							</select>
						</td>
						<td class="head">Account Username</td>
						<td><input type="text"  class="adviser_list" name="teacher_username" required></td>
					<tr>
						<td colspan="6">
							<p class="label">
								Note: Upon clicking the Register button, an auto generated password will be set to the teacher's account.
							</p>
						</td>
						<?php
							$code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm!@#$%^&*()_+='),0,12);
						 ?>
						 <td>
						 	<input type="hidden" class="initialPass" value="<?php echo $code; ?>" readonly name="teacher_password" >
						 </td>
					</tr>
			

				</table>
					<div class="footer-links">
						<div class="back-btn">
							<a href="teacherslist.php">Back</a>
						</div>
						<div class="submit-btn">
							<input type="submit" name="submit" value="Register">
						</div>
					</div>

				<?php
				if(isset($_POST['submit'])){
					$teacher_ID = $_POST['teacher_ID_hidden'];
					$teacheraccount_ID = $_POST['teacheraccount_ID'];
					$teacher_lname = $_POST['teacher_lname'];
					$teacher_fname = $_POST['teacher_fname'];
					$teacher_mname = $_POST['teacher_mname'];
					$teacher_email_address = $_POST['teacher_email_address'];
					$teacher_sex = $_POST['teacher_sex'];
					$section_name = $_POST['section_name'];
					$subject_teaching = $_POST['subject_name'];
					$teacher_bday = $_POST['teacher_bday'];
					$teacher_address = $_POST['teacher_address'];
					$teacher_contact_number = $_POST['teacher_contact_number'];
					$strands_name = $_POST['strands_name'];
					$teacher_status = $_POST['teacher_status'];
					$teacher_username = $_POST['teacher_username'];
					$teacher_password = md5($_POST['teacher_password']);


					$insert = mysqli_query($conn, "INSERT INTO tbl_teacher VALUES ('$teacher_ID', '$teacher_lname','$teacher_fname','$teacher_mname', '$teacher_email_address', '$teacher_sex', '$teacher_bday', '$teacher_address', '$teacher_contact_number', '$strands_name', '$section_name','$subject_teaching', '$teacher_status')");

					$insert1 = mysqli_query($conn, "INSERT INTO tbl_teacheraccount VALUES ('$teacheraccount_ID', '$teacher_ID', '$teacher_email_address', '$teacher_username', '$teacher_password')");

					if($insert AND $insert1){	
						include('email2.php');
						?>
						<script type="text/javascript">
							alert("You have registered <?php echo $teacher_fname .' ' .$teacher_lname; ?> to the system.");
							window.location = "teacherslist.php";
						</script>	<?php
					}

				}
				?>
			</form>
			<?php include 'scroll-up.php' ?>
		</div>


	</div>



</body>
<script type="text/javascript">
	$(".chosen").chosen();
</script>
</html>