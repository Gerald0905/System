<?php
include("../dbconnect.php");
$sql = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_strands as t2 on t1.strands_name = t2.strands_name ORDER BY teacher_ID ASC"); 

$sql1 = mysqli_query($conn, "SELECT COUNT(*) AS num FROM tbl_subjectteacher");
$IDcount = mysqli_fetch_assoc($sql1);

$sql2 = mysqli_query($conn, "SELECT COUNT(*) AS num1 FROM tbl_subjectteacher as t1 inner join tbl_teacheraccount as t2 on t1.teacher_ID = t2.teacher_ID");
$IDcount1 = mysqli_fetch_assoc($sql2);

$sql3 = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_teacheraccount as t2 on t1.teacher_ID = t2.teacher_ID");

?>

<!DOCTYPE html>
<html>
<head>
	<title>List of Teachers | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<style>
		.search{
			margin-bottom: 20px;
		}
    	.reg:hover{
    		background: crimson;
    	}
		.reg i{
			margin-right:5px;
		}
		.teacher-list button{
			padding: .3rem .7rem;
			border: 1px solid transparent;
			background-color: #006ee6;
			border-radius: 10px;
			transition: .3s ease;
			line-height: 1.5;
			font-weight: 500;
		}
		.teacher-list button:hover{
			background-color: #0055b3;
		}
		.teacher-list button a{
			text-decoration: none;
			color: #fff;
		}
		.teacher-list i{
			margin-right: .3rem;
		}
        
	</style>

</head>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Subject Teachers' List</h4>

			<div class="count1">
				<label for="count">No. of registered teachers: </label>
				<input type="number" id="count" align="right" name="count" value="<?php echo $IDcount['num']; ?>" disabled>
                
			</div>

			<div class="add-new">
			<a class="reg" href="registersubteacher.php"><i class="fas fa-user-plus"></i>Register Subject Teacher</a>
			</div>
		</div>

		<form method="post">
			<div class="search">
				<input type="text" name="search" placeholder="Search here.">
				<button class="search" name="submit1"><i class="fas fa-search"></i></button>

			<?php
			if(isset($_REQUEST['submit1'])){
				$var = $_POST['search'];

				$sql = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_strands as t2 on t1.strands_name = t2.strands_name WHERE t1.teacher_lname LIKE '%$var%' OR t1.teacher_mname LIKE '%$var%' OR t1.teacher_fname LIKE '%$var%' OR t1.teacher_address LIKE '%$var%'");
			}
			?>
			</div>
				<div class="table">
					<table class="teacher-table">

 						<tr>
 							<td colspan="2">
 								<div class="teacher-list">
									<button>
										<a href="teacherslist.php">Adviser Teacher List</a>
									</button>
								</div>
 							</td>
 							<td colspan="9">
 								<div class="buttons">
								<label for="button">Filter</label>
								<select name="teacher_status" id="filter">
								<option selected>See all</option>
								<option>Active</option>
								<option>Inactive</option>
								<input type="submit" name="submit" value="Search">
								<?php
									if(isset($_POST['submit'])){
										$var = $_POST['teacher_status'];
										
										if($var == 'See all'){
											$sql = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_strands as t2 on t1.strands_name = t2.strands_name ORDER BY teacher_ID ASC");
										}
										else{
											$sql = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_strands as t2 on t1.strands_name = t2.strands_name WHERE teacher_status = '$var' ORDER BY teacher_ID ASC");
										}
									}
								?>
								</select>
								</div>
 							</td>
 						</tr>
						<tr class="head">
							<td align="left">Teacher Name</td>
							<td align="left">Email Address</td>
							<td>Sex</td>
							<td align="center">Contact Number</td>
							<td>Strand</td>
							<td>Subject Teaching</td>
							<td align="center">Status</td>
							<td align="center">Action</td>

						</tr>

						<?php
							while($list = mysqli_fetch_assoc($sql)){				
						?>

						<tr class="content">
							<td align="left"><?php echo $list['teacher_lname'].', '.$list['teacher_fname'].', '.$list['teacher_mname']; ?></td>
							<td align="left"><?php echo $list['teacher_email_address']; ?></td>
							<td><?php echo $list['teacher_sex']; ?></td>
							<td align="center"><?php echo $list['teacher_contact_number']; ?></td>
							<td><?php echo $list['strands_name'] ?></td>
							<td><?php echo $list['subject_teaching']; ?></td>
							<td align="center"><?php echo $list['teacher_status']; ?></td>
							<td align="center">
								<div class="action">
									<button class="submit"><a href="viewsubteacher.php?stid=<?php echo $list['teacher_ID']; ?>">View Data</a></button>
									<button class="view"><a href="updatesubTeacherPassword.php?stid=<?php echo $list['teacher_ID']; ?>">View Account</a></button>
								</div>
							</td>

						</tr>

						<?php 
						} 
						?>

					</table>
				</div>
		</form>
		<?php include 'scroll-up.php' ?>

	</div>

		

</body>
</html>