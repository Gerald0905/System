<?php
include("../dbconnect.php");

$sid = $_GET['sid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_yearlevel as t2 on t1.yearlevel_name = t2.yearlevel_name WHERE stud_ID = '$sid'");
$sql4 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_yearlevel as t2 on t1.yearlevel_name = t2.yearlevel_name WHERE stud_ID = '$sid'");
$data = mysqli_fetch_assoc($sql4);
$sql1 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_enrolledsubjects as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.stud_ID = '$sid' AND t2.yearlevel = 'GRADE 12' AND t2.semester = 'SECOND'");
$sql2 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_enrolledsubjects as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.stud_ID = '$sid' AND t2.yearlevel = 'GRADE 12' AND t2.semester = 'SECOND'");
$rec = mysqli_fetch_assoc($sql2);

$sql3 = mysqli_query($conn, "SELECT COUNT(*) as num FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND' AND first_grade != '0'");
$count = mysqli_fetch_assoc($sql3);

$total = 0;
$gpa = 0;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Grade 12 | Third Grading</title>
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
<body>
<?php
		include('nav_grade.php')
	?>
	<div class="container">
		<form method="post">
			<div class="header">
				<h4>Grade 12 | THIRD QUARTER</h4>
			</div><hr>
			<div class="content">
				<table>
					<?php
						while($list = mysqli_fetch_assoc($sql)){
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
							<?php echo $list['stud_name'];?>
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
					<tr class="filter">
					<td align="left" colspan="6">
							<label>You are here: </label>
							<a href="addinggrades.php?sid=<?php echo $list['stud_ID']; ?>" class="nonactive">Grade 11 - First Semester</a>
							<label> | </label>
							<a href="addinggrades2.php?sid=<?php echo $list['stud_ID']; ?>" class="nonactive">Grade 11 - Second Semester</a>
							<label> | </label>
							<a href="addinggrades4.php?sid=<?php echo $list['stud_ID']; ?>" class="nonactive">Grade 12 - First Semester</a>
							<label> | </label>
							<a href="" class="active">Grade 12 - Second Semester</a>
						</td>
					</tr>
					<?php } 
					?>
					<tr>
						<td class="head" align="left">Subject Name</td>
						<td class="head">Type</td>
						<td class="head" align="center">Yearlevel</td>
						<td class="head" align="center">Semester</td>
						<td class="head" align="center">Third Grading Mark</td>
						<td class="head" align="center">Action</td>
						<td class="head" align="center">Remarks</td>
					</tr>
					<?php
						while($list1 = mysqli_fetch_assoc($sql1)){
							$grades = $list1['first_grade'];
							$total += $grades;
					?>
					<tr class="content">
						<td>
							<?php echo $list1['subject_name']; ?>
							<input type="hidden" name="subject_name" readonly value="<?php echo $list1['subject_name']; ?>">
						</td>
						<td>
							<?php echo $list1['subject_type']; ?>
							<input type="hidden" name="subject_type" readonly value="<?php echo $list1['subject_type']; ?>">
						</td>
						<td align="center">
							<?php echo$list1['yearlevel']; ?>
							<input type="hidden" name="yearlevel" value="<?php echo$list1['yearlevel']; ?>">
						</td>
						<td align="center">
							<?php echo$list1['semester']; ?>
							<input type="hidden" name="semester" value="<?php echo$list1['semester']; ?>">
						</td>
						<td align="center">
							<?php echo $list1['first_grade']; ?>
							<input type="hidden" class="lrn" name="first_grade" readonly value="<?php echo $list1['first_grade']; ?>">
						</td>
						<td align="center">
						<div class="btn3">
								<?php 
									if( $list1['first_grade']){
										echo "GRADED";
									}
									else {	?>
										<div class="btn3-add">
											<a  id="add" href="add6.php?esid=<?php echo $list1['es_ID']; ?>">Add Grade</a>
										<div>
									<?php }	
								?>

							</div>
						</td>
						<td align="center">
						<?php
								if($list1['first_grade'] == 0){
									echo "Not yet Graded";
								}
								elseif($list1['first_grade'] < 75){
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
					
					<tr>
						<td colspan="6" align="center">
							<button class="avg" name="calc">Generate GPA</button>
							<?php
								if(isset($_POST['calc'])){
									if ($count['num'] > 0) {
										$gpa = $total / $count['num'];
										$ggpa = number_format($gpa, 2);
									}
									else { ?>
										<script type="text/javascript">
											alert("The system detected that there are no grades available for <?php echo $data['stud_name'];?>. Please enter the needed data before generating the average. Thank you.");
											window.location = "addinggrades6.php?sid=<?php echo $rec['stud_ID']; ?>";
										</script>	<?php
									}
									
								}
							?>		
						</td>
					</tr>
					<tr>
						<td colspan="6" align="center">
							<input type="number" class="lrn" name="average" readonly value="<?php echo $ggpa; ?>">
						</td>
					</tr>
				</table>
			</div>

			<div class="footer">
			<a class="back" href="teacheradvisees.php"><i class="fas fa-chevron-circle-left"></i>Go back</a>	
			<a class="secQuarter" href="addinggrades7.php?sid=<?php echo $rec['stud_ID']; ?>">Fourth Quarter<i class="fas fa-chevron-circle-right"></i></a>
		</div>
			
		</form>
		<?php include 'scroll-up.php' ?>
	</div>
</body>
</html>