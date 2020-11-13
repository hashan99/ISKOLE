<?php 

	$host = "localhost";
	$userName = "root";
	$password = "";
	$db = "iskole";

	$con = mysqli_connect($host, $userName, $password, $db);

	if($con)
	{
		//echo "Connection Successfull!";
	}
	else
	{
		echo "connection Failed!";
	}

?>