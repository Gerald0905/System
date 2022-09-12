<?php
include("../dbconnect.php");

$esid = $_GET['esid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.es_ID = '$esid'");
$rec = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Grading Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/grade.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/add_grade.css">
	<link rel="stylesheet" type="text/css" href="css/add.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
    <style type="text/css">
    	table{
    		border-collapse: collapse;
    		border-bottom: 1px solid gray;
    	}
    	.footer{
    		font-size: 14px;
    	}
    </style>
</head>
<body>
<?php
		include('nav.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Assigning Grade</h4>
			<br><br>
		</div>

		<div class="content">
			<form method="post">
				<table>
					<tr>
						<td class="head" align="left">Student Name</td>
						<td class="head" align="center">Subject Name</td>
						<td class="head" align="center">Grade Level</td>
						<td class="head" align="center">First Grading Mark</td>
						<td class="head" align="center">Action</td>
					</tr>
					<tr>
						<td align="left"><?php echo $rec['stud_firstname']. '    ' .$rec['stud_middleinitial'] . '.  ' .$rec['stud_lastname']; ?></td>
						<td align="center"><?php echo $rec['subject_name']; ?></td>
						<td align="center"><?php echo $rec['yearlevel']; ?></td>

						<input type="hidden" name="es_ID" value="<?php echo $rec['es_ID']; ?>">
						<td align="center"> 
							<input type="number"  id="grade" name="grade" min="60" max="100" placeholder="Enter grade here...">

						
						</td>
						<td align="center">
							<button id="submit" disabled class="btn" name="submit">Save</button>
							<?php
								if (isset($_POST['submit'])) {
									$grade = $_POST['grade'];
									$es_ID = $_POST['es_ID'];

									$insertGrade = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET first_grade = '$grade' WHERE es_ID = '$es_ID'");

									if($insertGrade){	?>
										<script type="text/javascript">
											alert("You have uploaded a grade for <?php echo $rec['stud_firstname'] .' ' .$rec['stud_lastname']; ?> with his subject - <?php echo $rec['subject_name']; ?> - with a mark of <?php echo $grade; ?>.");
											window.location = "addinggrades.php?esid=<?php echo $rec['es_ID']; ?>";
										</script>	

										<?php
									}
								}
							?>
						</td>
					</tr>
				</table>
				<div class="footer">
					<a href="addinggrades.php?esid=<?php echo $rec['es_ID']; ?>"><i class="fas fa-chevron-circle-left"></i>Go back</a>
				</div>

			
			</form>
			<script src="grade.js"></script>
		</div>
	</div>
</body>
</html>