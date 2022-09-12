<?php 
    include('../dbconnect.php');

    $sem_id = $_GET['semid'];
    $semQry = mysqli_query($conn, "SELECT * FROM tbl_semester WHERE sem_ID = '$sem_id'");
    $semQryResult = mysqli_fetch_assoc($semQry);

    $semQry1 = mysqli_query($conn, "SELECT * FROM tbl_semester");

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
			<h4>Updating School Semester</h4>
		</div>

		<div class="body">
			<form method="post">
				<table>
					<tr>
						<td  class="date">Semester</td>
						<td>
							<select name="sem_desc" id="">
                                <option hidden><?php echo $semQryResult['sem_desc']; ?></option>
                                <?php
                                while($semResultQry = mysqli_fetch_assoc($semQry1)){    ?>
                                <option><?php echo $semResultQry['sem_desc']; ?></option>
                                <?php }
                                ?>
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
								$sem_desc = $_POST['sem_desc'];

                                $updateQry = mysqli_query($conn, "UPDATE tbl_semester SET sem_status = 'Active' WHERE sem_desc = '$sem_desc'");
                                $updateQry1 = mysqli_query($conn, "UPDATE tbl_semester SET sem_status = 'Inactive' WHERE sem_desc != '$sem_desc'");

                                if($updateQry and $updateQry1){ ?>
                                    <script>
                                        alert("Active semester has been updated.");
                                        window.location = "admindashboard.php";
                                    </script>   <?php
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