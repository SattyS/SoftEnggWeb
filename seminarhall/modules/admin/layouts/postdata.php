<?php

	$day = $_POST["day"];
	$month = $_POST["month"];
	$year = $_POST["year"];
	$hour = $_POST["hr"];
	$suc = $_POST["success"];
	$cond = $_POST["conduct"];
	$email = $_POST["contact"];
	$pop = $_POST["popularity"];
	$comm = $_POST["comments"];
	
	$con = mysql_connect("localhost","root","");
	if(!$con)
	{
		echo "failure:true; errors:'".mysql_error()."'";
	}
	mysql_select_db("ooad", $con);
	
	$sql = "insert into results values($day,'$month',$year,$hour,1,'$cond','$email',$pop,$comm)"
	
	$res = mysql_query($sql);
	
	if($res)
	{
		echo "success:true";
	}
	else
	{
		echo "failure:true";
	}
	
	mysql_close($con);

?>