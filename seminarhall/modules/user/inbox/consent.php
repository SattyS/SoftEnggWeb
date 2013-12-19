<?php
 
	$con= mysql_connect("localhost","root","") or die("could not connect to database".mysql_error());
	mysql_select_db("ooad",$con);
	$val=$_GET['name'];
	$dt=$_GET['datetym'];
	$hr_det=$_GET['hr_val'];
	$fd=$_GET['from_det'];
	$da=strtok($dt,"-");
	//echo $da;
	$month=strtok("-");
	$year=strtok(" ");
	//echo $month;
	$var=date("Y-m-d");
	
	$yr=strtok($var,"-");
	$mnth=strtok("-");
	//echo $mnth;
	$day=strtok(" ");
	 //echo $m;
	if($yr>$year)
	{
		$flagg=10;
	}
	else if($yr==$year)
	{
		if($mnth>$month)
		$flagg=10;
		else if($mnth==$month)
		{
			if($day>=$da)
			$flagg=10;
			else
			$flagg=20;
		}	
		else
		$flagg=20;	
	}
	else
	$flagg=20;
	//echo $flagg;	
			
	$user = $_COOKIE["locuser"];
	
	$sql5="select * from `ooad`.`mailer` where day=\"$da\" and month=\"$month\" and year=\"$year\" and hour=\"$hr_det\" and status=1 and `mailer`.`from` not like '".$fd."'";
    $result5 = mysql_query($sql5, $con) or die("Mysql query failed" . mysql_error()); 
    $row5 = mysql_fetch_array($result5);
	$flaggg=0;
	/*print '<script type="text/javascript">alert("'.$row5['from'].'")</script>';*/
		
	if($row5!=0)
	{
	  print '<script type="text/javascript">alert("Sorry sir! u have already consented the seminar hall for a different meeting ")</script>';
	  $flaggg=1;
	}
	if($flagg==20&& $flaggg==0)
	{
	$sql_stat="select * from `ooad`.`mailer` WHERE `mailer`.`mid` = \"$val\"";
	$result=mysql_query($sql_stat,$con) or die("mysql query failed" .mysql_error());
	$row=mysql_fetch_array($result);
	$sender=$row['from'];
	$sql3="select * from `ooad`.`login`,`ooad`.`faculty` WHERE `login`.username= \"$sender\" and `login`.facultyid=`faculty`.facultyid";
	$result2=mysql_query($sql3,$con) or die("mysql query failed" .mysql_error());
	$row2=mysql_fetch_array($result2);
	$desti=$row2['mailid'];
	$hour = time() + 3600;
		setcookie( "toaddr", $desti, $hour );
	$stat=$row['status'];
	    setcookie( "agreement",$stat,$hour);	
	if($stat==0)
	 $sql = "UPDATE `ooad`.`mailer` SET `status` = 1 WHERE `mailer`.`mid` = \"$val\"";
	else
	 $sql = "UPDATE `ooad`.`mailer` SET `status` = 0 WHERE `mailer`.`mid` = \"$val\"";
	 mysql_query($sql, $con) or die("Mysql query failed" . mysql_error());
	 
 	mysql_close($con);
	include("smtp/SendingEmailByGmailAccount/email.php");
	}
	
	else
	{
	 if($flagg!=20)
	  print '<script type="text/javascript">alert("past meetings cannot be consented")</script>';
	} 
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=inbox.php">';
	 
	//header( 'Location: http://localhost/seminarhall/modules/user/inbox/inbox.php' );
?>