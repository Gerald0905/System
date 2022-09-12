<?php

ob_start();
session_start();
	
	if(!isset($_SESSION['sid']) || (trim($_SESSION['sid'])=='')){
		?>

				<script type="text/javascript">
				alert("Unauthorized Access to Page!");
				window.location="studentLogin.php";
				</script>
		<?php
			exit();

	}


?>