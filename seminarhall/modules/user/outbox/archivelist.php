

<?php
		
		$con = mysql_connect("localhost","root", "");
		
		$us = $_COOKIE["locuser"];
		
		if(!$con)
		{
			die("Connection Failed");
		}
		
		mysql_select_db("ooad", $con);
		
		$sql_qry = "select * from mailer where `from` = \"$us\"";
		
		$result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
		
		while($row = mysql_fetch_array($result))
		{		
		?>
        <tr>
        	<td><?php echo $row['to']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['comments']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row['day']."-".$row['month']."-".$row['year']; ?></td>
            <td><?php echo $row['hour']; ?></td>
            <?php
				if( strcmp($us,"HOD") == 0 ){
			?>
            <td><a href="#"><?php echo $row['status']; ?></a></td>
            <?php
				}
				else
				{
			?>
            <td><?php echo $row['status']; ?></td>
            <?php
				}
			?>            
        </tr>
        <?php
		}?>
        
		<?php
		mysql_close($con);
		?>