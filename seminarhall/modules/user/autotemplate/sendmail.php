<?php

//Send email in PHP by Gmail
//==============================
//For the send email in PHP by Gmail id, I've used phpmailer class.
//see the full code in zip file.
//php_openssl must be commented in the php.ini file.


   $temp=$_COOKIE['toaddr'];
   $temp1=$_COOKIE['agreement'];
   
  
   
	//$temp1='gaandu';
	require_once('phpgmailer/class.phpgmailer.php');
	$mail = new PHPGMailer();
	$mail->IsHTML(true);
	$mail->Username = 'sathishrox@gmail.com';
	$mail->Password = 'ceg20072201';
	$mail->From = 'sathishrox@gmail.com';
	$mail->FromName='HOD';
	$mail->Subject = 'seminar hall consent';
	$mail->AddAddress("$temp");
	if($temp1==1)
	{
	 $mail->Body = "<h1> i permit u ..:-P :) :-)</h1>";
	}
	else
	 {
	  $mail->Body = "<h1> i denied ur requisition  .. :( x-( </h1>";
	 }
	$mail->Send();
	
?>