<?php
	include("../dbconnect.php");

	$schoolyear_id = $_GET['syid'];
	$syQry = mysqli_query($conn, "SELECT * FROM tbl_schoolyear WHERE schoolyear_id = '$schoolyear_id'");
	$syResult = mysqli_fetch_assoc($syQry);

	$syQryAll = mysqli_query($conn, "SELECT * FROM tbl_schoolyear ORDER BY schoolyear_id ASC");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>School Year Page</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<style type="text/css">
		.container table{
			font-size: .9rem;
		}
		.status{
			padding: .2rem .3rem;
			color: #fff;
			border: none;
			border-radius: 10px;
			background-color: #FF6962;
		}
		.status-sy{
			width: 4rem;
			text-align: center;
		}
		.footer-links{
			display: flex;
			justify-content: space-between;
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
			cursor: pointer;		
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
		i{
			padding-right: 6px;
		}
		.add-new{
			margin-bottom: 2rem;
		}
	</style>
</head>
<body>
	<?php
		include('navbar.php');
	?>
	<div class="container">
		<div class="header">
			<h4>School Year Page</h4>
		</div>

		<div class="add-new">
			<a class="reg" href="addschoolyear.php"><i class="fas fa-user-plus"></i>Add New School Year</a>
		</div>

		<div class="table">
			<form method="post">
				<table>
					<tr>
						<td>Current Active School Year</td>
						<td class="first_half">
							<select name="schoolyear">
								<option hidden><?php echo $syResult['schoolyear_desc']; ?></option>
								<?php 
								while ($syResultAll = mysqli_fetch_assoc($syQryAll)) {	?>
									<option><?php echo $syResultAll['schoolyear_desc']; ?></option>	<?php
								}
								?>
							</select>
						</td>
					</tr>				
				</table>
		</div>
		<div class="footer-links">
			<div class="back-btn">
				<a href="admindashboard.php">Back</a>
			</div>
			<div class="update-btn">
				<input type="submit" class="update-btn" name="update" value="Update" id="update">
			</div>
		</form>
			<?php 
				if (isset($_REQUEST['update'])) {
					$sy = $_POST['schoolyear'];

					$syUpdateQry = mysqli_query($conn, "UPDATE tbl_schoolyear SET schoolyear_status = 'Active' WHERE schoolyear_desc = '$sy'");

					$syUpdateQry1 = mysqli_query($conn, "UPDATE tbl_schoolyear SET schoolyear_status = 'Inactive' WHERE schoolyear_desc != '$sy'");

					if($syUpdateQry){	?>
						<script type="text/javascript">
							alert("You have updated the current active school year.");
							window.location = "admindashboard.php";
						</script>	<?php 
					}
				}
			?>
		</div>
	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>