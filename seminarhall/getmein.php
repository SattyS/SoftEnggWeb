<?php

	include("modules/accounts/logclass.php");
	$obj = new Logclass;
	
	$result = $obj -> login($_POST['user'], $_POST['pass']);
	
	if( $result )
	{		
		header("Location: modules/user/mainmenu/members.php");
	}
	else
	{
		echo "Incorrect Password";
	}

?>