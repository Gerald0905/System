<?php 
	include('../dbconnect.php');

	if (isset($_REQUEST['uploadFirstGrade1'])) {
        $tid = $_POST['teacher_id'];

        for ($x = 0; $x < count($_POST['stud_id_advisee']); $x++) {
            $insertGrade = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET first_grade = '".$_POST['grades'][$x]."' WHERE es_ID = '".$_POST['es_idd'][$x]."' AND stud_lrn = '".$_POST['stud_lrn'][$x]."' AND semester = '".$_POST['semester'][$x]."'");
        }

        ?>

        <script type="text/javascript">
            alert("You have uploaded the grades of your student.");
            window.location = "teacheradvisees.php?tid=<?php echo $tid; ?>";
        </script>

        <?php
	}

	if (isset($_REQUEST['uploadSecondGrade1'])) {
        $tid = $_POST['teacher_id'];
        
        for ($x = 0; $x < count($_POST['stud_id_advisee']); $x++) {
            $insertGrade = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET second_grade = '".$_POST['grades'][$x]."' WHERE es_ID = '".$_POST['es_idd'][$x]."' AND stud_lrn = '".$_POST['stud_lrn'][$x]."' AND semester = '".$_POST['semester'][$x]."'");
        }

        ?>

        <script type="text/javascript">
            alert("You have uploaded the grades of your student.");
            window.location = "teacheradvisees2.php?tid=<?php echo $tid; ?>";
        </script>

        <?php
	}


?>