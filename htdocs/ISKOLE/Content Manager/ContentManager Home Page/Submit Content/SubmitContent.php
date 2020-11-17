<?php
	$Grade = $_POST['Grade'];
	$Subject = $_POST['Subject'];
	$Topic_no = $_POST['Topic_no'];
	$Topic = $_POST['Topic'];
	$Furthur_Reading = $_POST['Furthur_Reading'];
	$File = $_POST['File'];
	

	// Database connection
	$connection = new mysqli('localhost','root','','project');
	if($connection->connect_error){
		echo "$connection->connect_error";
		die("Connection Failed : ". $connection->connect_error);
	} else {
		$stmt = $connection->prepare("insert into content_new(Grade, Subject, Topic_no, Topic, Furthur_Reading, File) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isisss", $Grade, $Subject, $Topic_no, $Topic, $Furthur_Reading, $File);
		$execval = $stmt->execute(); 
		echo $execval;
		echo "Content added successfully!";
		$stmt->close();
		$connection->close();
	}
?>