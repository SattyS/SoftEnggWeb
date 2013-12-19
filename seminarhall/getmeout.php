<?php

	include("modules/accounts/logclass.php");
	$obj = new Logclass;
	
	$res = $obj -> logout();
	
	if( $res )
	{		
		
		header("Location: index.php");
		//echo "<meta http-equiv=\"refresh\" content=\"5;index.php\" />";
		
	}
	else
	{
		echo "Incorrect Password";
	}

?>