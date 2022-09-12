<?php
	include("../dbconnect.php");

	$track_ID = $_GET['track_id'];
	$strandsQry = mysqli_query($conn, "SELECT * FROM tbl_strands as t1 inner join tbl_tracks as t2 on t1.track_ID = t2.track_ID WHERE t2.track_ID = '$track_ID' AND t1.strands_ID != 0");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Track and Strands | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<style type="text/css">
		.table{
			font-size: .9rem;
			margin-top: 3rem;
		}
		.table-header{
			font-weight: bold;
		}
		td{
			padding: 10px 2px;
		}
		td .action{
			margin-right: -10px;
		}
		
		form .head{
			font-weight: bolder;
			font-size: .8rem;
			color: white;
			text-indent: 15px;
			margin-top:20px;
		}
		.header{
			text-transform: uppercase;
			font-size: 1.1rem;
		}
		.content{
			font-size: 14px;
		}
		.content i{
			margin-top: 10px;
			margin-left: 15px;
			margin-right: 8px;
		}
		.action button{
			text-decoration: none;
			border: none;
			border-radius: 10px;
		}
		.action .submit a{
			padding: 8px 8px;
			background: orange;
			border-radius: 10px;
			color: white;
			transition: .3s ease;
		}
		.action .submit1 a{
			padding: 8px 8px;
			background: green;
			border-radius: 10px;
			color: white;
			transition: .3s ease;
		}
		.head1{
			font-size: .9rem;
			font-style: italic;
			text-indent: 10px;
			display: flex;
			background-color: #F3FFE3;
			width: 100%;
		}
		ion-icon{
			margin-left: 1.2rem;
		}
		.add-new{
			margin-bottom: 2rem;
		}
		.reg i{
			margin-right:5px;
		}
		.back{
			text-decoration: none;
			float: left;
			margin-bottom: 20px;
			margin-top: 20px;
			padding: 10px;		
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
	</style>
</head>
<body>
	<?php
		include('navbar.php')
	?>

	<div class="container">
		<div class="header">
			<h4>Strands Available</h4>
		</div>

		<div class="add-new">
			<a class="reg" href="addnewstrand.php"><i class="fas fa-user-plus"></i>Add New Strand</a>
		</div>

		<form method="post">
			<div class="table">
				<table class="student-table">
					<tr class="head">
						<td>
							Strand Name
						</td>
						<td>
							Strand Description
						</td>
						<td>
							Track
						</td>
						<td align="center">
							Action
						</td>
					</tr>
					<?php 
					while ($strandQryResult = mysqli_fetch_assoc($strandsQry)) {	?>
					<tr>
						<td><?php echo $strandQryResult['strands_name']; ?></td>
						<td><?php echo $strandQryResult['strands_desc']; ?></td>
						<td><?php echo $strandQryResult['track_desc']; ?></td>
						<td align="center">
						<div class="action">
							<button class="submit"><a href="viewsubjects.php?strand_id=<?php echo $strandQryResult['strands_ID']; ?>">View Subjects</a></button>
						</div>
					</td>
					</tr>
					<?php }
					?>
				</table>
				<div class="footer-links">
					<div class="back-btn">
						<a href="curriculumpage.php">Back</a>
					</div>
				</div>
			</div>
		</form>

	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>