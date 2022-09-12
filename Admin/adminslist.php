<?php
include("../dbconnect.php");

$sql = mysqli_query($conn, "SELECT * FROM tbl_adminaccount");
$sql1 = mysqli_query($conn, "SELECT COUNT(*) AS num FROM tbl_adminaccount");
$IDcount = mysqli_fetch_assoc($sql1);

?>

<!DOCTYPE html>
<html>
<head>
	<title>List of System Admin | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
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
		.add-new .reg{
    		
    	}
    	.reg:hover{
    		background: crimson;
    	}
    	.fas{
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
			<h4>System Administrators</h4>

			<div class="count1">
				<label for="count">No. of registered Admins: </label>
				<input type="number" id="count" align="right" name="count" value="<?php echo $IDcount['num']; ?>" disabled><br>
			</div>

			<div class="add-new">
				<a href="registeradmin.php"><i class="fas fa-user-plus"></i>Register New Admin</a>
			</div>
		</div>

			<form method="post">
				<div class="search">
					<input type="text" name="search" placeholder="Search here.">
					<button class="search" name="submit123"><i class="fas fa-search"></i></button>

					<?php
						if(isset($_REQUEST['submit123'])){
							$var = $_POST['search'];

							$sql = mysqli_query($conn,"SELECT * FROM tbl_adminaccount WHERE admin_username LIKE '%$var%' or admin_name LIKE '%$var%'");
						}
					?>
				</div>

				<div class="table">
					<table class="admin-table">
						<tr>
							<td colspan="6">
								<div class="buttons">

								<label for="button">Filter</label>
								<select name="admin_status" id="filter">
								<option selected>See all</option>
								<option>Active</option>
								<option>Inactive</option>
								<input type="submit" name="submit" value="Search">
								<?php
									if(isset($_POST['submit'])){
										$var = $_POST['admin_status'];
										
										if($var == 'See all'){
											$sql = mysqli_query($conn, "SELECT * FROM tbl_adminaccount");
										}
										else{
											$sql = mysqli_query($conn, "SELECT * FROM tbl_adminaccount WHERE admin_status = '$var'");
										}
									}
								?>
								</select>
								</div>
							</td>
						</tr>
						<tr class="head">
							<td align="left">Administrator ID</td>
							<td align="left">Name</td>
							<td>Email Address</td>
							<td>Status</td>
							<td>Admin Username</td>
							<td align="center">Action</td>
						</tr>
						<?php
							while($list = mysqli_fetch_assoc($sql)){				
						?>

						<tr class="content">
							<td align="left">
								<?php echo $list['adminaccount_ID']; ?>
							</td>
							<td align="left">
								<?php echo $list['admin_name']; ?>
							</td>
							<td>
								<?php echo $list['admin_email_address']; ?>
							</td>
							<td>
								<?php echo $list['admin_status']; ?>
							</td>
							<td>
								<?php echo $list['admin_username']; ?>
							</td>
							<td align="center">
								<div class="action">
									<button class="submit"><a href="updateAdminAccount.php?aid=<?php echo $list['adminaccount_ID']; ?>">Edit</a></button>
									
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