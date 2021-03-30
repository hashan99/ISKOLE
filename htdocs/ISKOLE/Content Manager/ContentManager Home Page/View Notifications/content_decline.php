<?php 
	include '../../../connection.php';
	// include 'mailer.php';

	if(isset($_GET['id']))
	{
		$decline_id = $_GET['id'];

		$sql_delete = mysqli_query($con,"DELETE FROM new_content_notifications WHERE id='$decline_id'");
		if($sql_delete)
		{
			header('location: view_content_notifications.php');
		}
		else
		{
			echo mysqli_error($con);
		}
	}
?>
