<?php 
	include '../../../connection.php'; 
	include 'mailer.php';	//PHPMailer

	if(isset($_GET['id']))
	{
		$accept_id = $_GET['id'];

		$sql_get = mysqli_query($con,"SELECT * FROM new_teacher_notifications WHERE id='$accept_id'");
		$main_result = mysqli_fetch_assoc($sql_get);

		$fName = $main_result['first_name'];
		$lName = $main_result['last_name'];
		$subject = $main_result['subject'];
		$medium = $main_result['medium'];
		$email = $main_result['email'];
		$t_accept_mail -> AddAddress($email);	//PHPMailer
		$enPassword = $main_result['password'];
		// $enPassword = sha1($password);


		$sql_accept = mysqli_query($con,"INSERT into teacher (first_name, last_name, subject, medium, email, password) VALUES ('$fName','$lName', '$subject', '$medium', '$email', '$enPassword')");
		if($sql_accept)
		{
			$t_accept_mail -> Send();

			$sql_delete = mysqli_query($con,"DELETE FROM new_teacher_notifications WHERE id='$accept_id'");
			if($sql_delete)
			{
				header('location: view_teacher_notifications.php');
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
