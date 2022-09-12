<?php
include("../dbconnect.php");

$stid = $_GET['stid'];


$delTeacher = mysqli_query($conn, "DELETE FROM tbl_subjectteacher WHERE teacher_ID = '$stid'");

$delteacherAccount = mysqli_query($conn, "DELETE FROM tbl_subteacheraccount WHERE subteacher_ID = '$stid'");

?>

<script type="text/javascript">
	alert("The registered teacher information and account has been deleted!");
	window.location="subteacherlist.php";
</script>	
