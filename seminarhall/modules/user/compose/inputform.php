<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Pretty Forms</title>
	<style type="text/css">
	body{
		font:75%/150% "Trebuchet MS", "Lucida Grande", "Bitstream Vera Sans", Arial, Helvetica, sans-serif;
		color:#666666;
		margin:10px;
	}
	</style>
	<script language="JavaScript" src="ts_picker.js">

//Script by Denis Gritcyuk: tspicker@yahoo.com
//Submitted to JavaScript Kit (http://javascriptkit.com)
//Visit http://javascriptkit.com for this script

</script>
	<script type="text/javascript">
	function showFormData(frm)
	{
		message="The values of the form are: \n-------------------------------------\n";
		message+="text area = \t" + frm.textarea.value + "\n\n";
		message+="textbox = \t" + frm.textbox.value + "\n\n";
		message+="select box = \t" + frm.selectMenu[frm.selectMenu.selectedIndex].innerHTML + "\n\n";
		message+="checkboxes = \t" + frm.checkbox1.checked + ", " + frm.checkbox2.checked + ", " + frm.checkbox3.checked + "\n\n";
		if(frm.radioButtons[0].checked){
			message+="radio buttons = \t" + frm.radioButtons[0].value + "\n\n";
		}else if(frm.radioButtons[1].checked){
			message+="radio buttons = \t" + frm.radioButtons[1].value + "\n\n";
		}else if(frm.radioButtons[2].checked){
			message+="radio buttons = \t" + frm.radioButtons[2].value + "\n\n";
		}
		window.alert(message);
		return false;
	}
	
	function doSomething(){
		showText = document.getElementById("signalEvent");
		showText.innerHTML = "You triggered an event";
		setTimeout("showText.innerHTML = '&nbsp;'",1000)
	}
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
	function chk_valid(thisform)
	{
	 with(thisform)
	 {
	  if(!checkbox1.checked && !checkbox2.checked && !checkbox3.checked && !checkbox4.checked)
	  {
	   alert("You must select atleast one of the branches using those checkboxes given");
	   return false;
	  }
	  else
	  {
	   return true;
	  }
	 }
	}
	function chk2_valid(thisform)
	{
	 with(thisform)
	 {
	  if(!hr1.checked && !hr2.checked && !hr3.checked && !hr4.checked && !hr5.checked && !hr6.checked && !hr7.checked && !hr8.checked)
	  {
	   alert("You must select atleast one of those checkboxes");
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
		if(print_user(title,"Title field must not be blank")==false)
		{
		 title.focus();
		 return false;
		}
		else if(print_user(expand,"Description field must not be blank")==false)
		{
		 expand.focus();
		 return false;
		}
		else if(print_user(timestamp,"Date field must not be blank")==false)
		{
		 timestamp.focus();
		 return false;
		}
		else if(chk_valid(thisform)==false)
		{
		 checkbox1.focus();
		 return false;
		}
		else if (chk2_valid(thisform)==false)
		{
		 hr1.focus();
		 return false;
		}
		else
		 return true;
		 
      }
	 }
	 	
	
	
	</script>
	<script type="text/javascript" src="../../../lib/forms/prettyForms.js"></script>
	<link rel="stylesheet" href="../../../css/prettyForms.css" type="text/css" media="screen" />
	
</head>

<body onload="prettyForms()">

	

	<form id="myForm" action="csubmit.php"	name="form_meet" method="post" onsubmit="return validation(this)" >
		<p>
			<label><strong>Title : </strong></label><input name="title" type="text" value=" " />
			<br class="clearAll" /><br />
		</p>
		<p>
			<label>Description</label><textarea name="expand" cols="60" rows="10"></textarea>
			<br class="clearAll" /><br />
		</p>
	
		
	
		<p>
			<label><strong>Type</strong> </label>
			<select name="selecttype">
				<option value="1"selected="selected" >General</option>
				<option value="2">Committee</option>
				<option value="3">Specialized</option>
				<option value="4">Discussion</option>
			</select>
			<br />
			<br />
		</p>
		<p>
			<br />
			<label><strong>To</strong> </label>
			<select name="To_details">
				<!--<option value="1" selected="selected" >HOD</option>-->
				<?php
				$con = mysql_connect("localhost","root", "");
				$us = $_COOKIE["locuser"];
				if(!$con)
				{
				die("Connection Failed");
				}
		
				mysql_select_db($dbase, $con);
				$sql_qry = "select * from `ooad`.`faculty`";
		
			    $result = mysql_query($sql_qry, $con) or die("Mysql query failed" . mysql_error());
				
				$val=1;
				while($row = mysql_fetch_array($result))
				{		
				if ((strcmp($row['fname'],"HOD") != 0) && (strcmp($row['fname'],$us) != 0) ){
					$val=$val+1;
					echo"<option value=\"$val\" selected=\"selected\">".$row['fname']."</option>";
				}
				}
				?>
				 
			</select>
			<br class="clearAll" /><br />
			
			
			
			
			<label><strong>Date: </strong></label>
			<input name="timestamp" type="text" value="" />&nbsp;&nbsp;
			<a href="javascript:show_calendar('document.form_meet.timestamp', document.form_meet.timestamp.value);"><img src="cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
			<br class="clearAll" /><br />
		</p>

		<p>
			<label>Course: </label>
			<input type="checkbox" name="checkbox1" /><label>CSCE 629</label>
			<input type="checkbox" name="checkbox2" /><label>CSCE 606</label>
			<input type="checkbox" name="checkbox3" /><label>ECEN 602</label>
			<input type="checkbox" name="checkbox4" /><label>CSCE 666</label>
			<br class="clearAll" /><br />
		</p>
		<p>
			<label>Hour: </label>
			<input type="checkbox" name="hr1" /><label>1</label>
			<input type="checkbox" name="hr2" /><label>2</label>
			<input type="checkbox" name="hr3" /><label>3</label>
			<input type="checkbox" name="hr4" /><label>4</label>
			<input type="checkbox" name="hr5" /><label>5</label>
			<input type="checkbox" name="hr6" /><label>6</label>
			<input type="checkbox" name="hr7" /><label>7</label>
			<input type="checkbox" name="hr8" /><label>8</label>

			<br class="clearAll" /><br />
		</p>
		<p>
		<label>Sem : </label>
		<select name="semid" >
				<option value="1"selected="selected" >Fall</option>
				<option value="2">Summer</option>
				<option value="3">Spring</option>
			</select>
			<br class="clearAll" /><br />
		</p>
<!--		<p>
			<label>radio buttons: </label>
			<input type="radio" name="radioButtons" value="1" /><label>radio 1</label>
			<input type="radio" name="radioButtons" value="2" /><label>radio 2</label>
			<input type="radio" name="radioButtons" value="3" checked="checked" onchange="doSomething()" /><label><strong>radio 3</strong></label>
			<br class="clearAll" /><br />
		</p> -->
		
		
		<p><input type="submit" value="Submit" /></p>
		
	</form>
	<div id="signalEvent" style="margin:120px 0; font-weight:bold; color:#970C3B;">&nbsp;</div>
	
	
<!--	<p><a href="http://jigsaw.w3.org/css-validator/validator?uri=http://www.agavegroup.com/agWork/prettyForms/index.html" title="CSS validation"><img src="/images/validationCSS" alt="CSS validation" onmouseover="this.src='/images/validationCSSRoll.png'" onmouseout="this.src='/images/validationCSS.png'" style="border:0;" /></a><a href="http://validator.w3.org/check/referer" title="XHTML validation"><img src="/images/validationXHTML" alt="XHTML validation" onmouseover="this.src='/images/validationXHTMLRoll.png'" onmouseout="this.src='/images/validationXHTML.png'" style="border:0;" /></a></p>-->
</body>
</html>
