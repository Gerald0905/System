<?php
include("../dbconnect.php");

$secname = $_GET['secname'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_student WHERE section_name = '$secname'");

$sql1 = mysqli_query($conn, "SELECT * FROM tbl_section WHERE section_name = '$secname'");

$sql2 = mysqli_query($conn, "SELECT * FROM tbl_teacher WHERE section_name = '$secname'");

$sql3 = mysqli_query($conn, "SELECT COUNT(*) as num FROM tbl_student WHERE section_name = '$secname'");
$IDcount = mysqli_fetch_assoc($sql3);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Section and Students | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
</head>
<style>
	.footer{
		padding: 7px 7px;
		border-radius: 8px;
		margin-top: 20px;
		border: 1px solid transparent;
		background: orange;
	}
	.footer a{
		color: white;
	}
	.footer1{
		padding: 7px 7px;
		border-radius: 8px;
		margin-top: 20px;
		border: 1px solid transparent;
		background: blue;
		float: right;
	}
	.footer1 a{
		color: white;
	}
	.head1{
		font-size: 14px;
		color: #333;
	}
	.head{
		font-weight: bold;
		text-transform: uppercase;
		font-size: 13px;
		background-color: #37474f;
		color: white;
	}
	.content{
		font-size: 13px;
	}
</style>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<?php
				while($list = mysqli_fetch_assoc($sql1)){				
			?>
			<h4>Welcome to <?php echo $list['section_name']; ?>!</h4>
			<?php 
				} 
			?>  
		</div>

		<table>
			<tr class="adviser">
			<?php
				while($list1 = mysqli_fetch_assoc($sql2)){				
			?>
				<td colspan="2" class="head1">Class Adviser: <b><?php echo $list1['teacher_lname'].' , '. $list1['teacher_fname'].'  '. $list1['teacher_mname'].'.'; ?></b></td>
			<?php 
				} 
			?>   
				<td colspan="3" align="right" class="head1">Number of enrolled students: <b><?php echo $IDcount['num'] ?></b></td>
			</tr>
			<tr>
				<td class="head">No.</td>
				<td class="head" align="left">Student Name</td>
				<td class="head" align="center">LRN</td>
				<td class="head" align="center">Status</td>
			</tr>
			<?php
				$no = 1;	
				while($list2 = mysqli_fetch_assoc($sql)){	
			?>
			<tr class="content">
				<td align="left"><?php echo $no; ?></td>
				<td align="left"><?php echo $list2['stud_lastname'].' , '. $list2['stud_firstname'].'  '. $list2['stud_middleinitial'].'.'; ?></td>
				<td align="center"><?php echo $list2['stud_lrn']; ?></td>
				<td align="center"><?php echo $list2['student_status']; ?></td>
			</tr>
			<?php 
				$no++ ;
				} 	
			?>   
		</table>

		<button class="footer">
			<a href="teacherslist.php">Teachers' List Page</a>
		</button>
		<button class="footer1">
			<a href="sectionslist.php">Sections' List</a>	
		</button>
	</div>

			

</body>
</html>