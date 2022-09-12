<?php
include("../dbconnect.php");

$strid = $_GET['strid'];
$strand = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strands_ID = '$strid'");

if ($strid == '1') {
	$sql = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE yearlevel = 'GRADE 11' AND strands_ID = 1 ORDER BY subject_ID ASC");
}
elseif ($strid == '2') {
	$sql = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE yearlevel = 'GRADE 11' AND strands_ID = 2 ORDER BY subject_ID ASC");
}
elseif ($strid == '3') {
	$sql = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE yearlevel = 'GRADE 11' AND strands_ID = 3 ORDER BY subject_ID ASC");
}
elseif ($strid == '4') {
	$sql = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE yearlevel = 'GRADE 11' AND strands_ID = 4 ORDER BY subject_ID ASC");
}
elseif ($strid == '5') {
	$sql = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE yearlevel = 'GRADE 11' AND strands_ID = 5 ORDER BY subject_ID ASC");
}
elseif ($strid == '6') {
	$sql = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE yearlevel = 'GRADE 11' AND strands_ID = 6 ORDER BY subject_ID ASC");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Grade 11 - Subjects | System Admin</title>
	<script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/add.css">
	<link rel="stylesheet" type="text/css" href="css/table_design.css">
	<link rel="stylesheet" type="text/css" href="css/mediascreen.css">
</head>
<style>
	.button{
		margin:20px;
		border-radius:5px;
		padding:5px;
		background-color: grey;
		color:white;
	}
	.button a{
		color:white;
	}
</style>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<?php
				while($list = mysqli_fetch_assoc($strand)){				
			?>
			<h4><?php echo $list['strands_desc']; ?> Strand</h4>
			<?php 
				} 
			?>
		</div>

		<form method="post">
			<table>
				<tr>
					<td colspan="4" align="right">
						<div class="buttons">
							<select name="filter" id="filter">
								<option selected>See all</option>
								<option>Core Subject</option>
								<option>Applied Subject</option>
								<option>Specialized Subject</option>
								<input type="submit" name="search" value="Search">
								<?php
									if (isset($_POST['search'])) {
										$var = $_POST['filter'];

										if ($var == 'Core Subject' AND $strid == '1') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_abmsubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Core' ORDER BY subject_ID ASC");
										}
										if ($var == 'Applied Subject' AND $strid == '1') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_abmsubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Applied' ORDER BY subject_ID ASC");
										}
										if ($var == 'Specialized Subject' AND $strid == '1') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_abmsubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Specialized' ORDER BY subject_ID ASC");
										}

										if ($var == 'Core Subject' AND $strid == '2') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_humsssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Core' ORDER BY subject_ID ASC");
										}
										if ($var == 'Applied Subject' AND $strid == '2') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_humsssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Applied' ORDER BY subject_ID ASC");
										}
										if ($var == 'Specialized Subject' AND $strid == '2') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_humsssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Specialized' ORDER BY subject_ID ASC");
										}

										if ($var == 'Core Subject' AND $strid == '3') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_gassubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Core' ORDER BY subject_ID ASC");
										}
										if ($var == 'Applied Subject' AND $strid == '3') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_gassubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Applied' ORDER BY subject_ID ASC");
										}
										if ($var == 'Specialized Subject' AND $strid == '3') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_gassubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Specialized' ORDER BY subject_ID ASC");
										}

										if ($var == 'Core Subject' AND $strid == '4') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_csssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Core' ORDER BY subject_ID ASC");
										}
										if ($var == 'Applied Subject' AND $strid == '4') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_csssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Applied' ORDER BY subject_ID ASC");
										}
										if ($var == 'Specialized Subject' AND $strid == '4') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_csssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Specialized' ORDER BY subject_ID ASC");
										}

										if ($var == 'Core Subject' AND $strid == '5') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_ccssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Core' ORDER BY subject_ID ASC");
										}
										if ($var == 'Applied Subject' AND $strid == '5') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_ccssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Applied' ORDER BY subject_ID ASC");
										}
										if ($var == 'Specialized Subject' AND $strid == '5') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_technicaldraftingsubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Specialized' ORDER BY subject_ID ASC");
										}

										if ($var == 'Core Subject' AND $strid == '6') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_technicaldraftingsubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Core' ORDER BY subject_ID ASC");
										}
										if ($var == 'Applied Subject' AND $strid == '6') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_ccssubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Applied' ORDER BY subject_ID ASC");
										}
										if ($var == 'Specialized Subject' AND $strid == '6') {
											$sql = mysqli_query($conn, "SELECT * FROM tbl_technicaldraftingsubjects WHERE yearlevel = 'GRADE 11' AND subject_type = 'Specialized' ORDER BY subject_ID ASC");
										}

									}
								?>
							</select>
						</div>
						</td>
					</tr>
				<tr>
					<td class="head">Grade 11 | Subject Name</td>
					<td class="head">Type</td>
					<td class="head">Semester</td>
				</tr>
				<?php
					while($list1 = mysqli_fetch_assoc($sql)){	
				?>
				<tr class="content">
					<td>
						<i class="fas fa-angle-right"></i> <?php echo $list1['subject_name']; ?>
					</td>
					<td>
						<?php echo $list1['subject_type']; ?>
					</td>
					<td>
						<?php echo $list1['semester']; ?>
					</td>

				<?php 
					} 
				?>
				</tr>
			</table>
		</form>

		<button class="button">
			<a href="curriculumpage.php">Go back</a>	
		</button>
	</div>
</body>
</html>