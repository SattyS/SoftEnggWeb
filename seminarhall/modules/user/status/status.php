<html>
	<head>
    	<title>
        	Inbox
        </title>
        <link rel="stylesheet" href="../../../css/style.css" />
		<script language="JavaScript" src="ts_picker.js">

//Script by Denis Gritcyuk: tspicker@yahoo.com
//Submitted to JavaScript Kit (http://javascriptkit.com)
//Visit http://javascriptkit.com for this script

</script>
				<script type="text/javascript">
function identify(obj)
{
	var ch = obj.cells[1];
	//alert(ch.firstChild.nodeValu
	//document.cookie = "tuple_id="+ch.firstChild.nodeValu
	 window.location.href="http://localhost/seminarhall/modules/user/Archives/download.php?f=" + ch.firstChild.nodeValue;
    
}
function senddate(thisform)
{
	with(thisform)
	{
		var data=timestamp.value;
		window.location.href="http://localhost/seminarhall/modules/user/Status/check.php?name=" + data.firstChild.nodeValue;
	}
}
</script>
<style type="text/css">
	body{
		font:75%/150% "Trebuchet MS", "Lucida Grande", "Bitstream Vera Sans", Arial, Helvetica, sans-serif;
		color:#666666;
		margin:10px;
	}
	</style>
<script type="text/javascript" src="../../../lib/forms/prettyForms.js"></script>
	<link rel="stylesheet" href="../../../css/prettyForms.css" type="text/css" media="screen" />
	
	<script language="JavaScript" src="../compose/ts_picker.js">

//Script by Denis Gritcyuk: tspicker@yahoo.com
//Submitted to JavaScript Kit (http://javascriptkit.com)
//Visit http://javascriptkit.com for this script

</script>
<script type="text/javascript"  >

function print_user(field,message)
	{
	 with(field)
	 {
	  if(value==null||value==""||value==" ")
	  {
	    alert(message);
		return false;
	  }
	  else
	  {	
	  	return true;
	  }
	 }
	}
 function validation(thisform)
	{
	 with(thisform)
	 {
	 if(print_user(timestamp,"date field must not be blank")==false)
		{
		 timestamp.focus();
		 return false;
		}
		else
		 return true;
 	 }
	}
	
	</script>
    </head>
    <body onLoad="prettyForms()">
    
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
			<li><a href="../inbox/inbox.php" accesskey="1" title="">Inbox</a></li>
			<li><a href="../outbox/archive.php" accesskey="2" title="">Outbox</a></li>
            <li><a href="../autotemplate/template.php" accesskey="3" title="">Circular</a></li>
			<li class="active"><a href="../status/status.php" accesskey="4" title="">Hall status</a></li>
		</ul>
	</div>
	<form id="myForm" action="subdate.php"	name="form_meet" method="post" onsubmit="return validation(this)">
	<br /> 
	<?php
	echo "Select a date for which you have to check availability";
	?>
	<br />
	<br />
	<p>
	<label><strong>Date: </strong></label>
			<input name="timestamp" type="text" value="" />&nbsp;&nbsp;
			<a href="javascript:show_calendar('document.form_meet.timestamp', document.form_meet.timestamp.value);"><img src="../compose/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a></p> <br /> 
			<p><input type="submit" value="Go!" /></p>
		</form>
		<?php
			}
			else
			{
				echo "Please login <a href='../../../index.php'>here</a>";
			}
			
		?>
		</body>
		</html>