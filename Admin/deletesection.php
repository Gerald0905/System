<?php
include("../dbconnect.php");

$secid = $_GET['secid'];

$delSection = mysqli_query($conn, "DELETE FROM tbl_section WHERE section_ID = '$secid'");

?>
<script type="text/javascript">
	alert("The selected section has been deleted.");
	window.location="sectionslist.php";
</script>	