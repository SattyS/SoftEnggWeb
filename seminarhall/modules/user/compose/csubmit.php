<?php

	include("../../accounts/logclass.php");
	$obj = new Logclass;
	
	$result = $obj -> isLoggedIn();
	
	if( $result )
	{
		$con = mysql_connect("localhost", "root", "");
		
		if(! $con)
		{
			die("Could not connect to the database" . mysql_error());
		}
		
		mysql_select_db("ooad", $con);
		
		
		
		$toi = $_POST['To_details'];
		$sub = $_POST['title'];
		$ts=$_POST['timestamp'];
		$pr = $_POST['pres'];
		$xy=$_POST['selecttype'];
		$inter = $_POST["branch"];
		$comm = $_POST['expand'];
		$sid=$_POST['semid'];
		 
			
		$user = $_COOKIE["locuser"];
		
		$day=strtok($ts,"-");
		$mnth=strtok("-");
		$yr=strtok(" ");
		
		
		
		
		
		
		if($xy==1)
		 $mtype='General';
		else if($xy==2)
		 $mtype='Committee';
		else if($xy==3)
		 $mtype='Specialized';
		else
		 $mtype='Discussion';
		 
		 $sql1="select * from `ooad`.`faculty`";
		 
		$result = mysql_query($sql1, $con) or die("Mysql query failed" . mysql_error());
		
		$ctrl=2;
		while($row = mysql_fetch_array($result))
		{
		  if($ctrl==$toi)
		   $tos=$row['facultyid'];
		  $ctrl=$ctrl+1;
		}
		$sql2="select * from `ooad`.`login` where `login`.`facultyid`=\"$tos\"";
		$result1 = mysql_query($sql2, $con) or die("Mysql query failed" . mysql_error());
		$row = mysql_fetch_array($result1);
		$toid=$row['username'];
		
		if(isset($_POST['checkbox1']))
			$c1=1;
		if(isset($_POST['checkbox2']))
			$c2=1;		
		if(isset($_POST['checkbox3']))
			$c3=1;
		if(isset($_POST['checkbox4']))
			$c4=1;
		
		$arr=array();
		
		if($c1==1)
		 $arr[]='BE';
		if($c2==1)
		 $arr[]='MCA';
		if($c3==1)
		 $arr[]='ME';
		 if($c4==1)
		 $arr[]='others';
		 
		 $clas=implode(" ",$arr);
		 
		 $hr_arr=array();
		 
		 if(isset($_POST['hr1']))
			$hr_arr[]=1;
		 if(isset($_POST['hr2']))
			$hr_arr[]=2;
		 if(isset($_POST['hr3']))
			$hr_arr[]=3;
		 if(isset($_POST['hr4']))
			$hr_arr[]=4;
		 if(isset($_POST['hr5']))
			$hr_arr[]=5;
		 if(isset($_POST['hr6']))
			$hr_arr[]=6;
		 if(isset($_POST['hr7']))
			$hr_arr[]=7;	
		 if(isset($_POST['hr8']))
			$hr_arr[]=8;		
		$flag=0;
		$flagg=0;
		$com='Discussion';
		if($xy!=4)
		{
		foreach($hr_arr as $hrss)
		{	
		 $sql5="select * from `ooad`.`mailer` where day=\"$day\" and month=\"$mnth\" and year=\"$yr\" and hour=\"$hrss\" and status=1 ";
		 $result5 = mysql_query($sql5, $con) or die("Mysql query failed" . mysql_error()); 
		 $row5 = mysql_fetch_array($result5);
		 if($row5!=0)
		  $flag=1;
		}
		
		if($flag==1)
		{
		 print '<script type="text/javascript">alert("The booking session you mentioned is unavailable")</script>';
		}
		foreach($hr_arr as $hrsss)
		{	
		 $sql6="select * from `ooad`.`mailer` where day=\"$day\" and month=\"$mnth\" and year=\"$yr\" and hour=\"$hrsss\" and `mailer`.`from` like '".$user."'";
		 $result6 = mysql_query($sql6, $con) or die("Mysql query failed" . mysql_error()); 
		 $row6 = mysql_fetch_array($result6);
		 if($row6!=0)
		  {
		   $flagg=1;
		    
		  }	
		}
		if($flagg==1)
		{
		 print '<script type="text/javascript">alert("You have already booked for the same date and hour")</script>';
		}
		}
		if($flagg==0 && $flag==0)
		{  
		 foreach($hr_arr as $hrs)
		 {
			$sql = "INSERT INTO `ooad`.`mailer` (`mid`, `mtime`, `from`, `to`, `subject`, `day`, `month`, `year`, `hour`,`type`, `comments`,   `class`, `semid`,`status`) VALUES (NULL, CURRENT_TIMESTAMP, '$user', '$toid', '$sub', '$day', '$mnth', '$yr', '$hrs','$mtype','$comm','$clas', '$sid',0);";
		
			//echo $sql;
		
			mysql_query($sql) or die("failed" . mysql_error());
		 }
		 foreach($hr_arr as $hrs)
		 {
			$sql = "INSERT INTO `ooad`.`mailer` (`mid`, `mtime`, `from`, `to`, `subject`, `day`, `month`, `year`, `hour`,`type`, `comments`,   `class`, `semid`,`status`) VALUES (NULL, CURRENT_TIMESTAMP, '$user', 'HOD', '$sub', '$day', '$mnth', '$yr', '$hrs','$mtype','$comm','$clas', '$sid',0);";
		
			//echo $sql;
		
			mysql_query($sql) or die("failed" . mysql_error());
		 }
		mysql_close($con);
		
		echo "<img src=\"../../../lib/extjs/resources/images/default/shared/large-loading.gif\" />loading......";
		}
		echo '<META HTTP-EQUIV="Refresh" Content="1; URL=compose.php">';
		
       	
	}
	else
	{
		echo "Please login <a href='index.php'>here</a>";
	}

?>

