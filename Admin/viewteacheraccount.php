<?php
include("../dbconnect.php");

$tid = $_GET['tid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_teacher WHERE teacher_ID = '$tid'");
$rec = mysqli_fetch_assoc($sql);

$max = mysqli_query($conn, "SELECT MAX(teacheraccount_ID) as max FROM tbl_teacheraccount");
$num = mysqli_fetch_assoc($max);

$sql2 = mysqli_query($conn, "SELECT * FROM tbl_teacher as t1 inner join tbl_teacheraccount as t2 on t1.teacher_ID = t2.teacher_ID");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher's Account</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>

	<div class="container">
		<div class="header">
			<h4>Creating Teacher Account Credentials</h4>
		</div>

		<form method="post">
			<table>
				<tr>
					<td>
						<input type="hidden" disabled name="teacheraccount_ID" value="<?php echo $num['max'] + 1; ?>">
						<input type="hidden" name="teacheraccount_ID_hidden" value="<?php echo $num['max'] + 1; ?>">
					</td>
				</tr>
				<tr>
					<td class="head">Teacher ID</td>
					<td><input type="number" readonly name="teacher_ID" value="<?php echo $rec['teacher_ID']; ?>">
					</td>
				</tr>
				<tr>
					<td class="head">Name</td>
					<td><input type="text" readonly name="teacher_name" value="<?php echo $rec['teacher_name']; ?>">
					</td>
				</tr>
				<tr>
					<td class="head">Account Username</td>
					<td><input type="text" required name="teacher_username">
					</td>
				</tr>
				<tr>
					<td class="head">Password</td>
					<td><input type="password" required name="teacher_password"></td>
				</tr>
			</table>
			<div class="footer-links">

				<div class="submit-btn">
					<input type="submit" name="submit" value="Create Account">
								
				</div>

				<div class="back-btn">
					<a href="viewteacher.php?tid=<?php echo $rec['teacher_ID']; ?>">Back</a>
				</div>
							
			</div>

			<?php
				if(isset($_POST['submit'])){
					$teacheraccount_ID = $_POST['teacheraccount_ID_hidden'];
					$teacher_ID = $_POST['teacher_ID'];
					$teacher_username = $_POST['teacher_username'];
					$teacher_password = md5($_POST['teacher_password']);

					$insert = mysqli_query($conn, "INSERT INTO tbl_teacheraccount VALUES ('$teacheraccount_ID', '$teacher_ID', '$teacher_username', '$teacher_password')");

					if($insert){	?>
						<script type="text/javascript">
							alert("Teacher account created");
							window.location = "teacherslist.php"
						</script>	<?php
					}

				}

			?>


		</form>

	</div>

</body>
</html>