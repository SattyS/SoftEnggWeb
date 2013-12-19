<?php
		
		$con = mysql_connect("localhost","root", "");
		
		$us = $_COOKIE["locuser"];
		
		$var=0;
		//$hour=time()+3600;
		
		
		if(!$con)
		{
			die("Connection Failed");
		}
		
		mysql_select_db("ooad", $con);
		
		$sql_qry = "select * from mailer where `to` = \"$us\"";
		
		$result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
		
		
        $arr = array(0 => 0);
		
		while($row = mysql_fetch_array($result))
		{		
		//$val=$row['mid'];
		//setcookie("tuple_id",$val,$hour);
		$var=$var+1;
		
		$arr[]=$var;
		
		?>
        <tr onclick="identify(this)">
        	<td><?php echo $row['from']; ?></td>
			<td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['comments']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row['day']."-".$row['month']."-".$row['year']; ?></td>
            <td><?php echo $row['hour']; ?></td>
			<?php 
			if( strcmp($us,"HOD") == 0 ){
				$value=$row['status'];
				if($value==0)
				{
				?>
				<td><img src="../../../images/small_x.jpg" /></td>
				<?php
				 } 
				 else
				 {
				 ?>
				 <td><img src="../../../images/tick.jpg"  /></td>    
				 <?php
				 }
			}
			 ?>   
			<td style="visibility:hidden"><?php echo $row['mid']; ?></td>
			<td style="visibility:hidden" ><?php echo $row['to']; ?></td>
		</tr>
        <?php
		}
		//print_r($arr);
		
		?>
        
		<?php
		mysql_close($con);
		?>