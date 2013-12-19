<html>
	<head>
    	<meta http-equiv="cache-control" content="no-cache"> <!-- tells browser not to cache -->
<meta http-equiv="expires" content="0"> <!-- says that the cache expires 'now' -->
<meta http-equiv="pragma" content="no-cache"> <!-- says not to use cached stuff, if there is any -->
    	<title>
        	Inbox
        </title>
        <link rel="stylesheet" href="../../../css/style.css" />
		<script language="JavaScript" src="../compose/ts_picker.js">

//Script by Denis Gritcyuk: tspicker@yahoo.com
//Submitted to JavaScript Kit (http://javascriptkit.com)
//Visit http://javascriptkit.com for this script

</script>
<script type="text/javascript" src="../../../lib/forms/prettyForms.js"></script>
	<link rel="stylesheet" href="../../../css/prettyForms.css" type="text/css" media="screen" />
    </head>
    <body onLoad="prettyForms()">
    
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
			<li><a href="archive.php" accesskey="2" title="">Outbox</a></li>
            <li><a href="../autotemplate/template.php" accesskey="3" title="">Circular</a></li>
			<li class="active"><a href="../getStatus/getstatus.php" accesskey="4" title="">Hall status</a></li>
		</ul>
	</div>
	<div id="getstatus_date">
	<form id="myForm" name="form_meet" method="post" action="statusget.php">
    <label>Date: </label>
			<input name="timestamp" type="text" value="" />&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="javascript:show_calendar('document.form_meet.timestamp', document.form_meet.timestamp.value);"><img src="../compose/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a><br><br><br>
			<p><input type="submit" value="check inputs" /></p>
    </form>
	</div>
	
	<?php
			}
			else
			{
				echo "Please login <a href='../../../index.php'>here</a>";
			}
			
			?>

   </body>
 </html>
 
 