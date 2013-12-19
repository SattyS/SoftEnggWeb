<?php

class Logclass
{
	function login($sub_user, $sub_pass)
	{		
		$dbase = "ooad";
		$ret = false;
		
		//echo "in login<br />";
		$con = mysql_connect("localhost", "root", "");
	
		if(!$con)
		{
			die("Could not connect to the database" . mysql_error());
		}
		
		mysql_select_db($dbase, $con);
		
		$sql_qry = "select password from login where username = '$sub_user'";
	
		$result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
	
		$row = mysql_fetch_array($result);
			
		if(strcmp($sub_pass, $row['password']) == 0)
		{
			//echo $sub_user.",". $sub_pass.",".$row['password'];
			$ret = true;
		}
		else
		{
			return false;
		}
		
		$hour = time() + 3600;
		setcookie( "locuser", $sub_user, $hour );
		setcookie( "locpass", $sub_pass, $hour );
		
		mysql_close($con);
		
		return $ret;
	}
	
	function isLoggedIn()
	{
		$dbase = "ooad";
		
		if(isset($_COOKIE['locuser']))
		{
			$sub_user = $_COOKIE['locuser'];
			$sub_pass = $_COOKIE['locpass'];
			
			$con = mysql_connect("localhost", "root", "");
	
			if(!$con)
			{
				die("Could not connect to the database" . mysql_error());
			}
			
			mysql_select_db($dbase, $con);
			
			$sql_qry = "select password from login where username = '$sub_user'";
		
			$result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
		
			$row = mysql_fetch_array($result) or die("Fetching". mysql_error());
				
			if(strcmp($sub_pass, $row['password']) == 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	function logout()
	{
		setcookie("locuser", "", time() - 3600);
		setcookie("locpass", "", time() - 3600);
		
		return true;
	}
}

?>