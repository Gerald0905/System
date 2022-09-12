<?php

include("dbconnect.php");
@ob_start();
session_start();

if(isset($_REQUEST['studSubmit'])){
	$stud_lrn = mysqli_real_escape_string($conn, $_POST['stud_lrn']);
	$password = mysqli_real_escape_string($conn, $_POST['stud_password']);
	$stud_password = md5($password);

	$studresult = mysqli_query($conn, "SELECT * FROM tbl_studentaccount WHERE stud_lrn = '$stud_lrn' AND stud_password = '$stud_password'");

	if($studresult){
		if(mysqli_num_rows($studresult) > 0){

			session_regenerate_id();
			$stud = mysqli_fetch_assoc($studresult);
			$_SESSION['sid'] = $stud['stud_ID'];
			session_write_close();
				header("location: Student/dashboard_stud.php");
			exit();
		}
		else{	?>
			<script type="text/javascript">
				alert("You entered invalid credentials. Please contact your teacher or the web admin for further assistance. Thank you.");
				window.location = "Login/studentLogin.php";
			</script>	<?php
			exit();
		}
	}
	else{
		die("Failed");
	}

}

if(isset($_REQUEST['adminSubmit'])){

	$admin_username = mysqli_real_escape_string($conn, $_POST['admin_username']);
	$password = mysqli_real_escape_string($conn, $_POST['admin_password']);
	$admin_password = md5($password);

	$adminresult = mysqli_query($conn, "SELECT * FROM tbl_adminaccount WHERE admin_username = '$admin_username' AND admin_password = '$admin_password' AND admin_status = 'Active'");

	if($adminresult){

		if(mysqli_num_rows($adminresult) > 0){

			session_regenerate_id();
			$admin = mysqli_fetch_assoc($adminresult);
			$_SESSION['aid'] = $admin['admin_ID'];
			session_write_close();
				header("location: Admin/admindashboard.php");
			exit();
		}
		else{	?>
			<script type="text/javascript">
				alert("Access denied. Either you enter an invalid or inactive account. Please try again.");
				window.location = "Login/adminLogin.php";
			</script>	<?php
			exit();
		}
	}
	else{
		die("Failed");
	}

}

if(isset($_REQUEST['teacherSubmit'])){
	$teacher_username = mysqli_real_escape_string($conn, $_POST['teacher_username']);
	$password = mysqli_real_escape_string($conn, $_POST['teacher_password']);
	$teacher_password = md5($password);

	$teacherresult = mysqli_query($conn, "SELECT * FROM tbl_teacheraccount as t1 inner join tbl_teacher as t2 on t1.teacher_ID = t2.teacher_ID WHERE t1.teacher_username = '$teacher_username' AND t1.teacher_password = '$teacher_password' AND t2.teacher_status = 'Active'");

	if($teacherresult){

		if(mysqli_num_rows($teacherresult) > 0){

			session_regenerate_id();
			$teacher = mysqli_fetch_assoc($teacherresult);
			$_SESSION['tid'] = $teacher['teacher_ID'];
			session_write_close();
				header("location: Teacher/dashboard_teacher.php");
			exit();
		}
		else{	?>
			<script type="text/javascript">
				alert("Invalid credentials. For further assistance, please contact the system's web master.");
				window.location = "Login/teacherLogin.php";
			</script>	<?php
			exit();
		}
	}
	else{
		die("Failed");
	}

	}
	if(isset($_REQUEST['subteacherSubmit'])){
		$teacher_username = mysqli_real_escape_string($conn, $_POST['teacher_username']);
		$password = mysqli_real_escape_string($conn, $_POST['teacher_password']);
		$teacher_password = md5($password);
	
		$teacherresult = mysqli_query($conn, "SELECT * FROM tbl_subteacheraccount as t1 inner join tbl_subjectteacher as t2 on t1.subteacher_ID = t2.teacher_ID WHERE t1.teacher_username = '$teacher_username' AND t1.teacher_password = '$teacher_password' AND t2.teacher_status = 'Active'");
	
		if($teacherresult){
	
			if(mysqli_num_rows($teacherresult) > 0){
	
				session_regenerate_id();
				$teacher = mysqli_fetch_assoc($teacherresult);
				$_SESSION['stid'] = $teacher['subteacher_ID'];
				session_write_close();
					header("location: Subject_teacher/subteacherdashboard.php");
				exit();
			}
			else{	?>
				<script type="text/javascript">
					alert("Invalid credentials. For further assistance, please contact the system's web master.");
					window.location = "Login/teacherLogin.php";
				</script>	<?php
				exit();
			}
		}
		else{
			die("Failed");
		}
	
		}

?>