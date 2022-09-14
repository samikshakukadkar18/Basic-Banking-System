<?php

	$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "banking_system";

// Creating a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

	if(!$conn){
		die("Can't connect to the database because: ".mysqli_connect_error());
	}

?>
