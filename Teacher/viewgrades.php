<?php
include("../dbconnect.php");

session_start();

$sid = $_GET['sid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_enrolledsubjects as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.stud_ID = '$sid'");
$rec = mysqli_fetch_assoc($sql);


//Grade 11 First Sem
$sql1 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_enrolledsubjects as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.stud_ID = '$sid' AND t2.yearlevel = 'GRADE 11' AND t2.semester = 'FIRST'");

$subNum1 = mysqli_query($conn, "SELECT COUNT(first_grade) as num1 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 11' AND first_grade != 0");
$firstcount = mysqli_fetch_assoc($subNum1);

$subNum2 = mysqli_query($conn, "SELECT COUNT(first_grade) as num2 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 11'");
$secondcount = mysqli_fetch_assoc($subNum2);

$subNum3 = mysqli_query($conn, "SELECT COUNT(second_grade) as num3 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 11' AND second_grade != 0");
$thirdcount = mysqli_fetch_assoc($subNum3);

$subNum4 = mysqli_query($conn, "SELECT COUNT(second_grade) as num4 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 11'");
$fourthcount = mysqli_fetch_assoc($subNum4);



//Grade 11 Second Sem
$sql2 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_enrolledsubjects as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.stud_ID = '$sid' AND t2.yearlevel = 'GRADE 11' AND t2.semester = 'SECOND'");

$subNum5 = mysqli_query($conn, "SELECT COUNT(first_grade) as num5 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 11' AND first_grade != 0");
$fifthcount = mysqli_fetch_assoc($subNum5);

$subNum6 = mysqli_query($conn, "SELECT COUNT(first_grade) as num6 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 11'");
$sixthcount = mysqli_fetch_assoc($subNum6);

$subNum7 = mysqli_query($conn, "SELECT COUNT(second_grade) as num7 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 11' AND second_grade != 0");
$seventhcount = mysqli_fetch_assoc($subNum7);

$subNum8 = mysqli_query($conn, "SELECT COUNT(second_grade) as num8 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 11'");
$eighthcount = mysqli_fetch_assoc($subNum8);



//Grade 12 First Sem
$sql3 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_enrolledsubjects as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.stud_ID = '$sid' AND t2.yearlevel = 'GRADE 12' AND t2.semester = 'FIRST'");

$subNum9 = mysqli_query($conn, "SELECT COUNT(first_grade) as num9 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 12' AND first_grade != 0");
$ninthcount = mysqli_fetch_assoc($subNum9);

$subNum10 = mysqli_query($conn, "SELECT COUNT(first_grade) as num10 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 12'");
$tenthcount = mysqli_fetch_assoc($subNum10);

$subNum11 = mysqli_query($conn, "SELECT COUNT(second_grade) as num11 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 12' AND second_grade != 0");
$eleventhcount = mysqli_fetch_assoc($subNum11);

$subNum12 = mysqli_query($conn, "SELECT COUNT(second_grade) as num12 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'FIRST' AND yearlevel = 'GRADE 12'");
$twelfthhcount = mysqli_fetch_assoc($subNum12);



//Grade 12 Second Sem
$sql4 = mysqli_query($conn, "SELECT * FROM tbl_student as t1 inner join tbl_enrolledsubjects as t2 on t1.stud_lrn = t2.stud_lrn WHERE t1.stud_ID = '$sid' AND t2.yearlevel = 'GRADE 12' AND t2.semester = 'SECOND'");

$subNum13 = mysqli_query($conn, "SELECT COUNT(first_grade) as num13 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 12' AND first_grade != 0");
$thirteenthcount = mysqli_fetch_assoc($subNum13);

$subNum14 = mysqli_query($conn, "SELECT COUNT(first_grade) as num14 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 12'");
$fourteenthcount = mysqli_fetch_assoc($subNum14);

$subNum15 = mysqli_query($conn, "SELECT COUNT(second_grade) as num15 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 12' AND second_grade != 0");
$fifteenthcount = mysqli_fetch_assoc($subNum15);

$subNum16 = mysqli_query($conn, "SELECT COUNT(second_grade) as num16 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND semester = 'SECOND' AND yearlevel = 'GRADE 12'");
$sixteenthcount = mysqli_fetch_assoc($subNum16);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Record | Teacher</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/grade.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/add_grade.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>
    <style type="text/css">
    	.grade-header{
    		font-size: 20px;
    		text-transform: uppercase;
    	}
    	.head1{
    		text-transform: uppercase;
    		font-weight: bold;
    	}
    	.sem-header{
    		font-size: 14px;
    		text-transform: uppercase;
    		font-weight: bold;
    	}
    	.fa-circle{
    		font-size: 11px;
    		margin-right: 10px;
    		color: crimson;
    	}
    	table .gpa{
    		background: gray;
    		color: white;
    		text-indent: 10px;
    		font-weight: bold;
    	}
    	table{
    		border-collapse: collapse;
    	}
    	table .head td{
    		border-right: 1px solid gray;
    	}
    	table .content{
    		border-bottom: 1px solid gray;
    	}
    	.sem-header{
    		border-top: 1px solid gray;
    		border-bottom: 1px solid gray;
    	}
    	.print-btn{
    		float: right;
    		margin-bottom: 25px;
    	}
    	.print-btn .btn-print{
    		padding: 10px 10px;
    		width: 200px;
    		text-decoration: none;
    		border: none;
    		border-radius: 7px;
    		color: white;
    		background: crimson;
    		font-weight: bold;
    		font-size: 14px;
    		text-transform: uppercase;
			
    	}
		@media print{
            .print,.btn-print,.info,.filt{
                visibility: hidden;
            }
            .container{
                visibility:visible;
                position:absolute;
				margin-top:-80px;
                left:0;
                top:0;
            }
        }
</style>
    </style>
</head>
<body>
	<div class="print">
	<?php
		include('nav.php')
	?>
	</div>
	<div class="container">
		<div class="header">
			<h4 class="info">Student's Information</h4>
			<div class="print-btn">
				<button onclick="window.print()" class="btn-print">Print / Save as PDF</button>
			</div>
			<br>
		</div>
		<div class="content">
			<table>
				<tr class="head">
					<td>Student Name</td>
					<td align="center">Learner's Reference Number</td>
					<td align="center">Sex</td>
					<td align="center">Strand</td>
					<td align="center">Address</td>
				</tr>
				<tr class="content">
					<td align="left"><?php echo $rec['stud_firstname'] .' ' .$rec['stud_middleinitial'] .'. ' .$rec['stud_lastname']; ?></td>
					<td align="center"><?php echo $rec['stud_lrn']; ?></td>
					<td align="center"><?php echo $rec['sex']; ?></td>
					<td align="center"><?php echo $rec['strands_name']; ?></td>
					<td align="center"><?php echo $rec['student_address']; ?></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td class="grade-header">
						<h4>Student's Grades</h4>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr class="sem-header">
					<td colspan="5"><i class="fas fa-circle"></i> GRADE 11 - First Semester</td>
				</tr>
				<tr class="head1">
					<td>Subject Name</td>
					<td align="center">Type</td>
					<td align="center">First Quarter Grade</td>
					<td align="center">Second Quarter Grade</td>
					<td align="center">Average</td>
				</tr>
				<?php
					$intoGPA = 0;
					$intoGPA1 = 0;
					$intoGPA2 = 0;
					$intoGPA3 = 0;

					while($grade11firstsem = mysqli_fetch_assoc($sql1)){
					$gpa = 0;
					$subAver = 0;	
						if ($firstcount['num1'] != $secondcount['num2'] OR $thirdcount['num3'] != $fourthcount['num4']) {
							$ggpa = '0.00';
							if ($grade11firstsem['first_grade'] != 0 AND $grade11firstsem['second_grade'] == 0) {
								$subAver = $grade11firstsem['first_grade'];
							}
							elseif ($grade11firstsem['first_grade'] == 0 AND $grade11firstsem['second_grade'] != 0){
								$subAver = $grade11firstsem['second_grade'];
							}
							elseif ($grade11firstsem['first_grade'] != 0 AND $grade11firstsem['second_grade'] != 0) {
								$totalPerSubject = $grade11firstsem['first_grade'] + $grade11firstsem['second_grade'];
								$averagePerSubject = $totalPerSubject / 2;
								$subAver = number_format($averagePerSubject, 2);
							}
						}
						if ($firstcount['num1'] == $secondcount['num2'] AND $thirdcount['num3'] == $fourthcount['num4'] AND $grade11firstsem['first_grade'] != 0 AND $grade11firstsem['second_grade'] != 0) {
							$totalPerSubject = $grade11firstsem['first_grade'] + $grade11firstsem['second_grade'];
							$averagePerSubject = $totalPerSubject / 2;
							$subAver = number_format($averagePerSubject, 2);
							$intoGPA += $averagePerSubject;
							$gpa = $intoGPA / $secondcount['num2'];
							$ggpa = number_format($gpa, 2);
						}
				?>
				<tr>
					<td><?php echo $grade11firstsem['subject_name']; ?></td>
					<td align="center"><?php echo $grade11firstsem['subject_type']; ?></td>
					<td align="center"><?php echo $grade11firstsem['first_grade']; ?></td>
					<td align="center"><?php echo $grade11firstsem['second_grade']; ?></td>
					<td align="center"><?php echo $subAver; ?></td>
				<?php }
				?>
				</tr>
				<tr class="gpa">
					<td align="left" colspan="3">Semestral Grade Point Average</td>
					<td align="center"><?php echo $ggpa; ?></td>
					<td align="center">
					<?php
						if($ggpa == 0){
							echo "Not yet Graded";
						}
						elseif ($ggpa < 75) {
							echo "Failed";
						}
						else{
							echo "Passed";
						}
					?>
					</td>
				</tr>

				<tr><td></td></tr><tr><td></td></tr>
				<tr class="sem-header">
					<td colspan="5"><i class="fas fa-circle"></i> GRADE 11 - Second Semester</td>
				</tr>
				<tr class="head1">
					<td>Subject Name</td>
					<td align="center">Type</td>
					<td align="center">Third Quarter Grade</td>
					<td align="center">Fourth Quarter Grade</td>
					<td align="center">Average</td>
				</tr>
				<?php
					while($grade11secondsem = mysqli_fetch_assoc($sql2)){
						$gpa1 = 0;
						$subAver1 = 0;
						if ($fifthcount['num5'] != $sixthcount['num6'] OR $seventhcount['num7'] != $eighthcount['num8']) {
							$ggpa1 = '0.00';
							if ($grade11secondsem['first_grade'] != 0 AND $grade11secondsem['second_grade'] == 0) {
								$subAver1 = $grade11secondsem['first_grade'];
							}
							elseif ($grade11secondsem['first_grade'] == 0 AND $grade11secondsem['second_grade'] != 0){
								$subAver1 = $grade11secondsem['second_grade'];
							}
							elseif ($grade11secondsem['first_grade'] != 0 AND $grade11secondsem['second_grade'] != 0) {
								$totalPerSubject1 = $grade11secondsem['first_grade'] + $grade11secondsem['second_grade'];
								$averagePerSubject1 = $totalPerSubject1 / 2;
								$subAver1 = number_format($averagePerSubject1, 2);
							}
						}
						if ($fifthcount['num5'] == $sixthcount['num6'] AND $seventhcount['num7'] == $eighthcount['num8'] AND $grade11secondsem['first_grade'] != 0 AND $grade11secondsem['second_grade'] != 0) {
							$totalPerSubject1 = $grade11secondsem['first_grade'] + $grade11secondsem['second_grade'];
							$averagePerSubject1 = $totalPerSubject1 / 2;
							$subAver1 = number_format($averagePerSubject1, 2);
							$intoGPA1 += $averagePerSubject1;
							$gpa1 = $intoGPA1 / $sixthcount['num6'];
							$ggpa1 = number_format($gpa1, 2);
						}
				?>

				<tr>
					<td><?php echo $grade11secondsem['subject_name']; ?></td>
					<td align="center"><?php echo $grade11secondsem['subject_type']; ?></td>
					<td align="center"><?php echo $grade11secondsem['first_grade']; ?></td>
					<td align="center"><?php echo $grade11secondsem['second_grade']; ?></td>
					<td align="center"><?php echo $subAver1; ?></td>
					<?php } 
					?>
					<tr class="gpa">
					<td align="left" colspan="3">Semestral Grade Point Average</td>
					<td align="center">
						<?php 
							$ggpa1 = number_format($gpa1, 2);
							echo $ggpa1; ?>
						</td>
					<td align="center">
					<?php
						if($ggpa1 == 0){
							echo "Not yet Graded";
						}
						elseif ($ggpa1 < 75) {
							echo "Failed";
						}
						else{
							echo "Passed";
						}
					?>
					</td>
				</tr>
				</tr>

				<tr><td></td></tr><tr><td></td></tr>
				<tr class="sem-header">
					<td colspan="5"><i class="fas fa-circle"></i> GRADE 12 - First Semester</td>
				</tr>
				<tr class="head1">
					<td>Subject Name</td>
					<td align="center">Type</td>
					<td align="center">First Quarter Grade</td>
					<td align="center">Second Quarter Grade</td>
					<td align="center">Average</td>
				</tr>
				<?php
					while($grade12firstsem = mysqli_fetch_assoc($sql3)){
						$gpa2 = 0;
						$subAver2 = 0;
						if ($ninthcount['num9'] != $tenthcount['num10'] OR $eleventhcount['num11'] != $twelfcount['num12']) {
							$ggpa2 = '0.00';
							if ($grade12firstsem['first_grade'] != 0 AND $grade12firstsem['second_grade'] == 0) {
								$subAver2 = $grade12firstsem['first_grade'];
							}
							elseif ($grade12firstsem['first_grade'] == 0 AND $grade12firstsem['second_grade'] != 0){
								$subAver2 = $grade12firstsem['second_grade'];
							}
							elseif ($grade12firstsem['first_grade'] != 0 AND $grade12firstsem['second_grade'] != 0) {
								$totalPerSubject2 = $grade12firstsem['first_grade'] + $grade12firstsem['second_grade'];
								$averagePerSubject2 = $totalPerSubject2 / 2;
								$subAver2 = number_format($averagePerSubject2, 2);
							}
						}
						if ($ninthcount['num9'] == $tenthcount['num10'] AND $eleventhcount['num11'] == $twelfcount['num12'] AND $grade12firstsem['first_grade'] != 0 AND $grade12firstsem['second_grade'] != 0) {
							$totalPerSubject2 = $grade12firstsem['first_grade'] + $grade12firstsem['second_grade'];
							$averagePerSubject2 = $totalPerSubject2 / 2;
							$subAver2 = number_format($averagePerSubject2, 2);
							$intoGPA2 += $averagePerSubject2;
							$gpa2 = $intoGPA2 / $tenthcount['num10'];
							$ggpa2 = number_format($gpa2, 2);
						}
				?>


				<tr>
					<td><?php echo $grade12firstsem['subject_name']; ?></td>
					<td align="center"><?php echo $grade12firstsem['subject_type']; ?></td>
					<td align="center"><?php echo $grade12firstsem['first_grade']; ?></td>
					<td align="center"><?php echo $grade12firstsem['second_grade']; ?></td>
					<td align="center"><?php echo $subAver2; ?></td>
					<?php } 
					?>
					<tr class="gpa">
					<td align="left" colspan="3">Semestral Grade Point Average</td>
					<td align="center"><?php echo $ggpa2; ?></td>
					<td align="center">
					<?php
						if($ggpa2 == 0){
							echo "Not yet Graded";
						}
						elseif ($ggpa2 < 75) {
							echo "Failed";
						}
						else{
							echo "Passed";
						}
					?>
					</td>
				</tr>
				</tr>

				<tr><td></td></tr><tr><td></td></tr>
				<tr class="sem-header">
					<td colspan="5"><i class="fas fa-circle"></i> GRADE 12 - Second Semester</td>
				</tr>
				<tr class="head1">
					<td>Subject Name</td>
					<td align="center">Type</td>
					<td align="center">Third Quarter Grade</td>
					<td align="center">Fourth Quarter Grade</td>
					<td align="center">Average</td>
				</tr>
				<?php
					while($grade12secondsem = mysqli_fetch_assoc($sql4)){
						$gpa3 = 0;
						$subAver3 = 0;
						if ($thirteenthcount['num13'] != $fourteenthcount['num14'] OR $fifteenthcount['num15'] != $sixteenthcount['num16']) {
							$ggpa3 = '0.00';
							if ($grade12secondsem['first_grade'] != 0 AND $grade12secondsem['second_grade'] == 0) {
								$subAver3 = $grade12secondsem['first_grade'];
							}
							elseif ($grade12secondsem['first_grade'] == 0 AND $grade12secondsem['second_grade'] != 0){
								$subAver3 = $grade12secondsem['second_grade'];
							}
							elseif ($grade12secondsem['first_grade'] != 0 AND $grade12secondsem['second_grade'] != 0) {
								$totalPerSubject3 = $grade12secondsem['first_grade'] + $grade12secondsem['second_grade'];
								$averagePerSubject3 = $totalPerSubject3 / 2;
								$subAver3 = number_format($averagePerSubject3, 2);
							}
						}
						if ($thirteenthcount['num13'] == $fourteenthcount['num14'] AND $fifteenthcount['num15'] == $sixteenthcount['num16'] AND $grade12secondsem['first_grade'] != 0 AND $grade12secondsem['second_grade'] != 0) {
							$totalPerSubject3 = $grade12secondsem['first_grade'] + $grade12secondsem['second_grade'];
							$averagePerSubject3 = $totalPerSubject3 / 2;
							$subAver3 = number_format($averagePerSubject3, 2);
							$intoGPA3 += $averagePerSubject3;
							$gpa3 = $intoGPA3 / $fourteenthcount['num14'];
							$ggpa3 = number_format($gpa3, 2);
						}	
				?>

				<tr>
					<td><?php echo $grade12secondsem['subject_name']; ?></td>
					<td align="center"><?php echo $grade12secondsem['subject_type']; ?></td>
					<td align="center"><?php echo $grade12secondsem['first_grade']; ?></td>
					<td align="center"><?php echo $grade12secondsem['second_grade']; ?></td>
					<td align="center"><?php echo $subAver3; ?></td>
					<?php } 
					?>
					<tr class="gpa">
					<td align="left" colspan="3">Semestral Grade Point Average</td>
					<td align="center"><?php echo $ggpa3; ?></td>
					<td align="center">
					<?php
						if($ggpa3 == 0){
							echo "Not yet Graded";
						}
						elseif ($ggpa3 < 75) {
							echo "Failed";
						}
						else{
							echo "Passed";
						}
					?>
					</td>
				</tr>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>