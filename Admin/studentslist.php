<?php
include("../dbconnect.php");

$sql = mysqli_query($conn, "SELECT * FROM tbl_student ORDER BY stud_lastname ASC"); 

$sql1 = mysqli_query($conn, "SELECT COUNT(*) AS num FROM tbl_student");
$IDcount = mysqli_fetch_assoc($sql1);

?>

<!DOCTYPE html>
<html>
<head>
	<title>List of Students | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<style>
		.btns{
			background: #0198E1;
			border: none;
			border-radius:8px;
			font-size:17px;
			padding: 7px 7px;
			color:white;
			width: 207px;
		}
		.btns:hover{
			background: #236B8E;
		}
		.fa-cloud-download-alt{
			margin-right: 8px;
		}
		table{
			margin-top: 35px;
		}
		.student-table .head{
			font-weight: bold;
			font-size: 13px;
			color: white;
			background-color:#546e7a;
		}
		.head td{
			padding: 10px 10px;
		}
		.student-table .content{
			font-size: 12px;
		}
    	.reg:hover{
    		background: crimson;
    	}
		.reg i{
			margin-right:5px;
		}
	</style>

</head>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Students' List</h4>

			<div class="count1">
				<label for="count">No. of registered students: </label>
				<input type="number" id="count" align="right" name="count" value="<?php echo $IDcount['num']; ?>" disabled>
			</div>

			<div class="add-new">
				<a class="reg" href="registerstudent.php"><i class="fas fa-user-plus"></i>Register New Student</a>
			</div>
			
			
		</div>

		<form method="post">
			<div class="search">
				<input type="text" name="search" placeholder="Search here.">
				<button class="search" name="submit1"><i class="fas fa-search"></i></button>

			<?php
			if(isset($_REQUEST['submit1'])){
				$var = $_POST['search'];

				$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_strands as t2 on t1.strands_name = t2.strands_name WHERE t1.stud_name LIKE '%$var%' or t1.student_address LIKE '%$var%' or t1.stud_lrn = '$var' or t1.stud_lrn = '$var' or t1.sex = '$var' or t1.student_status = '$var' or t1.student_address LIKE '%$var%' or t2.strands_name = '$var'");
			}
			?>
			
			</div>
		</form>
		
			<div class="table">
				
				<table class="student-table" id="example">
					
				
					<tr>
						<td colspan="2">
							<form method="post" action="excel.php">
								<button name="export" class="btns">
									<i class="fas fa-cloud-download-alt"></i>Download CSV File
								</button> 
							</form>	 
						</td>
						<td colspan="7">

						<form method="post" class="body">
							<div class="buttons">
								
								<label for="filter">Filter</label>
								<select name="section_name" id="filter">
								<option selected>See all</option>
								<?php
									$sec = mysqli_query($conn, "SELECT * FROM tbl_section WHERE section_ID > 0");
									while($list = mysqli_fetch_assoc($sec)){
								?>
								<option><?php echo $list['section_name']; ?></option>
								<?php } 
								?>
								<input type="submit" name="submit" value="Search">
								<?php
									if(isset($_POST['submit'])){
										$var = $_POST['section_name'];
										
										if($var == 'See all'){
											$sql = mysqli_query($conn, "SELECT * FROM tbl_student");
										}
										else{
											$sql = mysqli_query($conn, "SELECT * FROM tbl_student WHERE section_name = '$var'");
										}
									}
								?>
							</select>
							</div>
						</td>
					</tr>
					
					<tr class="head">
						<td align="left">Student Name</td>
						<td align="center">LRN</td>
						<td align="left">Email Address</td>
						<td>Sex</td>
						<td align="left">Address</td>
						<td align="center">Section</td>
						<td align="center">Status</td>
						<td align="center">School Year</td>
						<td align="center">Action</td>
					</tr>

			<?php
				while($list = mysqli_fetch_assoc($sql)){				
			?>

				<tr class="content">
						<td align="left"><?php echo $list['stud_lastname'] .', ' .$list['stud_firstname'] .' ' .$list['stud_middleinitial']; ?></td>
						<td align="center"><?php echo $list['stud_lrn']; ?></td>
						<td align="left"><?php echo $list['email_address']; ?></td>
						<td><?php echo $list['sex']; ?></td>
						<td align="left"><?php echo $list['student_address']; ?></td>
						<td align="center"><?php echo $list['section_name']; ?></td>
						<td align="center"><?php echo $list['student_status']; ?></td>
						<td align="center"><?php echo $list['schoolyear']; ?></td>
						<td align="center">
							<div class="action">
								<button class="submit"><a href="viewstudent.php?sid=<?php echo $list['stud_ID']; ?>">View Data</a></button>
								<button class="view"><a href="updateStudPassword.php?sid=<?php echo $list['stud_ID']; ?>">Update Account</a></button>
								<button class="grades"><a href="studentgrades.php?sid=<?php echo $list['stud_ID']; ?>">View Grades</a></button>
							</div>
						</td>
				</tr>
				</form>
			<?php } 
			?>

		
				


				</table>
			</div>

	</div>

		</form>
		
		<?php include 'scroll-up.php' ?>
	</div>

</body>
</html>