<?php
include("../dbconnect.php");

$esid = $_GET['esid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_lrn = t2.stud_lrn WHERE es_ID = '$esid'");
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
						<td align="left"><?php echo $rec['stud_name']; ?></td>
						<td align="center"><?php echo $rec['subject_name']; ?></td>
						<td align="center"><?php echo $rec['yearlevel']; ?></td>

						<input type="hidden" name="es_ID" value="<?php echo $rec['es_ID']; ?>">
						<input type="hidden" name="stud_ID" value="<?php echo $rec['stud_ID']; ?>">
						<input type="hidden" name="subject_name" value="<?php echo $rec['subject_name']; ?>">
						<input type="hidden" name="stud_lrn" value="<?php echo $rec['stud_lrn']; ?>">
						<input type="hidden" name="subject_type" value="<?php echo $rec['subject_type']; ?>">
						<input type="hidden" name="strands_ID" value="<?php echo $rec['strands_ID']; ?>">
						<input type="hidden" name="semester" value="<?php echo $rec['semester']; ?>">
						<input type="hidden" name="yearlevel" value="<?php echo $rec['yearlevel']; ?>">
						<td align="center"> 
							<input type="number"  id="grade" name="grade" min="60" max="100" placeholder="Enter grade here...">

						
						</td>
						<td align="center">
							<button disabled id="submit" class="btn" name="submit">Save</button>
							<?php
								if (isset($_POST['submit'])) {
									$grade = $_POST['grade'];
									$stud_lrn = $_POST['stud_lrn'];
									$stud_ID = $_POST['stud_ID'];
									$es_ID = $_POST['es_ID'];
									$subject_name = $_POST['subject_name'];

									$insertGrade = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET first_grade = '$grade' WHERE stud_ID = '$stud_ID' AND stud_lrn = '$stud_lrn' AND es_ID = '$es_ID'");

									if($insertGrade){	?>
										<script type="text/javascript">
											alert("You just have uploaded a grade for <?php echo $rec['stud_name']; ?> with his subject - <?php echo $subject_name; ?> with a mark of <?php echo $grade; ?>.");
											window.location = "addinggrades4.php?sid=<?php echo $rec['stud_ID']; ?>";
										</script>	

										<?php
									}
								}
							?>
						</td>
					</tr>
				</table>
				<div class="footer">
					<a href="addinggrades4.php?sid=<?php echo $rec['stud_ID']; ?>"><i class="fas fa-chevron-circle-left"></i>Go back</a>
				</div>
			</form>
			<script src="grade.js"></script>
		</div>
	</div>
</body>
</html>