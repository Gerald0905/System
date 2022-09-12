<?php
include("../dbconnect.php");

session_start();
$sid = $_SESSION['sid'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_semester as t3 on t1.semester = t3.sem_name WHERE t1.stud_ID = '$sid' AND t3.sem_status = 'Active' AND t1.yearlevel = t2.yearlevel_name");
$query = mysqli_fetch_assoc($sql);

$sql1 = mysqli_query($conn, "SELECT COUNT(*) as num1 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST' AND first_grade != '0'");
$count1 = mysqli_fetch_assoc($sql1);

$sql2 = mysqli_query($conn, "SELECT COUNT(*) as num2 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST' AND first_grade = '0'");
$count2 = mysqli_fetch_assoc($sql2);

$sql3 = mysqli_query($conn, "SELECT COUNT(*) as num3 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND' AND second_grade != '0'");
$count3 = mysqli_fetch_assoc($sql3);

$sql4 = mysqli_query($conn, "SELECT COUNT(*) as num4 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND' AND second_grade = '0'");
$count4 = mysqli_fetch_assoc($sql4);

$sql5 = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects as t1 inner join tbl_student as t2 on t1.stud_ID = t2.stud_ID inner join tbl_semester as t3 on t1.semester = t3.sem_name WHERE t1.stud_ID = '$sid' AND t3.sem_status = 'Active' AND t1.yearlevel = t2.yearlevel_name");
$nameofstud= mysqli_fetch_assoc($sql5);
$grades = 0;
$total = 0;
$gpa = 0;
$total1= 0;
$gpa1 = 0;
$ggpa = '0.00';
$ggpa1 = '0.00';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Your Grades</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/nav1.css">
    <link rel="stylesheet" type="text/css" href="css/grade.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/0c750910e8.js" crossorigin="anonymous"></script>

</head>
<style>
    .gpa {
        color: red;
        font-weight: bolder;
        background: lightgray;
        opacity: .9;
    }
    label {
        font-weight: bold;
        text-transform: uppercase;
        margin-right: 10px;
    }
    .filt{
        border-bottom: 2px solid black;
    }
    .btn{
        text-decoration: none;
        padding: 6px 6px;
        border: 1px solid transparent;
        color: #1357A6;
        background: none;
        transition: .3s ease;
        border-radius: 8px;
        font-weight: bold;
    }
    .btn:hover{
        background: #1357A6;
        color: white;
        text-decoration: none;
    }
    table{
        border-collapse: collapse;
        margin-top: 25px;
        border-bottom: 2px solid black;
    }
    .msg{
        font-style: italic;
        font-size: 13px;
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
            .print,.btn-print,.container.msg,.filt,.grade{
                visibility: hidden;
            }
            .container{
                visibility:visible;
                position:absolute;
                margin-top:-10px;
                left:0;
                top:0;
            }
            .table .head {
                    margin-top:-20px;
            }
        }
        .header p{
            font-size: .9rem;
        }
</style>

<body>
<div class="print">
    <?php 
    
        include 'nav_grade.php'
        ?>
        </div>
    <div class="container">
     
        <div class="header">
        
        
            <h4 class="grade">
                <?php 
                    if ($query['yearlevel'] == 'Grade 11') {
                        if ($query['semester'] == 'First') {
                            echo "Grade 11 - First Semester (ACTIVE)";
                        }
                        elseif ($query['semester'] == 'Second') {
                            echo "Grade 11 - Second Semester (ACTIVE)";
                        }
                    }
                    elseif ($query['yearlevel'] == 'Grade 12') {
                        if ($query['semester'] == 'First') {
                            echo "Grade 12 - First Semester (ACTIVE)";
                        }
                        elseif ($query['semester'] == 'Second') {
                            echo "Grade 12 - Second Semester (ACTIVE)";
                        }
                    }
                ?>
            </h4>
            <p>Name: <?php echo $nameofstud['stud_lastname'].' , '.$nameofstud['stud_firstname'].' '.$nameofstud['stud_middleinitial'].'.'; ?> <br> LRN: <?php echo $nameofstud['stud_lrn'];?></p>
        </div>
        <div class="content">
            <form method="post">
                <table class="table table-hover">
                    <tr>
                    <div class="print-btn">
				<button onclick="window.print()" class="btn-print">Print / Save as PDF</button>
    </div>
                        <td colspan="6" align="right" class="filt">
                  
			
                            <label for="filter">Choose semester here</label>
                            <select name="grade_filter" id="filter">
                                <option selected hidden>Click here...</option>
                                <?php 
                                    if ($query['yearlevel'] == 'Grade 11') {
                                        if ($query['semester'] == 'First') {    ?>
                                            <option>Grade 11 - First Semester Grades</option>
                                            <option hidden>Grade 11 - Second Semester Grades</option>
                                            <option hidden>Grade 12 - First Semester Grades</option>
                                            <option hidden>Grade 12 - Second Semester Grades</option>
                                        <?php }
                                    }
                                    if ($query['yearlevel'] == 'Grade 11') {
                                        if ($query['semester'] == 'Second') {    ?>
                                            <option>Grade 11 - First Semester Grades</option>
                                            <option>Grade 11 - Second Semester Grades</option>
                                            <option hidden>Grade 12 - First Semester Grades</option>
                                            <option hidden>Grade 12 - Second Semester Grades</option>
                                        <?php }
                                    }
                                    if ($query['yearlevel'] == 'Grade 12') {
                                        if ($query['semester'] == 'First') {    ?>
                                            <option>Grade 11 - First Semester Grades</option>
                                            <option>Grade 11 - Second Semester Grades</option>
                                            <option>Grade 12 - First Semester Grades</option>
                                            <option hidden>Grade 12 - Second Semester Grades</option>
                                        <?php }
                                    }
                                    if ($query['yearlevel'] == 'Grade 12') {
                                        if ($query['semester'] == 'Second') {    ?>
                                            <option>Grade 11 - First Semester Grades</option>
                                            <option>Grade 11 - Second Semester Grades</option>
                                            <option>Grade 12 - First Semester Grades</option>
                                            <option>Grade 12 - Second Semester Grades</option>
                                        <?php }
                                    }
                                ?>
                            </select>
                            <button class="btn" name="submit">Proceed</button>
                            <?php 
								if (isset($_POST['submit'])) {
									$var = $_POST['grade_filter'];

									if ($var == 'Grade 11 - First Semester Grades') {
    									$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST'");

                                        $sql1 = mysqli_query($conn, "SELECT COUNT(*) as num1 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST' AND first_grade != '0'");
                                        $count1 = mysqli_fetch_assoc($sql1);

                                        $sql2 = mysqli_query($conn, "SELECT COUNT(subject_name) as num2 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST'");
                                        $count2 = mysqli_fetch_assoc($sql2);

                                        $sql3 = mysqli_query($conn, "SELECT COUNT(*) as num3 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST' AND second_grade != '0'");
                                        $count3 = mysqli_fetch_assoc($sql3);

                                        $sql4 = mysqli_query($conn, "SELECT COUNT(subject_name) as num4 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'FIRST'");
                                        $count4 = mysqli_fetch_assoc($sql4);

									}
									elseif ($var == 'Grade 11 - Second Semester Grades') {
										$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND'");

                                        $sql1 = mysqli_query($conn, "SELECT COUNT(*) as num1 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND' AND first_grade != '0'");
                                        $count1 = mysqli_fetch_assoc($sql1);

                                        $sql2 = mysqli_query($conn, "SELECT COUNT(*) as num2 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND' AND first_grade = '0'");
                                        $count2 = mysqli_fetch_assoc($sql2);

                                        $sql3 = mysqli_query($conn, "SELECT COUNT(*) as num3 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND' AND second_grade != '0'");
                                        $count3 = mysqli_fetch_assoc($sql3);

                                        $sql4 = mysqli_query($conn, "SELECT COUNT(*) as num4 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 11' AND semester = 'SECOND' AND second_grade = '0'");
                                        $count4 = mysqli_fetch_assoc($sql4);

									}

									elseif ($var == 'Grade 12 - First Semester Grades') {
										$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'FIRST'");

                                        $sql1 = mysqli_query($conn, "SELECT COUNT(*) as num1 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'FIRST' AND first_grade != '0'");
                                        $count1 = mysqli_fetch_assoc($sql1);

                                        $sql2 = mysqli_query($conn, "SELECT COUNT(*) as num2 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'FIRST' AND first_grade = '0'");
                                        $count2 = mysqli_fetch_assoc($sql2);

                                        $sql3 = mysqli_query($conn, "SELECT COUNT(*) as num3 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'FIRST' AND second_grade != '0'");
                                        $count3 = mysqli_fetch_assoc($sql3);

                                        $sql4 = mysqli_query($conn, "SELECT COUNT(*) as num4 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'FIRST' AND second_grade = '0'");
                                        $count4 = mysqli_fetch_assoc($sql4);
									}

									elseif ($var == 'Grade 12 - Second Semester Grades') {
										$sql = mysqli_query($conn, "SELECT * FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND'");

                                        $sql1 = mysqli_query($conn, "SELECT COUNT(*) as num1 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND' AND first_grade != '0'");
                                        $count1 = mysqli_fetch_assoc($sql1);

                                        $sql2 = mysqli_query($conn, "SELECT COUNT(*) as num2 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND' AND first_grade = '0'");
                                        $count2 = mysqli_fetch_assoc($sql2);

                                        $sql3 = mysqli_query($conn, "SELECT COUNT(*) as num3 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND' AND second_grade != '0'");
                                        $count3 = mysqli_fetch_assoc($sql3);

                                        $sql4 = mysqli_query($conn, "SELECT COUNT(*) as num4 FROM tbl_enrolledsubjects WHERE stud_ID = '$sid' AND yearlevel = 'GRADE 12' AND semester = 'SECOND' AND second_grade = '0'");
                                        $count4 = mysqli_fetch_assoc($sql4);
									}
								}
							?>
                        </td>
                    </tr>
                    <tr class="head">
                        <td>Subject Name</td>
                        <td>Subject Type</td>
                        <td align="center">First Grading</td>
                        <td align="center">Second Grading</td>
                    </tr>

                    <?php
                    $grades1 = 0;
						while($list = mysqli_fetch_assoc($sql)){
                            
                            if ($count1['num1'] != $count2['num2']) {
                                $ggpa = '0.00';
                            }
                            if ($count3['num3'] != $count4['num4']) {
                                $ggpa1 = '0.00';
                            }
                            if ($count1['num1'] == $count2['num2']) {
                                $grade = $list['first_grade'];
                                $grades += $grade;
                                $total = $grades / $count2['num2'];
                                $ggpa = number_format($total, 2);
                            }
                            if ($count3['num3'] == $count4['num4']) {
                                $grade1 = $list['second_grade'];
                                $grades1 += $grade1;
                                $total1 = $grades1 / $count4['num4'];
                                $ggpa1 = number_format($total1, 2);
                            }
                            
					?>
                    <tr class="content">
                        <td><?php echo $list['subject_name']; ?></td>
                        <td><?php echo $list['subject_type']; ?></td>
                        <td align="center"><?php echo $list['first_grade']; ?></td>
                        <td align="center"><?php echo $list['second_grade']; ?></td>
                    </tr>
                    <?php } 

					?>
                    <tr class="gpa">
                        <td colspan="2">
                            <label>GPA </label>
                            <?php
								
							?>
                        </td>
                        <td align="center"><?php echo $ggpa; ?></td>
                        <td align="center"><?php echo $ggpa1; ?></td>
                    </tr>
                    <tr>
                        <td class="msg" colspan="6"><marquee>
                            <?php
                            if ($sql) {
                                echo "Select the desired semester which you want to see your grades.";
                            }
                        ?>
                        </marquee></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>