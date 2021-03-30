<?php 
	include '../../../connection.php'; 
	include 'mailer.php';	//PHPMailer

	if(isset($_GET['id']))
	{
		$decline_id = $_GET['id'];

		$sql_get = mysqli_query($con,"SELECT * FROM new_teacher_notifications WHERE id='$decline_id'");
		$main_result = mysqli_fetch_assoc($sql_get);

		$email = $main_result['email'];
		$t_decline_mail -> AddAddress($email);	//PHPMailer

		$sql_delete = mysqli_query($con,"DELETE FROM new_teacher_notifications WHERE id='$decline_id'");
		if($sql_delete)
		{
			$t_decline_mail -> Send();
			header('location: view_teacher_notifications.php');
		}
		else
		{
			echo mysqli_error($con);
		}
	}
?>
