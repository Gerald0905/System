<?php
include("../dbconnect.php");

session_start();

$tid = $_SESSION['tid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_teacher as t1 inner join tbl_student as t2 on t1.section_name = t2.section_name inner join tbl_yearlevel as t3 on t2.yearlevel_name = t3.yearlevel_name WHERE teacher_ID = '$tid' AND t1.section_name = t2.section_name");

$sql1 = mysqli_query($conn, "SELECT COUNT(stud_ID) as num FROM tbl_teacher as t1 inner join tbl_student as t2 on t1.section_name = t2.section_name inner join tbl_yearlevel as t3 on t2.yearlevel_name = t3.yearlevel_name WHERE teacher_ID = '$tid' AND t1.section_name = t2.section_name");

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
		.action1{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: green;
			border-radius: 5px;
			margin-right: 10px;
		}
		.action2{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: orange;
			border-radius: 5px;
			margin-right: 10px;
		}
		.action3{
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
		.my-subject-handles{
			margin-top: 1rem;
			display: flex;
			justify-content: center;
			align-items: center;
			float: right;
			transition: .3s ease;
		}
		.my-subject-handles:hover{
			text-decoration: underline;
			padding-right: 5px;
		}
		.my-subject-handles a{
			text-decoration: none;
			font-size: .9rem;
			color: #333;
		}
	</style>
</head>
<body>
	<?php
		include('nav.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Your Advisees</h4>
			<br>
			<div class="masterlist-btn">
				<a href="masterlist.php">View Master List</a>
			</div>
			<br>
		</div>

		<div class="content">
			<form method="post">
				<table>
					<tr>
						<td colspan="5" align="right">
							<div class="my-subject-handles">
								<a href="teacheradvisees.php?tid=<?php echo $tid; ?>">My Subject Advisees</a><box-icon name='chevron-right'></box-icon>
							</div>
						</td>
					</tr>
					<tr class="head">
						<td>Student's Name</td>
						<td align="left">LRN</td>
						<td align="center">Year Level</td>
						<td align="center">Status</td>
						<td align="center">Action</td>
					</tr>
					<?php
					if ($sql1Result['num'] == 0) {	?>
						<td colspan="5" align="center">
							No students has been enrolled on this section where you was assigned.
						</td>
					<?php 
					}
					elseif ($sql1Result['num'] != 0) {
					
						while($list = mysqli_fetch_assoc($sql)){
					?>
					<tr class="content1">
						<td>
							<?php echo $list['stud_lastname'].', '.$list['stud_firstname'].', '.$list['stud_middleinitial']; ?>
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
								<a class="action2" href="viewgrades.php?sid=<?php echo $list['stud_ID']; ?>">View Records</a>
								<a class="action3" href="updateStudent.php?sid=<?php echo $list['stud_ID']; ?>">Update Data</a>
							</div>
						</td>
					</tr>
					<?php } 
					}
					?>
				</table>
			</form>
		</div>
		<?php include 'scroll-up.php' ?>
	</div>
	<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</body>
</html>