<?php

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Bank_System";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	if($conn){
		echo "Connected<br>";
	} else {
		die("Error".mysqli_connect_error($conn));
	}
