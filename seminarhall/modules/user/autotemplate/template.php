<html>
	<head>
    	<meta http-equiv="cache-control" content="no-cache"> <!-- tells browser not to cache -->
<meta http-equiv="expires" content="0"> <!-- says that the cache expires 'now' -->
<meta http-equiv="pragma" content="no-cache"> <!-- says not to use cached stuff, if there is any -->
    	<title>
        	Inbox
        </title>
        <link rel="stylesheet" href="../../../css/style.css" />
        		<script type="text/javascript">
function identify(obj)
{
	var subj = obj.cells[0];
	var desc = obj.cells[1];
	var ppl = obj.cells[2];
	var dat =obj.cells[3];
	var hr= obj.cells[4];
	var ss =obj.cells[5];
	//alert(ch.firstChild.nodeValue)
	//document.cookie = "tuple_id="+ch.firstChild.nodeValue
	 window.location.href="http://localhost/seminarhall/modules/user/autotemplate/committee.php?subj=" + subj.firstChild.nodeValue + "&desc=" +desc.firstChild.nodeValue + "&ppl=" + ppl.firstChild.nodeValue + "&dat=" + dat.firstChild.nodeValue + "&hr=" + hr.firstChild.nodeValue + "&ss=" +ss.firstChild.nodeValue ;
}
</script>
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
			<li><a href="../outbox/archive.php" accesskey="2" title="">Outbox</a></li>
	        <li class="active"><a href="template.php" accesskey="3" title="">Circular</a></li>
			<li><a href="../status/status.php" accesskey="4" title="">Hall status</a></li>
	        	
        </ul>
	</div>
    <table id="hor-minimalist-b" summary="Employee Pay Sheet">
    <thead>
    	<tr>
            <th width="14%" scope="col">Subject</th>
            <th width="22%" scope="col">Description</th>
            <th width="14%" scope="col">Attending People</th>
            <th width="14%" scope="col">Date</th>
            <th width="6%" scope="col">Hour</th>
            <th width="6%" scope="col">Sem</th>
        </tr>
    </thead>
    <tbody>
     <?php			
			include("templatelist.php");		
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