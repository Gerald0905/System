<?php
include("../dbconnect.php");
$sql = mysqli_query($conn, "SELECT * FROM tbl_student"); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sample Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<style>
		*{
			padding: 0;
			margin: 0;
			font-family: sans-serif;
		}
		.container{
			padding: 5px 1px;
			text-decoration: none;
		}
		.left-sidebar{
			background: #cbdffa;
			flex-basis: 15%;
			position: sticky;
			top: 5px;
			align-self: flex-start;
		}
		.imp-links{
			padding: 10px 10px;
		}
		.imp-links ul{
			text-decoration: none;
		}
		.imp-links a{
			font-size: 15px;
			text-decoration: none;
			display: flex;
			margin-bottom: 25px;
			color: #002366;
			padding: 10px 5px;
			border-radius: 15px;
			border: none;
			width: 200px;
		}
		.imp-links a:hover{
			background: #002366;
			color: white;
			border-radius: 25px;
			transition: .3s;
			padding: 15px 12px;
		}
		.header h4{
			padding: 15px 15px;
			text-decoration: none;
			background-color: #002366;
			color: #ffffff;
		}
		li{
			text-decoration: none;
			list-style: none;
		}
		.header img{
			float: left;
			height: 40px;
			width: 0px auto;
			margin-top: 2px;
		}



	</style>
</head>
<body>

	<div class="container">
			<div class="header">
				<img class="logo" src="../Images/logo.png">
				<h4>STUDENT PORTAL | ADMIN</h4>
			</div>
			

				<div class="imp-links">
					<li>
						<ul>
							<a href="studentslist.php">Students' Page</a>
							<a href="teacherslist.php">Teachers' Page</a>
							<a href="adminslist.php">Web Masters</a>
							<a href="#">Sections' List</a>
							<a href="#">Curriculum</a>
							<a href="../logout.php">Logout</a>
						</ul>
					</li>
				</div>

	</div>

</body>
</html>