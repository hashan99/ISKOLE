<?php 
	include '../../../connection.php'; 
	// include 'mailer.php';

	if(isset($_GET['id']))
	{
		$accept_id = $_GET['id'];

		$sql_get = mysqli_query($con,"SELECT * FROM new_content_notifications WHERE id='$accept_id'");

		$main_result = mysqli_fetch_assoc($sql_get);

		$grade = $main_result['Grade'];
		$subject = $main_result['Subject'];
		$topic_no = $main_result['Topic_no'];
		$topic = $main_result['Topic'];
		$f_reading = $main_result['Further_Reading'];
		$presentation = $main_result['Presentation'];
		$areas = $main_result['Areas'];

		$sql_accept = mysqli_query($con,"INSERT into content (Grade, Subject, Topic_no, Topic, Further_Reading, Presentation, Areas) VALUES ('$grade','$subject', '$topic_no', '$topic', '$f_reading', '$presentation', '$areas')");
		if($sql_accept)
		{
			$sql_delete = mysqli_query($con,"DELETE FROM new_content_notifications WHERE id='$accept_id'");
			if($sql_delete)
			{
				header('location: view_content_notifications.php');
			}
			else
			{
				echo mysqli_error($con);
			}
		}
		else
		{
			echo mysqli_error($con);
		}
	}
?>
