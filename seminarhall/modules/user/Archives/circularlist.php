

<?php
		
		$con = mysql_connect("localhost","root", "");
		
		$us = $_COOKIE["locuser"];
		
		if(!$con)
		{
			die("Connection Failed");
		}
		
		mysql_select_db("ooad", $con);
		
		$sql_qry = "select * from `ooad`.`circular`";
		
		$result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
		
		while($row = mysql_fetch_array($result))
		{		
		?>
        <tr onclick="identify(this)">
        	<td style="visibility:hidden"><?php echo $row['cid']; ?></td>
            <td><?php echo $row['cname']; ?></td>
            <td><?php echo $row['ctype']; ?></td>
            <td><?php echo $row['Cicular_feature']; ?></td>
        </tr>
        <?php
		}?>
        
		<?php
		mysql_close($con);
		?>