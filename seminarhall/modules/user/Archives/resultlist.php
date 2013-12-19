

<?php
		
		$con = mysql_connect("localhost","root", "");
		
		$us = $_COOKIE["locuser"];
		
		if(!$con)
		{
			die("Connection Failed");
		}
		
		mysql_select_db("ooad", $con);
		
		$sql_qry = "select * from `ooad`.`results`";
		
		$result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
		
		while($row = mysql_fetch_array($result))
		{		
		?>
        <tr>
        	<td style="visibility:hidden"><?php echo $row['bookingid']; ?></td>
            <td><?php echo $row['meet_name']; ?></td>
            <td><?php echo $row['noattended']; ?></td>
            <?php 
			$value=$row['results'];
			if($value==0)
			{
			?>
			<td><img src="../../../images/sad.jpg" height=30px width=30px /></td>
            <?php
			 } 
			 else
			 {
			 ?>
			 <td><img src="../../../images/smiley_laugh.jpg"  height=30px width=30px/></td>    
			 <?php
			 }
			 ?>
			<td><?php echo $row['comments']; ?></td>
        </tr>
        <?php
		}?>
        
		<?php
		mysql_close($con);
		?>