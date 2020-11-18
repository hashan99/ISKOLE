<?php
	$Grade = $_POST['Grade'];
	$Subject = $_POST['Subject'];
	$Topic_no = $_POST['Topic_no'];
	$Topic = $_POST['Topic'];
	$Further_Reading = $_POST['Further_Reading'];
	$Presentation = $_POST['Presentation'];
	$Areas = $_POST['Areas'];

	// Database connection
	$connection = new mysqli('localhost','root','','iskole');
	if($connection->connect_error){
		echo "$connection->connect_error";
		die("Connection Failed : ". $connection->connect_error);
	} else {
		$stmt = $connection->prepare("insert into content(Grade, Subject, Topic_no, Topic, Further_Reading, Presentation, Areas) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isissss", $Grade, $Subject, $Topic_no, $Topic, $Further_Reading, $Presentation, $Areas);
		$execval = $stmt->execute(); 
		echo $execval;
		echo "Content added successfully!";
		$stmt->close();
		$connection->close();
	}
?>