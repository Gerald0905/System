<?php
include("../dbconnect.php");

$sid = $_GET['sid'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_studentaccount WHERE stud_ID = '$sid'");
$rec = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Changing Password | Student</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/nav2.css">
	<style type="text/css">
    	*{
	        padding: 0;
	        margin: 0;
	        box-sizing: border-box;
	    }
	    body{
	        background-color: #104a8e;
	    }
		.container{
			margin-top: 5%;
			padding: 20px 20px;
			border: 1px solid #fff;
			border-radius: 10px;
			width: 70rem;
		}
		.header{
			display: flex;
			border-bottom: 5px solid #fff;
			margin-bottom: 2rem;
		}
		.header img{
			height: 40px;
	        width: 0 auto;
	        float: left;
	        margin-top: 2px;
		}
		.header h1{
		   font-weight: 700;
	       font-size: 1.5rem;
	       text-transform: uppercase;
	       color: #fff;
	       background: none;
	       padding: 10px 2rem;
		}
		button{
			margin-top: 1rem;
		}
		button a{
			text-decoration: none;
			color: white;
			opacity: .8;
		}
		input[type="password"]{
			border-radius: 15px;
		}
		button a:hover{
			opacity: 1;
			color: white;
		}
		.btn-warning{
			float: right;
		}
		.col-form-label{
			font-size: .9rem;
			color: #fff;
		}
		.show-password{
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			margin: .8rem 0;
		}
		.rowInput{
			margin-bottom: 2rem;
		}

		@media screen and (max-width:1400px) {
			
		    .container{
		        width: 60rem;
			}
			.header h1{
				font-size: 1.2rem;
				padding: 10px 1rem;
			}
			
		}

    </style>

</head>
<body>
	
	<div class="container">
		<div class="header">
			<img src="../Images/logo.png">
			<h1>Update your Password</h4><br><br>
		</div>
		<div class="content">
			<form method="post">
				<div class="mb-3 row">

				    <label for="inputoldPassword" class="col-sm-2 col-form-label">Old Password:</label>
				    <div class="col-sm-10 rowInput">
				      <input type="password" class="form-control" required name="oldpass" id="inputoldPassword">
				      <input type="hidden" name="originalPass" value="<?php echo $rec['stud_password']; ?>">
				    </div>

				    <label for="inputnewPassword" class="col-sm-2 col-form-label">New Password:</label>
				    <div class="col-sm-10 rowInput">
				      <input type="password" class="form-control" required name="newpass" id="inputnewPassword">
				    </div>

				    <label for="inputnewPassConfirm" class="col-sm-2 col-form-label">Confirm New Password:</label>
				    <div class="col-sm-10 rowInput">
				      <input type="password" class="form-control" required name="confirm_newpass" id="inputnewPassConfirm">
				    </div>

					</script>


				    <div class="button">
				    	<button class="btn btn-secondary" name="back"><a href="studentprofile.php?sid=<?php echo $rec['stud_ID']; ?>">Back</a></button>

				    	<button class="btn btn-warning" name="Update">Update</button>
				    	<?php
				    		if (isset($_POST['Update'])) {
				    		 	$oldPassword = md5($_POST['oldpass']);
				    		 	$originalPass = $_POST['originalPass'];
				    		 	$getNewPassword = ($_POST['newpass']);
				    		 	$newPassword = md5($_POST['newpass']);
				    		 	$confirm_newpass = md5($_POST['confirm_newpass']);

				    		 	$letter = preg_match('@[A-Za-z]@', $getNewPassword);
								$num = preg_match('@[0-9]@', $getNewPassword);
								$special = preg_match('@[^\w]@', $getNewPassword);
								$count = strlen($getNewPassword);

				    		 	if ($oldPassword == $originalPass AND $newPassword == $confirm_newpass AND $count >=10 AND $num AND $special AND $letter) {
				    		 		$passwordUpdate = mysqli_query($conn, "UPDATE tbl_studentaccount SET stud_password = '$newPassword' WHERE stud_ID = '$sid'");

				    		 		if($passwordUpdate){	?>
										<script type="text/javascript">
											alert("Your account password has been updated.");
											window.location="studentprofile.php?sid=<?php echo $rec['stud_ID']; ?>";
										</script> <?php
									}
				    		 	}
				    		 	elseif ($oldPassword == $originalPass AND $newPassword != $confirm_newpass) {	?>
				    		 		<script type="text/javascript">
										alert("Confirm your new password. Try Again.");
										window.location="studPassword.php?sid=<?php echo $rec['stud_ID']; ?>";
									</script> <?php
				    		 	}
				    		 	elseif ($oldPassword != $originalPass AND $newPassword == $confirm_newpass) {
				    		 		?>
				    		 		<script type="text/javascript">
										alert("The old password you entered does not match any data from the system. Please try again.");
										window.location="studPassword.php?sid=<?php echo $rec['stud_ID']; ?>";
									</script> <?php
				    		 	}
				    		 	elseif (!$letter) {
				    		 		?>
				    		 		<script type="text/javascript">
										alert("Your new password does not contain letters. Please try again.");
										window.location="studPassword.php?sid=<?php echo $rec['stud_ID']; ?>";
									</script> <?php
				    		 	}
				    		 	elseif (!$special) {
				    		 		?>
				    		 		<script type="text/javascript">
										alert("Your new password does not contain special characters. Please try again.");
										window.location="studPassword.php?sid=<?php echo $rec['stud_ID']; ?>";
									</script> <?php
				    		 	}
				    		 	elseif ($count < 10) {
				    		 		?>
				    		 		<script type="text/javascript">
										alert("Your new password must contain ten (10) alphanumeric characters. Please try again.");
										window.location="studPassword.php?sid=<?php echo $rec['stud_ID']; ?>";
									</script> <?php
				    		 	}
				    		 } 
				    	?>

				    </div>
			  </div>
			</form>

		</div>
	</div>
</body>
</html>