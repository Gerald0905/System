<?php 

session_start();

if(session_destroy()){	?>
	<script type="text/javascript">
		window.alert("You have been disconnected from the site. Thank you.");

	</script>
<?php 
	header("location: Login/studentLogin.php");
}

 ?>