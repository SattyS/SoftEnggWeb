<html>
	<head>
    	<meta http-equiv="cache-control" content="no-cache"> <!-- tells browser not to cache -->
<meta http-equiv="expires" content="0"> <!-- says that the cache expires 'now' -->
<meta http-equiv="pragma" content="no-cache"> <!-- says not to use cached stuff, if there is any -->
    	<title>
        	Members Area
        </title>
    </head>
    <body>
    
    <?php
	
	include("../../accounts/logclass.php");
	$obj = new Logclass;
	
	$result = $obj -> isLoggedIn();
	
	if( $result )
	{		
		include("pageone.php");
	}
	else
	{
		echo "Please login <a href='../../../index.php'>here</a>";
	}
	
	?>
    </body>
</html>