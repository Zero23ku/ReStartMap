<?php
	$servername = "localhost";
	$username = "zero23ku";
	$password = "hitori666";

	$conn = new mysqli ($servername,$username,$password);

	if($conn->connect_error){
		die("Connection failes: " . $conn->connect_error);
	}
?>