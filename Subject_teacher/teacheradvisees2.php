<?php
include("../dbconnect.php");

session_start();

$tid = $_SESSION['stid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_enrolledsubjects as t2 on t1.subject_teaching = t2.subject_name inner join tbl_student as t3 on t2.stud_lrn = t3.stud_lrn inner join tbl_semester as t5 on t2.semester = t5.sem_name WHERE t1.teacher_ID = '$tid' AND t5.sem_status = 'Active' AND t3.yearlevel_name = t2.yearlevel ORDER BY stud_lastname ASC");

$sql1 = mysqli_query($conn, "SELECT * FROM tbl_subjectteacher as t1 inner join tbl_enrolledsubjects as t2 on t1.subject_teaching = t2.subject_name inner join tbl_student as t3 on t2.stud_lrn = t3.stud_lrn inner join tbl_semester as t5 on t2.semester = t5.sem_name WHERE t1.teacher_ID = '$tid' AND t5.sem_status = 'Active' AND t3.yearlevel_name = t2.yearlevel ORDER BY stud_lastname ASC");
$sql1Result = mysqli_fetch_assoc($sql1);

$studentCountQry = mysqli_query($conn, "SELECT COUNT(es_ID) as num FROM tbl_subjectteacher as t1 inner join tbl_enrolledsubjects as t2 on t1.subject_teaching = t2.subject_name inner join tbl_student as t3 on t2.stud_lrn = t3.stud_lrn inner join tbl_semester as t5 on t2.semester = t5.sem_name WHERE t1.teacher_ID = '$tid' AND t5.sem_status = 'Active' AND t3.yearlevel_name = t2.yearlevel");
$studentCountQryResult = mysqli_fetch_assoc($studentCountQry);

$studentCountQry1 = mysqli_query($conn, "SELECT COUNT(es_ID) as num FROM tbl_subjectteacher as t1 inner join tbl_enrolledsubjects as t2 on t1.subject_teaching = t2.subject_name inner join tbl_student as t3 on t2.stud_lrn = t3.stud_lrn inner join tbl_semester as t5 on t2.semester = t5.sem_name WHERE t1.teacher_ID = '$tid' AND t5.sem_status = 'Active' AND t3.yearlevel_name = t2.yearlevel AND t2.first_grade != 0 OR t2.first_grade = 'INC'");
$studentCountQryResult1 = mysqli_fetch_assoc($studentCountQry1);

$studentCount = mysqli_query($conn, "SELECT COUNT(es_ID) as num FROM tbl_subjectteacher as t1 inner join tbl_enrolledsubjects as t2 on t1.subject_teaching = t2.subject_name inner join tbl_student as t3 on t2.stud_lrn = t3.stud_lrn inner join tbl_semester as t5 on t2.semester = t5.sem_name WHERE t1.teacher_ID = '$tid' AND t5.sem_status = 'Active' AND t3.yearlevel_name = t2.yearlevel AND t2.second_grade != 0");
$studentCountResult = mysqli_fetch_assoc($studentCount);

?>

<!DOCTYPE html>
<html>    
<head>
	<title>My Advisees | Teacher</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/grade.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/add_grade.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
    <style type="text/css">
    	*{
			margin: 0;
			padding: 0;
		}
		body{
			
		}
		.container{
			
			margin-top:20px;
		}
	
	
		.header h4{
			margin-top:90px;
		}
		@media screen and (max-width:500px) {
			.content{
				margin-top:100px;
			}
		}

		
		table{
			width: 100%;
			border-bottom: 3px solid gray;
			border-collapse: collapse;
			
		}
		td{
			padding: 10px 5px;
		}
		.action .action1{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: green;
			border-radius: 5px;
			margin-right: 10px;
		}
		.action .action2{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: orange;
			border-radius: 5px;
			margin-right: 10px;
		}
		.action .action3{
			padding: 5px 5px;
			color: white;
			text-decoration: none;
			background: #1663b3;
			border-radius: 5px;
			margin-right: 10px;
		}
		.head{
			font-weight: bold;
			text-transform: uppercase;
			border-bottom: 1px solid gray;
		}
		.content1:hover{
			background-color: #f3f3f3;
		}
		.masterlist-btn{
			float: right;
			text-align: center;
			margin-bottom: 25px;
		}
		.masterlist-btn a{
			padding: 9px 9px;
			border: none;
			border-radius: 8px;
			text-decoration: none;
			color: white;
			background: #EE4B2B;
			transition: .2s ease;
		}
		.masterlist-btn a:hover{
			background: crimson;
		}
		.graded-label{
			padding: .3rem .4rem;
			border: 1px solid transparent;
			background-color: #2E8B57;
			width: 8rem;
			border-radius: 2px;
			color: #fff;
			font-size: .9rem;
		}
		.graded-label-1{
			padding: .3rem .4rem;
			border: 1px solid transparent;
			background-color: crimson;
			width: 8rem;
			border-radius: 2px;
			color: #fff;
			font-size: .9rem;
		}
		.graded-label-2{
			padding: .3rem .4rem;
			border: 1px solid transparent;
			background-color: #FF8C00;
			width: 8rem;
			border-radius: 2px;
			color: #fff;
			font-size: .9rem;
		}
		.submitGrade{
			padding: .4rem .6rem;
			float: right;
			margin-top: 10px;
			font-weight: 600;
		}
		.text{
			font-style: italic;
			font-size: .7rem;
		}
		.to-2nd-Q{
			display: flex;
			justify-content: center;
			align-items: center;
			float: right;
			transition: .3s ease;
		}
		.to-2nd-Q:hover{
			text-decoration: underline;
			padding-right: 5px;
		}
		.to-2nd-Q a{
			text-decoration: none;
			font-size: .9rem;
			color: #333;
		}
	</style>
</head>
<body>
	<?php
		include('nav.php')
	?>
	<?php 
	if($studentCountQryResult['num'] != $studentCountQryResult1['num']){	?>
		<script>
			alert("Your students does not have grades for the first grading.");
			window.location = "teacheradvisees.php?tid=<?php echo $tid; ?>";
		</script> <?php 
		}
	elseif($studentCountQryResult['num'] == $studentCountQryResult1['num']){	?>
		<div class="container">
		<div class="header">
			<h4>My Students |
				<?php 
				if ($sql1Result['semester'] == 'First') {
					echo 'Second Quarter';
				}
				else {
					echo 'Fourth Quarter';
				}
				?>
			</h4>
			<br>
			<br><br>
			<br>
		</div>

		<div class="content">
			<form method="post" action="./addgrades_advises.php">
				<table>
					<tr>
						<td colspan="6" align="right">
							<div class="to-2nd-Q">
								<box-icon name='chevron-left' ></box-icon>
								<a href="teacheradvisees.php">Go to 
								<?php 
								if($sql1Result['semester'] == 'First'){
									echo 'First';
								}
								elseif($sql1Result['semester'] == 'Second'){
									echo 'Third';
								}
								?> 
								Quarter</a>
							</div>
						</td>
					</tr>
				    <tr class="head">
				        <td>Student's Name</td>
				        <td align="left">LRN</td>
				        <td align="center">Section</td>
				        <td align="center">Status</td>
				        <td align="center">Grade Input</td>
				        <td align="center">Encoded Grades</td>
				        <!-- <td align="center">Action</td> -->
				        <input type="hidden" name="teacher_id" value="<?php echo $tid; ?>">
				    </tr>
				    
				    <tr class="content1">
				    <?php
				    $count = 1;
				    $name = '';

				        while($list = mysqli_fetch_assoc($sql)){
				            $name = $count++;
				    ?>
				        <td>
				            <input type="hidden" name="stud_id_advisee[]" value="<?php echo $list['stud_ID']; ?>">
				            <input type="hidden" name="semester[]" value="<?php echo $list['semester']; ?>">
				            <input type="hidden" name="es_idd[]" value="<?php echo $list['es_ID']; ?>">
				            <input type="hidden" name="stud_lrn[]" value="<?php echo $list['stud_lrn']; ?>">
				            <?php echo $list['stud_lastname'] .', ' .$list['stud_firstname'] .' ' .$list['stud_middleinitial']; ?>.
				        </td>
				        <td align="left">
				            <?php echo $list['stud_lrn']; ?>	
				        </td>
				        <td align="center">
				            <?php echo $list['section_name']; ?>
				        </td>
				        <td align="center">
				            <?php echo $list['student_status']; ?>
				        </td>
				        <td align="center">
				        	<?php 
				        	if ($list['second_grade'] != 0 AND $list['second_grade'] > 74) { ?>
				        		<div>
				        			<p class="graded-label">Graded - Passed</p>
				        		</div>
				        	<?php }
				        	if ($list['second_grade'] != 0 AND $list['second_grade'] < 75) { ?>
				        		<div>
				        			<p class="graded-label-1">Graded - Failed</p>
				        		</div>
				        	<?php }
				        	elseif ($list['second_grade'] == 'INC') {	?>
				        		<div>
				        			<p class="graded-label-2">INC</p>
				        		</div>
				        	<?php }
				        	elseif ($list['second_grade'] == 0){	?>
					        	<select name="grades[]">
					            	<option hidden selected>Choose grade here.</option>
					            	<?php 
					            	$baseGrade = 70;
					            	$highGrade = 100;

					            	for ($i=$highGrade; $i >= $baseGrade; $i--) { 	?>
					            		<option><?php echo $i; ?></option>
					            	<?php }
					            	?>
					            	<option>INC</option>
				            	</select>
				        	<?php }
				        	?>
				        </td>
				         <td align="center">
				        	<?php 
				        	if ($list['second_grade'] != 0) { 
				        		echo $list['second_grade'];
				        	}
				        	?>
				            
				        </td>
				    </tr>
				    <?php } 
				    ?>
				    <tr>
				    	<td colspan="6">
				    		<p class="text"><marquee>For the uploading process of your students' grades, you MUST enter all of their grades at once.</marquee></p>
				    	</td>
				    </tr>
				</table>
			<?php 
			if($studentCountResult['num'] > 0){	?>
				<input type="submit" name="uploadSecondGrade" disabled class="submitGrade" value="Upload Grade" onclick="alert('Are you sure?')">
			<?php }
			elseif ($studentCountResult['num'] == 0){ ?>
				<input type="submit" name="uploadSecondGrade" class="submitGrade" value="Upload Grade" onclick="alert('Are you sure?')">
			<?php }
			?>
			</form>
		</div>
		<?php include 'scroll-up.php' ?>
	</div>
	<?php }
	?>
	<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</body>
</html>