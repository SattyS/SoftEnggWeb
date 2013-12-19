<?php
		
		$con = mysql_connect("localhost","root", "");
		
		$us = $_COOKIE["locuser"];
		
		if(!$con)
		{
			die("Connection Failed");
		}
		
		mysql_select_db("ooad", $con);
		
		$sql_qry = "select * from mailer where `from` = \"$us\" and status=1 and `type` not like 'Discussion' and type not like 'General'";
		
		$result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
		
		while($row = mysql_fetch_array($result))
		{		
		?>
        <tr onclick="identify(this)">
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['comments']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row['day']."-".$row['month']."-".$row['year']; ?></td>
            <td><?php echo $row['hour']; ?></td>
            <td><?php echo $row['semid']; ?></td>
             
        </tr>
        <?php
		}?>
        
		<?php
		mysql_close($con);
		?>