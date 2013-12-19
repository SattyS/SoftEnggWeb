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
    <li><a href="../Archives/results.php">Archive</a></li>
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
			<li><a href="../inbox/inbox.php" accesskey="1" title="">Inbox</a></li>
			<li class="active"><a href="archive.php" accesskey="2" title="">Outbox</a></li>
			<li><a href="../autotemplate/template.php" accesskey="3" title="">Circular</a></li>
			<li><a href="../status/status.php" accesskey="4" title="">Hall status</a></li>
		</ul>
	</div>
    <table id="hor-minimalist-b" summary="Employee Pay Sheet">
    <thead>
    	<tr>
        	<th width="11%" scope="col">To</th>
            <th width="14%" scope="col">Subject</th>
            <th width="33%" scope="col">Reason</th>
            <th width="14%" scope="col">Attending People</th>
            <th width="14%" scope="col">Date</th>
            <th width="6%" scope="col">Hour</th>
            <th width="8%" scope="col">Decision</th>
            
        </tr>
    </thead>
    <tbody>
        
        <?php			
			include("archivelist.php");		
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