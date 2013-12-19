<html>
	<head>
    	<title>
        	Inbox
        </title>
        <link rel="stylesheet" href="../../../css/style.css" />
		<?php
			$us = $_COOKIE["locuser"];
		?>
		<script type="text/javascript">
function identify(obj)
{
	var ch = obj.cells[7];
	//alert(ch.firstChild.nodeValue);
	var a = "HOD";
	//document.cookie = "tuple_id="+ch.firstChild.nodeValue;
	var currentuser=obj.cells[8];
	var datetym=obj.cells[4];
	var hr_val=obj.cells[5];
	var from_det=obj.cells[0];
	if( currentuser.firstChild.nodeValue == a )
	 window.location.href="http://localhost/seminarhall/modules/user/inbox/consent.php?name=" + ch.firstChild.nodeValue + "&datetym=" +datetym.firstChild.nodeValue + "&hr_val=" +hr_val.firstChild.nodeValue + "&from_det=" +from_det.firstChild.nodeValue;
	 //window.location.href = "http://localhost/main.php?width=" + width + "&height=" + height;
}
</script>

    </head>
    <body>
    
    <div id="header">
    <ul>
        
    <li><a href="../../../getmeout.php">Logout</a></li>
    <li><a href="../../chat/experts.php">Chat</a></li>
    <li><a href="../Archives/results.php">Archive</a></li>
    <li><a href="inbox.php">Messages</a></li>
    <li><a href="../compose/compose.php">New</a></li> 
    <li><a href="../mainmenu/members.php">Menu</a></li>      
    
</ul>
    	<img src="../../../images/logo.gif" />
    </div>
    <hr color="#666666" size="1px" />
    
    <!--<div id="bodymainmiddlePan">-->
    <?php
			include("../../accounts/logclass.php");
			$obj = new Logclass;
			
			$result = $obj -> isLoggedIn();
			
			if(  $result )
			{
	?>
	
	<!--   <div id="inboxmain">
		<h2 class="active" ><a href="#">inbox</a></h2>
		<h2><a href="#">outbox</a></h2>
	<marquee width="50" height="50" direction="up" behavior="alternate"><img src="../../../images/contact_icon.gif" class="sad" />
	</marquee>
	</div>-->
	<div id="menu">
		<ul>
			<li class="active"><a href="inbox.php" accesskey="1" title="">Inbox</a></li>
			<li><a href="../outbox/archive.php" accesskey="2" title="">Outbox</a></li>
			<li><a href="../autotemplate/template.php" accesskey="3" title="">Circular</a></li>
			<li><a href="../status/status.php" accesskey="4" title="">Hall status</a></li>
		</ul>
	</div>
	
    <!--<div id="inboxpage">
	 <div id="inboxaction">
	 <table id="action" >
	 <thead>
	 <tr>
	 	<th width="13%" scope="col">Chk</th>
	 </tr>
	 </thead>
	 </table>
	 </div>
	 <div id="inboxmain">
	 -->
    <table id="hor-minimalist-b" summary="Employee Pay Sheet">
    <thead>
    	<tr>
			<th width="11%" scope="col">From</th>
            <th width="14%" scope="col">Subject</th>
            <th width="33%" scope="col">Reason</th>
            <th width="14%" scope="col">Attending People</th>
            <th width="14%" scope="col">Date</th>
            <th width="6%" scope="col">Hour</th>
			<?php
				if( strcmp($us,"HOD") == 0 ){ ?>
					<th width="8%" scope="col">Decision</th>
			<?php	}else{ ?>
					<th width="8%" scope="col" style="visibility:hidden">Decision</th>
			<?php } ?>		
		    <th width="0%" scope="col" style="visibility:hidden"></th>
			<th width="0%" scope="col" style="visibility:hidden"></th>
            
        </tr>
    </thead>
    <tbody>
        
        <?php			
			include("retrieve.php");		
		?>
        
    </tbody>
</table>
<!--</div>
</div>-->
<?php
			}
			else
			{
				echo "Please login <a href='../../index.php'>here</a>";
			}
			
			?>
	</div>
    
    </body>
</html>