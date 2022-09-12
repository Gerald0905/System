<?php
include("../dbconnect.php");

session_start();
$sid = $_SESSION['sid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST'");
$query = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Your Enrolled Subjects</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/grade.css">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
    <style type="text/css">
    	table{
    		border-collapse: collapse;
    		margin-top: 25px;
    		border-bottom: 2px solid black;
    	}
    	table .head{
    		border-top: 1px solid black;
    	}
    	label {
	        font-weight: bold;
	        text-transform: uppercase;
	        margin-right: 10px;
    	}
    	.btn{
	        text-decoration: none;
	        padding: 6px 6px;
	        border: 1px solid transparent;
	        color: #1357A6;
	        background: none;
	        transition: .3s ease;
	        border-radius: 8px;
	        font-weight: bold;
	    }
	    .btn:hover{
	        background: #1357A6;
	        color: white;
	        text-decoration: none;
	    }
	    .head1{
	    	font-size: .9rem;
	    	text-transform: uppercase;
	    	font-weight: 700;
	    }
    </style>
</head>
<body>
<?php 
        include 'nav_subject.php'
        ?>
	<div class="container">
		<div class="header">
			<h4>enrolled subjects</h4>
		</div>
		<div class="content">
			<form method="post">
				<table class="table table-hover">
					<tr>
						<td colspan="4" align="right">
							<label for="filter">Choose Semester Here</label>
							<select name="subject_name" id="filter">
								<option selected hidden>Click here...</option>
								<option>Grade 11 - First Semester Subjects</option>
								<option>Grade 11 - Second Semester Subjects</option>
								<option>Grade 12 - First Semester Subjects</option>
								<option>Grade 12 - Second Semester Subjects</option>
							</select>
							<button class="btn" name="submit">Search</button>
							<?php 
								if (isset($_POST['submit'])) {
									$var = $_POST['subject_name'];

									if ($var == 'Grade 11 - First Semester Subjects') {
										$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST'");
										$query = mysqli_fetch_assoc($sql);
									}
									elseif ($var == 'Grade 11 - Second Semester Subjects') {
										$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND'");
										$query = mysqli_fetch_assoc($sql);
									}
									elseif ($var == 'Grade 12 - First Semester Subjects') {
										$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'FIRST'");
										$query = mysqli_fetch_assoc($sql);
									}
									elseif ($var == 'Grade 12 - Second Semester Subjects') {
										$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND'");
										$query = mysqli_fetch_assoc($sql);
									}
								}
							?>
						</td>
					</tr>
					<tr class="head1">
						<td>
							<?php 
								if ($query['yearlevel'] == 'Grade 11') {
									if ($query['semester'] == 'First') {
										echo "Grade 11 - First Semester Subjects";
									}
								}
								if ($query['yearlevel'] == 'Grade 11') {
									if ($query['semester'] == 'Second') {
										echo "Grade 11 - Second Semester Subjects";
									}
								}
								if ($query['yearlevel'] == 'Grade 12') {
									if ($query['semester'] == 'First') {
										echo "Grade 12 - First Semester Subjects";
									}
								}
								if ($query['yearlevel'] == 'Grade 12') {
									if ($query['semester'] == 'Second') {
										echo "Grade 12 - Second Semester Subjects";
									}
								}
							?>
						</td>
					</tr>
					<tr class="head">
						<td>Subject Name</td>
						<td>Subject Type</td>
					</tr>
					<?php
						while($list = mysqli_fetch_assoc($sql)){
					?>
					<tr class="content">
						<td><?php echo $list['subject_name']; ?></td>
						<td><?php echo $list['subject_type']; ?></td>
					</tr>
					<?php } 
					?>
	
				</table>
			</form>
		</div>
		<div>
        <?php 
        include 'scroll-up.php'
        ?>
    </div>
	</div>
</body>
</html>