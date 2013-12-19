<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="no-cache"> <!-- tells browser not to cache -->
<meta http-equiv="expires" content="0"> <!-- says that the cache expires 'now' -->
<meta http-equiv="pragma" content="no-cache"> <!-- says not to use cached stuff, if there is any -->
<title>Online Meeting Booking Portal</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" >

	function check(frm)
	{
		if(frm.user.value == "" || frm.user.value == null || frm.pass.value == "" || frm.pass.value == null)
		{
			alert("You cannot leave any of the fields empty");
			return false;
		}
		return true;
	}

	function noBack(){ window.history.forward(); }
</script>

</head>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
<div id="login">
	<img src="images/logo.gif" />
    <hr width="50%" align="left" />
	<form method="post" action="getmein.php" onsubmit="return check(this)">
    <input type="text" class="login_input" name="user"/>
    <input type="password" class="pass_input" name="pass" />
    <input type="submit" value="Login" class="button" />
  </form>
</div>
</body>
</html>