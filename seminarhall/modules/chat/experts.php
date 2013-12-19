<html>
	<head>
    	<title>
        	Have any questions?
        </title>
        <link rel="stylesheet" href="../../css/style.css" />
        
    </head>
    <body>
    <div id="header">
    <ul>
        
    <li><a href="../../getmeout.php">Logout</a></li>
    <li><a href="#">Chat</a></li>
    <li><a href="../user/outbox/archive.php">Archive</a></li>
    <li><a href="../user/inbox/inbox.php">Inbox</a></li>
    <li><a href="../user/compose/compose.php">New</a></li> 
    <li><a href="../user/mainmenu/members.php">Menu</a></li>      
    
	</ul>
    	<img src="../../images/logo.gif" />
    </div>
    <hr color="#666666" size="1px" />
    
    <div id="bodymainmiddlePan">
    <?php
	
	include("../accounts/logclass.php");
	$obj1 = new Logclass;
	
	$result1 = $obj1 -> isLoggedIn();
	
	if( $result1 )
	{		
		include("index.php");
	}
	else
	{
		echo "Please login <a href='../../index.php'>here</a>";
	}
	
	?>
    </div>
    </body>
</html>