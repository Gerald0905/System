<?php

$conn = mysqli_connect("localhost","root","");
if(!$conn){
	die("Cannot connect" . mysqli_error());
}
mysqli_select_db($conn, "portal_db") or die("cannot connect to the DB");
?>