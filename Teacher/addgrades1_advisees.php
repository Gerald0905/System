<?php 
	include('../dbconnect.php');

	if (isset($_REQUEST['uploadFirstGrade'])) {
		$es_id = mysqli_real_escape_string($conn, $_POST['es_idd']);
		$stud_lrn = mysqli_real_escape_string($conn, $_POST['stud_lrn']);
		$grade = mysqli_real_escape_string($conn, $_POST['grade']);

		$insertGrade = mysqli_query($conn, "UPDATE tbl_enrolledsubjects SET first_grade = '$grade' WHERE es_ID = '$es_id' AND stud_lrn = '$stud_lrn'");

		if ($insertGrade) { ?>
			<script type="text/javascript">
				alert("You have uploaded the grade of the student.");
				window.location = "mystudent.php";
			</script>
	<?php }
	}
?>