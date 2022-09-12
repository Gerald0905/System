<?php
include("../dbconnect.php");

$sid = $_GET['sid'];

$delStud = mysqli_query($conn, "DELETE FROM tbl_student WHERE stud_ID = '$sid'");
$delStud1 = mysqli_query($conn, "DELETE FROM tbl_enrolledsubjects WHERE stud_ID = '$sid'");
$delStudAccount = mysqli_query($conn, "DELETE FROM tbl_studentaccount WHERE stud_ID = '$sid'");

?>

<script type="text/javascript">
	alert("The registered student information and account has been deleted.");
	window.location="studentslist.php";
</script>	



