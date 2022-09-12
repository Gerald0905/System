<?php
	include("../dbconnect.php");

	$trackMax = mysqli_query($conn, "SELECT max(track_ID) as max FROM tbl_tracks");
	$trackResult = mysqli_fetch_assoc($trackMax);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adding New Track</title>
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
		input[type='text']{
			width: 300px;
			padding: .3rem .5rem;
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
		include('navbar.php');
	?>
	<div class="container">
		<div class="header">
			<h4>Add New Track</h4>
		</div>

		<div class="body">
			<form method="post">
				<table>
					<tr>
						<td>Track Description</td>
						<td>
							<input type="hidden" name="track_id" value="<?php echo $trackResult['max'] + 1; ?>">
							<input type="text" name="track_name" placeholder="eg. Academic" required>
						</td>
					</tr>
					<tr>
						<td>Track Name</td>
						<td>
							<input type="text" name="track_desc" placeholder="eg. Academic Track" required>
						</td>
					</tr>
				</table>
				<div class="footer-links">
					<div class="back-btn">
						<a href="curriculumpage.php">Back</a>
					</div>
					<div class="update-btn">
						<input type="submit" class="update-btn" name="Register" value="Register" id="update">
					</div>
					<?php 
						if (isset($_POST['Register'])) {
							$track_id = $_POST['track_id'];
							$track_desc = $_POST['track_desc'];
							$track_name = $_POST['track_name'];

							$trackInsertQry = mysqli_query($conn, "INSERT INTO tbl_tracks VALUES('$track_id', '$track_name', '$track_desc')");

							if ($trackInsertQry) {	?>
								<script type="text/javascript">
									alert("You have successfully added a new track.");
									window.location = "curriculumpage.php";
								</script>	<?php
							}
						}
					?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>