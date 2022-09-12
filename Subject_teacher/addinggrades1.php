<?php
include("../dbconnect.php");

$esid = $_GET['esid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_yearlevel as t2 on t1.yearlevel_name = t2.yearlevel_name inner join tbl_enrolledsubjects as t3 on t1.stud_lrn = t3.stud_lrn WHERE t3.es_ID = '$esid'");
$subjectsQryRec = mysqli_fetch_assoc($sql);
$sql3 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_yearlevel as t2 on t1.yearlevel_name = t2.yearlevel_name inner join tbl_enrolledsubjects as t3 on t1.stud_lrn = t3.stud_lrn WHERE t3.es_ID = '$esid'");

$sql2 = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE es_ID = '$esid'");

$sql4 = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE es_ID = '$esid'");
$sql4Result = mysqli_fetch_assoc($sql4);
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Student | Teacher</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/grade.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/add_grade.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
    <style type="text/css">
    	table{
    		border-collapse: collapse;
    		border-bottom: 2px solid black;
    	}
    	.head{
    		background: gray;
    		color: white;
    	}
    	.back{
			font-size: 15px;
		}
		.secQuarter{
			float: right;
			font-size: 15px;
		}
		.filter td{
			font-weight: bold;
		}

    </style>
</head>
<body>
	<?php
		include('nav_grade.php')
	?>
	<?php 
	if($sql4Result['first_grade'] == 0){	?>
		<script>
			alert("You have not uploaded any grades on this subject.");
			window.location = "addinggrades.php?esid=<?php echo $sql4Result['es_ID']; ?>";
		</script>
	<?php }
	elseif($sql4Result['first_grade']){		?>
		<div class="container">
		<form method="post">
			<div class="header">
				<h4><?php echo $subjectsQryRec['yearlevel'] .' | ' .$subjectsQryRec['semester']; ?> Semester</h4><hr>
			</div>
			<div class="content">
				<table>
					<?php
						while($list = mysqli_fetch_assoc($sql3)){
					?>
					<tr>
						<td><b>STUDENT NAME</b></td>
						<td colspan="2" align="center"><b>LEARNER'S REFERENCE NUMBER</b></td>
						<td align="center" colspan="2"><b>EMAIL ADDRESS</b></td>
						<td align="center"><b>GRADE LEVEL</b></td>
						<td align="center"><b>CLASS SECTION</b></td>	
					</tr>
					<tr>
						<td>
							<?php echo $list['stud_firstname']. '    '. $list['stud_middleinitial'] . '.  '. $list['stud_lastname'];?>
						</td>
						<td colspan="2" align="center">
							<?php echo $list['stud_lrn']; ?>
						</td>
						<td colspan="2" align="center">
							<?php echo $list['email_address']; ?>
						</td>
						<td align="center">
							<?php echo $list['yearlevel_name']; ?>
						</td>
						<td align="center">
							<?php echo $list['section_name']; ?>
						</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					
					<?php } 
					?>
					<tr>
						<td class="head" colspan="2" align="left">Subject Name</td>
						<td class="head">Type</td>
						<td class="head" align="center">Semester</td>
						<td class="head" align="center">Second Quarter Grade</td>
						<td class="head" align="center">Action</td>
						<td class="head" align="center">Remarks</td>
					</tr>
					<?php
						while($list1 = mysqli_fetch_assoc($sql2)){
							
					?>
					<tr class="content1">
						<td colspan="2">
							<?php echo $list1['subject_name']; ?>
							<input type="hidden" name="subject_name" readonly value="<?php echo $list1['subject_name']; ?>">
						</td>
						<td>
							<?php echo $list1['subject_type']; ?>
							<input type="hidden" name="subject_type" readonly value="<?php echo $list1['subject_type']; ?>">
						</td>
						<td align="center">
							<?php echo$list1['semester']; ?>
							<input type="hidden" name="semester" value="<?php echo$list1['semester']; ?>">
						</td>
						<td align="center">
							<?php echo $list1['second_grade']; ?>
							<input type="hidden" class="lrn" name="second_grade" readonly value="<?php echo $list1['second_grade']; ?>">
						</td>
						<td align="center">
							<div class="btn3">
								<?php 
									if( $list1['second_grade']){
										echo "GRADED";
									}
									else {	?>
										<div class="btn3-add">
											<a  id="add" href="add1.php?esid=<?php echo $list1['es_ID']; ?>">Add Grade</a>
										<div>
									<?php }	
								?>

							</div>
						</td>
						<td align="center">
							<?php
								if($list1['second_grade'] == 0){
									echo "Not yet Graded";
								}
								elseif($list1['second_grade'] < 75){
									echo "Failed";
								}
								else{
									echo "Passed";
								}
							?>
						</td>

					<?php } 
					
					?>
						
					</tr>

				</table>
			</div>

			<div class="footer">
			<a class="back" href="teacheradvisees.php"><i class="fas fa-chevron-circle-left"></i>Go back</a>	
			<a class="secQuarter" href="addinggrades.php?esid=<?php echo $subjectsQryRec['es_ID']; ?>">First Quarter<i class="fas fa-chevron-circle-right"></i></a>
		</div>
			
		</form>
		<?php include 'scroll-up.php' ?>
	</div>
	<?php }
	?>
</body>
</html>