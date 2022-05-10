<?php

	$conn = new mysqli("localhost", "root", "", "18-sibenice");
	if($conn->connect_error){
		die("Connection failed");
	}
	$conn->set_charset("utf8");

?>
