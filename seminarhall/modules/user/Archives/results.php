<html>
	<head>
    	<title>
        	Inbox
        </title>
        <link rel="stylesheet" href="../../../css/style.css" />
    </head>
    <body>
    
    <div id="header">
       <ul>
        
    <li><a href="../../../getmeout.php">Logout</a></li>
    <li><a href="../../chat/experts.php">Chat</a></li>
    <li><a href="results.php">Archive</a></li>
    <li><a href="../inbox/inbox.php">Messages</a></li>
    <li><a href="../compose/compose.php">New</a></li> 
    <li><a href="../mainmenu/members.php">Menu</a></li>      
    
</ul>
    	<img src="../../../images/logo.gif" />
    </div>
    <hr color="#666666" size="1px" />
    
   
    <?php
			include("../../accounts/logclass.php");
			$obj = new Logclass;
			
			$result = $obj -> isLoggedIn();
			
			if( $result )
			{
	?>
	<div id="menu">
		<ul>
			<li class="active"><a href="results.php" accesskey="1" title="">Outcomes</a></li>
			<li><a href="circular.php" accesskey="2" title="">File-download</a></li>
			<li><a href="upload.php" accesskey="2" title="">File-upload</a></li>
		</ul>
	</div>
	 <table id="hor-minimalist-b" summary="Employee Pay Sheet">
    <thead>
    	<tr>
        	<th width="2%" scope="col" style="visibility: hidden"></th>
			<th width="24%" scope="col">Event</th>
            <th width="20%" scope="col">Strength</th>
            <th width="6%" scope="col">Result</th>
            <th width="48%" scope="col">Comment</th>
        </tr>
    </thead>
    <tbody>
        
        <?php			
			include("resultlist.php");		
		?>
        
    </tbody>
</table>
<?php
			}
			else
			{
				echo "Please login <a href='../../../index.php'>here</a>";
			}
			
			?>
	</div>
    
    </body>
</html>