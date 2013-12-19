<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POSTER</title>
<style type="text/css">
<!--
body {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	background: #FFFFFF;
	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	padding: 0;
	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */
	color: #000000;
}
.oneColLiqCtrHdr #container {
	width: 80%;  /* this will create a container 80% of the browser width */
	background: #FFFFFF;
	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */
	border: 1px solid #000000;
	text-align: left; /* this overrides the text-align: center on the body element. */
}
.oneColLiqCtrHdr #header {
	background: #FFFFFF; 
	padding: 0 10px 0 20px;  /* this padding matches the left alignment of the elements in the divs that appear beneath it. If an image is used in the #header instead of text, you may want to remove the padding. */
}
.oneColLiqCtrHdr #header h1 {
	margin: 0; /* zeroing the margin of the last element in the #header div will avoid margin collapse - an unexplainable space between divs. If the div has a border around it, this is not necessary as that also avoids the margin collapse */
	padding: 10px 0; /* using padding instead of margin will allow you to keep the element away from the edges of the div */
}
.oneColLiqCtrHdr #mainContent {
	padding: 0 20px; /* remember that padding is the space inside the div box and margin is the space outside the div box */
	background: #FFFFFF;
	text-align: justify;
}
.oneColLiqCtrHdr #footer { 
	padding: 0 10px; /* this padding matches the left alignment of the elements in the divs that appear above it. */
	background:#FFFFFF;
} 
.oneColLiqCtrHdr #footer p {
	margin: 0; /* zeroing the margins of the first element in the footer will avoid the possibility of margin collapse - a space between divs */
	padding: 10px 0; /* padding on this element will create space, just as the the margin would have, without the margin collapse issue */
}

.oneColLiqCtrHdr #signature { 
	padding: 0 10px 0 20px; /* this padding matches the left alignment of the elements in the divs that appear above it. */
	background:#FFFFFF;
} 
.oneColLiqCtrHdr #signature p {
	margin: 0; /* zeroing the margins of the first element in the footer will avoid the possibility of margin collapse - a space between divs */
	text-align:right;
	padding: 10px 0; /* padding on this element will create space, just as the the margin would have, without the margin collapse issue */
	font-size:14px;
}
-->
</style></head>

<body class="oneColLiqCtrHdr">
<?php
 $subj1=$_GET['subj'];
 //$desc1=$_GET['desc1'];
 $ppl1=$_GET['ppl'];
 $dat1=$_GET['dat'];
 $hr1=$_GET['hr'];
 $ss1=$_GET['ss'];
 ?>
<div id="container">
  <div id="header">
    <table width="100%" height="119" border="0" cellpadding="0px" cellspacing="10px">
      <tr>
        <td width="107" rowspan="2"><img src="TAM-Logo.png" width="106" height="106" alt="TAMU" /></td>
        <td colspan="2"><p align="right"><strong>Dated: <?php echo $dat1 ; ?></strong></p></td>
      </tr>
      <tr>
        <td width="145">&nbsp;</td>
        <td width="484" style="color:#630"><strong>POSTER</strong></td>
      </tr>
    </table>
    <!-- end #header -->
  </div>
  <div id="mainContent">
    <p><span style="color:#060"><strong>Sub:</strong></span> <span style="color:#C00">Commencing of seminar on <?php echo $dat1 ; ?> at the Department Seminar Hall.</span></p>
    <p>The following poster is to announce that a SEMINAR is scheduled on <?php echo $dat1 ; ?> at the Department Seminar Hall(Room 124) for the seminar titled " <?php echo $subj1; ?> " .</p>
    <!--<p>Any further comments and requirements for the meeting can be added in this part of the page. This is some sample data put in this place to know how the actual page will look like. Do check this out and confirm the circular.-->
      <!-- end #mainContent -
    </p>--></div>
    <div id="signature">
    <table width="100%" border="0" cellspacing="10px" cellpadding="5px">
      <tr>
        <td width="532" rowspan="3"></td>
        <td width="210" height="21"><p>Yours truly,</p></td>
      </tr>
      <tr>
        <td height="45" style="text-align:right"><img src="Signature.gif" width="210" height="35" /></td>
      </tr>
      <tr>
        <td><p>(Dr. X.)<br />Prof. @ CSE TAMU</p></td>
      </tr>
    </table>
    
  <!-- end #signature --></div>
  <div id="footer">
    <p style="text-align:center;font-size:9px">&copy;Department of Computer Science and Engineering, TAMU, College Station.</p>
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
