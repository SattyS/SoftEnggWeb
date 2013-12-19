<?php

//Send email in PHP by Gmail
//==============================
//For the send email in PHP by Gmail id, I've used phpmailer class.
//see the full code in zip file.
//php_openssl must be commented in the php.ini file.


   //echo $_COOKIE["toaddr"];
   $temp=$_COOKIE['toaddr'];
   $temp1=$_COOKIE['agreement'];
   
   
	require_once('phpgmailer/class.phpgmailer.php');
	$mail = new PHPGMailer();
	$mail->IsHTML(true);
	$mail->Username = 'sathishroxxx@gmail.com';
	$mail->Password = 'qzpm1234';
	$mail->From = 'sathishroxxx@gmail.com';
	$mail->FromName='Staff';
	$mail->Subject = 'Meeting Request Reg';
	$mail->AddAddress("$temp");
	if($temp1==1)
	{
	 $mail->Body = "<h1>Meeting Request Approved</h1>";
	}
	else
	 {
	  $mail->Body = "<h1>Meeting Request Denied</h1>";
	 }
	$mail->Send();
	
?>