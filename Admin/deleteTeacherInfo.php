<?php
include("../dbconnect.php");

$tid = $_GET['tid'];


$delTeacher = mysqli_query($conn, "DELETE FROM tbl_teacher WHERE teacher_ID = '$tid'");

$delteacherAccount = mysqli_query($conn, "DELETE FROM tbl_teacheraccount WHERE teacher_ID = '$tid'");

?>

<script type="text/javascript">
	alert("The registered teacher information and account has been deleted!");
	window.location="teacherslist.php";
</script>	
