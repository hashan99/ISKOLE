<?php 
	
	require_once('PHPMailer/PHPMailerAutoload.php');

	$t_accept_mail = new PHPMailer();
	$t_accept_mail -> isSMTP();
	$t_accept_mail -> SMTPAuth = true;
	$t_accept_mail -> SMTPSecure = 'ssl';
	$t_accept_mail -> Host = 'smtp.gmail.com';
	$t_accept_mail -> Port = '465';
	$t_accept_mail -> isHTML();
	$t_accept_mail -> Username = 'groupprojectgroup20@gmail.com';
	$t_accept_mail -> Password = 'iscole123';
	$t_accept_mail -> SetFrom('no-reply@iskole.org');
	$t_accept_mail -> Subject = 'Teacher Registration Completed!!';
	$t_accept_mail -> Body = 'Admin has been approved your teacher registration request of ISKOLE !!';
	// $t_accept_mail -> AddAddress($email1);

	$t_decline_mail = new PHPMailer();
	$t_decline_mail -> isSMTP();
	$t_decline_mail -> SMTPAuth = true;
	$t_decline_mail -> SMTPSecure = 'ssl';
	$t_decline_mail -> Host = 'smtp.gmail.com';
	$t_decline_mail -> Port = '465';
	$t_decline_mail -> isHTML();
	$t_decline_mail -> Username = 'groupprojectgroup20@gmail.com';
	$t_decline_mail -> Password = 'iscole123';
	$t_decline_mail -> SetFrom('no-reply@iskole.org');
	$t_decline_mail -> Subject = 'Teacher Registration Failed!!';
	$t_decline_mail -> Body = 'Admin has been declined your teacher registration request of ISKOLE !!';
	// $t_decline_mail -> AddAddress($email2);

	// $mail -> Send();

?>