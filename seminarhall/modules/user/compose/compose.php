<html>
	<head>
    	<title>
        	New Meeting
        </title>
        <link rel="stylesheet" href="../../../css/style.css" />
    </head>
    <body>
    
    <div id="header">
    <ul>
        
    <li><a href="../../../getmeout.php">Logout</a></li>
    <li><a href="../../chat/experts.php">Chat</a></li>
    <li><a href="../Archives/results.php">Archive</a></li>
    <li><a href="../inbox/inbox.php">Messages</a></li>
    <li><a href="compose.php">New</a></li> 
    <li><a href="../mainmenu/members.php">Menu</a></li>      
    
   </ul>	
	<img src="../../../images/logo.gif" />
    </div>
    <hr color="#666666" size="1px" />
    
    <div id="bodymainmiddlePan">
    	<?php
			include("../../accounts/logclass.php");
			$obj = new Logclass;
			
			$result = $obj -> isLoggedIn();
			
			if( $result )
			{
				include("inputform.php");
			}
			else
			{
				echo "Please login <a href='../../../index.php'>here</a>";
			}
		?>
	</div>
    
    </body>
</html>