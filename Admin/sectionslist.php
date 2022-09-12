<?php
	include("../dbconnect.php");
	$sql = mysqli_query($conn, "SELECT * FROM tbl_section WHERE section_ID > 0 ORDER BY section_ID ASC");

	$sql1 = mysqli_query($conn, "SELECT COUNT(*) AS num FROM tbl_section WHERE section_ID > 0");
	$IDcount = mysqli_fetch_assoc($sql1);

	$max = mysqli_query($conn, "SELECT MAX(section_ID) as max FROM tbl_section WHERE section_ID > 0");
	$num = mysqli_fetch_assoc($max);

?>

<!DOCTYPE html>
<html>
<head>
	<title>List of Sections | System Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		
		.count{
			margin: 40px 10px;
		}
		.count label{
			font-size: 12px;
		}
		.count input[type='number']{
			width: 50px;
			padding: 2px 2px;
			text-align: right;
			background: white;
			font-weight: bold;
		}
		.count input[type='number']:hover{
			color: #002366;
			border-color: #002366;
			transition: .4s ease;
		}
		
		table{
			width: 100%;
			
		}
		table td{
			padding: 5px 20px;
		}
		
		form .add-new{
			font-size: 13px;
			text-decoration: none;
			color: #002366;
			margin-left: -12px;
		}
		form .add-new input{
			padding: 10px 10px;
			color: #002366;
			width: 220px;
			border-radius: 25px;
			border: 1px solid gray;
		}
		form .add-new input:focus{
			transition: .4s ease;
			width: 250px;
		}
		form .add-new .btn{
			text-decoration: none;
			border: none;
			margin-left: 10px;
			background: none;
			cursor: pointer;
		}
		.head{
			padding: .8rem 1rem;
		}
		form .add-new .btn:hover{
			color: red;
			font-weight: bold;
		}
		.action button{
			display: inline-flex;
			border: none;
		}
		.action .delete a{
			padding: 8px 8px;
			background: red;
			border-radius: 10px;
			color: white;
			transition: .3s ease;
		}
		.action .view a{
			padding: 8px 8px;
			background: green;
			border-radius: 10px;
			color: white;
			transition: .3s ease;
		}
		
	</style>

<body>
	<?php
		include('navbar.php')
	?>

	<div class="container">
		<div class="header">
			<h4>Sections' List</h4>

		</div>
		<div class="count">
			<label for="count">No. of available sections: </label>
			<input type="number" id="count" name="count" value="<?php echo $IDcount['num']; ?>" disabled>
		</div>

		<form method="post">
			<table class="table">
				<tr>
					<td colspan="3">
						<div class="add-new">
							<input type="hidden" name="section_ID" value="<?php echo $num['max'] + 1; ?>">
							<input type="text" name="section_name" placeholder="Insert new section with this panel.">
							<button class="btn" name="submit">Add</button>
							<?php
								if(isset($_POST['submit'])){
									$section_name = $_POST['section_name'];
									$section_ID = $_POST['section_ID'];

									$add = mysqli_query($conn, "INSERT INTO tbl_section VALUES('$section_ID','$section_name')");
									if($add){	?>
										<script type="text/javascript">
											alert("You have inserted a new section.");
											window.location = "sectionslist.php";
										</script>	<?php
									}
								}
							?>
						</div>
					</td>
				</tr>
				<tr>
					<td class="head">Section</td>
					<td class="head" align="right">Action</td>
				</tr>
				<?php
					while($list = mysqli_fetch_assoc($sql)){				
				?>
				<tr class="content">
					<td><?php echo $list['section_name']; ?></td>
					<td align="right">
					<div class="action">
						<button class="view"><a href="sectionStudents.php?secname=<?php echo $list['section_name']; ?>">View Students</a></button>
						<button class="delete"><a href="deletesection.php?secid=<?php echo $list['section_ID']; ?>">Delete</a></button>
					</div>
					</td>
				</tr>
				<?php 
					} 
				?>
			</table>
		</form>
	</div>

</body>
</html>