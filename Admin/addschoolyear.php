<?php
	include("../dbconnect.php");

	$syMax = mysqli_query($conn, "SELECT max(schoolyear_id) as max FROM tbl_schoolyear");
	$syMaxResult = mysqli_fetch_assoc($syMax);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adding New School Year</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<style type="text/css">
		.container{
			font-size: .9rem;
		}
		.date{
			display: flex;
		}
		ion-icon{
			font-size: .9rem;
			padding-left: 5px;
		}
		input{
			width: 300px;
			padding: .3rem .3rem;
		}
		select{
			padding: .3rem .3rem;
			width: 314px;
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
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Register New School Year</h4>
		</div>

		<div class="body">
			<form method="post">
				<table>
					<tr>
						<td  class="date">School Year<ion-icon name="calendar-outline"></ion-icon></td>
						<td>
							<input type="hidden" name="sy_idd" value="<?php echo $syMaxResult['max'] + 1; ?>">
							<input type="text" name="sy_desc" placeholder="Format: 2012-2013" required>
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<select name="sy_status">
								<option>Active</option>
								<option>Inactive</option>
							</select>
						</td>
					</tr>
				</table>
				<div class="footer-links">
					<div class="back-btn">
						<a href="admindashboard.php">Back</a>
					</div>
					<div class="update-btn">
						<input type="submit" class="update-btn" name="Register" value="Update" id="update">

						<?php 
							if (isset($_POST['Register'])) {
								$sy_desc = $_POST['sy_desc'];
								$sy_status = $_POST['sy_status'];
								$sy_id = $_POST['sy_idd'];

								if ($sy_status == 'Active') {
									$syUpdateQry = mysqli_query($conn, "UPDATE tbl_schoolyear SET schoolyear_status = 'Inactive' WHERE schoolyear_status = 'Active'");

									$syInsertQry = mysqli_query($conn, "INSERT INTO tbl_schoolyear VALUES('$sy_id', '$sy_desc', '$sy_status')");
									if ($syUpdateQry AND $syInsertQry) {	?>
										<script type="text/javascript">
											alert("You have inserted a new school year with a status of <?php echo $sy_status; ?>.");
											window.location = "admindashboard.php";
										</script>	<?php 
									}
								}
								else{
									$syInsertQry = mysqli_query($conn, "INSERT INTO tbl_schoolyear VALUES('$sy_id', '$sy_desc', '$sy_status')");
									if ($syInsertQry) {	?>
										<script type="text/javascript">
											alert("You have inserted a new school year with a status of <?php echo $sy_status; ?>.");
											window.location = "admindashboard.php";
										</script>	<?php 
									}
								}
							}
						?>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>