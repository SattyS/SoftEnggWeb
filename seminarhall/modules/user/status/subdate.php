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
<style type="text/css">
	body{
		font:75%/150% "Trebuchet MS", "Lucida Grande", "Bitstream Vera Sans", Arial, Helvetica, sans-serif;
		color:#666666;
		margin:10px;
	}
	</style>
<script type="text/javascript" src="../../../lib/forms/prettyForms.js"></script>
	<link rel="stylesheet" href="../../../css/prettyForms.css" type="text/css" media="screen" />
	

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
    
   
	<div id="menu">
		<ul>
			<li><a href="../inbox/inbox.php" accesskey="1" title="">Inbox</a></li>
			<li><a href="../outbox/archive.php" accesskey="2" title="">Outbox</a></li>
			<li><a href="../autotemplate/template.php" accesskey="3" title="">Circular</a></li>
			<li class="active"><a href="../Status/status.php" accesskey="4" title="">Hall status</a></li>
		</ul>
	</div>
	
	<?php
	include("../../accounts/logclass.php");
	$obj = new Logclass;
	
	$result = $obj -> isLoggedIn();
	
	if( $result )
	{
		$con = mysql_connect("localhost", "root", "");
		
		if(! $con)
		{
			die("Could not connect to the database" . mysql_error());
		}
		
		mysql_select_db("ooad", $con);
		
		$ts=$_POST['timestamp'];
		
		$day=strtok($ts,"-");
		$mnth=strtok("-");
		$yr=strtok(" ");
		$ctrl=0;
		$tos[]=array();
		$s_arr[]=array();
		$c_arr[]=array();
		$booked_by[]=array();
		$sql1="select * from `ooad`.`mailer` where day=\"$day\" and month=\"$mnth\" and year=\"$yr\" and status=1";
		 
		$result1 = mysql_query($sql1, $con) or die("Mysql query failed" . mysql_error());
		while($row1 = mysql_fetch_array($result1))
		{
		  $booked_by[]=$row1['from'];
		  $tos[]=$row1['hour'];
		  $s_arr[]=$row1['subject'];
		  $c_arr[]=$row1['class'];
		  $ctrl=$ctrl+1;
		}
		//echo $ctrl;
		?>
		             
            
        
	<?php 
		if($ctrl==0)
		{
			echo "All hours are free on the requested date.";
		}
		else if($ctrl==8)
		{
			echo "All hours are booked !";
		}
		else
		{
			echo "The following hour(s) are occupied :";
			?>
			
	<table id="hor-minimalist-b" summary="Employee Pay Sheet">
    <thead>
    	<tr>
		    <th width="13%" scope="col">Booked by</th>
        	<th width="13%" scope="col">Hour</th>
            <th width="17%" scope="col">Class</th>
            <th width="12%" scope="col">Subject</th>
			 </tr>
    </thead>
    <tbody>
        
			<?php
			
			while($ctrl!=0)
			{	
				print'<pre>';
				?>
				<tr> 
				<td><?php echo $booked_by[$ctrl]; ?></td>
				<td><?php echo $tos[$ctrl]; ?></td>
            	<td><?php echo $c_arr[$ctrl];?></td>
            	<td><?php echo $s_arr[$ctrl];?></td>
				</tr>
				<?php 
				$ctrl=$ctrl-1;
				
			}
		?>
		</tbody>
		</table>
		<?php 
		}
		
	}
	else
	{
		echo "Please login <a href='index.php'>here</a>";
	}
	?>
	</body>
	</html>				
				