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
			<li><a href="results.php" accesskey="1" title="">Outcomes</a></li>
			<li><a href="circular.php" accesskey="2" title="">File-download</a></li>
			<li class="active"><a href="upload.php" accesskey="2" title="">File-upload</a></li>
		</ul>
	</div>
	<form method="post" enctype="multipart/form-data" action="file-upload.php" >
	Please select file to upload: <input type="file" size="20" name="filename">
  <input type="submit" value="Upload" name="submit">
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