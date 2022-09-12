<?php
include("../dbconnect.php");

$sid = $_POST['strands_ID'];
$subject_ID = $_POST['subject_ID'];

	if ($sid == '1') {
	$sql = mysqli_query($conn, "SELECT * FROM tbl_abmsubjects WHERE subject_ID = '$subject_ID'");
	$rec = mysqli_fetch_assoc($sql);
	}
	elseif ($sid == '2') {
		$sql = mysqli_query($conn, "SELECT * FROM tbl_humsssubjects WHERE subject_ID = '$subject_ID'");
		$rec = mysqli_fetch_assoc($sql);
	}
	elseif ($sid == '3') {
		$sql = mysqli_query($conn, "SELECT * FROM tbl_gassubjects WHERE subject_ID = '$subject_ID'");
		$rec = mysqli_fetch_assoc($sql);
	}
	elseif ($sid == '4') {
		$sql = mysqli_query($conn, "SELECT * FROM tbl_csssubjects WHERE subject_ID = '$subject_ID'");
		$rec = mysqli_fetch_assoc($sql);
	}
	elseif ($sid == '5') {
		$sql = mysqli_query($conn, "SELECT * FROM tbl_ccssubjects WHERE subject_ID = '$$subject_ID'");
		$rec = mysqli_fetch_assoc($sql);
	}
	elseif ($sid == '6') {
		$sql = mysqli_query($conn, "SELECT * FROM tbl_technicaldraftingsubjects WHERE subject_ID = '$subject_ID'");
		$rec = mysqli_fetch_assoc($sql);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alter Subjects</title>
	<meta name="viewport" content="width=device-width, initial-scale =1.0">
</head>
<body>
	<?php
		include('navbar.php')
	?>
	<div class="container">
		<div class="header">
			<h4>Managing Subject</h4>
		</div>

		<div class="content">
			<form method="post">
				<table>
					<tr>
						<td class="head">Subject Name</td>
						<td>
							<input type="text" name="subject_name" value="<?php echo $rec['subject_name']; ?>">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>
