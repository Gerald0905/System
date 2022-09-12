<?php
	include("../dbconnect.php");

	$trackQry = mysqli_query($conn, "SELECT * FROM tbl_tracks WHERE track_ID != 0");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Track | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<style type="text/css">
		.body{
			font-size: .9rem;
			margin-top: 3rem;
		}
		.table-header{
			font-weight: bold;
		}
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
		.table-content{
			font-size: .9rem;
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
			<h4>Tracks Available</h4>
		</div>

		<div class="add-new">
			<a class="reg" href="addnewtrack.php"><i class="fas fa-user-plus"></i>Add New Track</a>
			<a class="reg" href="addnewstrand.php"><i class="fas fa-user-plus"></i>Add New Strand</a>
		</div>

		<div class="table">
			<table class="student-table">
				<tr class="head">
					<td>Track Name</td>
					<td>Track Description</td>
					<td align="center">Action</td>
				</tr>
				<?php
				while ($trackQryResult = mysqli_fetch_assoc($trackQry)) {	
				?>
				<tr class="table-content">
					<td><?php echo $trackQryResult['track_name']; ?></td>
					<td><?php echo $trackQryResult['track_desc']; ?></td>
					<td align="center">
						<div class="action">
							<button class="submit"><a href="viewstrands.php?track_id=<?php echo $trackQryResult['track_ID']; ?>">View Strands</a></button>
						</div>
					</td>
				</tr>
				<?php }
				?>
			</table>
		</div>

		
	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>