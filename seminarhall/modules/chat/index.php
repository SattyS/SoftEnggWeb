<html>
	<head>
	<title>Ajax Chat 3.1 (Room 1)</title>
	<style type="text/css">

input, textarea 	{ font-family: arial; color:white; background:#57767F; font-size: 14px; }
#content 		{ width:800px; text-align:left; margin-left:60px; }

#chatwindow 		{ border:1px solid #aaaaaa; padding:4px; background:#232D2F; color:white;  width:550px; height:auto; font-family:courier new;}
#chatnick 		{ border: none; border-bottom:1px solid #aaaaaa; padding:4px; background:#57767F;}
#chatmsg 		{ border: none; border-bottom:1px solid #aaaaaa; padding:4px; background:#57767F; }

#info 			{ text-align:left; padding-left:0px; font-family:arial; }
#info td 		{ font-size:12px; padding-right:10px; color:#DFDFDF;  }
#info .small 		{ font-size:12px; padding-left:10px; padding-right:0px;}

#info a 		{ text-decoration:none; color:white; }
#info a:hover 		{ text-decoration:underline; color:#CF9700;}
</style>
	</head>
	<body>
		<div id="info">
		<br>
			<!-- <table border="0">
				<tr>
					<td colspan="2">
						<a href="http://linuxuser.at/index.php?title=Most_Simple_Ajax_Chat_Ever"><font style="font-size:16px">Most Simple Ajax Chat</a> (v 3.1)</font><br>
					</td>	
				</tr>
				<tr>
					<td class="small">author</td>
					<td class="small"><a href="mailto:chris@linuxuser.at">chris at linuxuser dot at</a></td>				
				</tr>
				<tr>
					<td class="small">forum</td>
					<td class="small"><a href="http://forums.linuxuser.at/viewforum.php?f=6">forums.linuxuser.at</a></td>				
				</tr>
				<tr>
					<td class="small">home</td>
					<td class="small"><a href="http://www.linuxuser.at/index.php?title=Most_Simple_Ajax_Chat_Room">www.linuxuser.at</a></td>				
				</tr>
				<tr>
					<td class="small">source</td>
					<td class="small"><a href="http://www.linuxuser.at/chat/ajax_chat.zip">ajax_chat.zip</a></td>				
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table> -->
					
		</div>
		
		
		<div id="content">
			<p id="chatwindow"> </p>		
<!--			<textarea id="chatwindow" rows="19" cols="95" readonly></textarea><br>
-->
			<br /><br /><input id="chatnick" type="text" size="9" disabled="disabled" maxlength="9" value="<?php echo $_COOKIE['locuser']; ?>">&nbsp;
			<input id="chatmsg" type="text" size="60" maxlength="80"  onkeyup="keyup(event.keyCode);"> 
			<input type="button" value="add" onClick="submit_msg();" style="cursor:pointer;border:1px solid gray;"><br><br>
			<br>
		</div>

	</body>
</html>

<script type="text/javascript">
/****************************************************************
 * Most Simple Ajax Chat Script (www.linuxuser.at)		*
 * Version: 3.1							*
 * 								*
 * Author: Chris (chris[at]linuxuser.at)			*
 * Contributors: Derek, BlueScreenJunky (http://forums.linuxuser.at/viewtopic.php?f=6&t=17)
 *								*
 * Licence: GPLv2						*
 ****************************************************************/
 
/* Settings you might want to define */
	var waittime=800;		

/* Internal Variables & Stuff */
	chatmsg.focus()
	document.getElementById("chatwindow").innerHTML = "loading...";

	var xmlhttp = false;
	var xmlhttp2 = false;


/* Request for Reading the Chat Content */
function ajax_read(url) {
	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
		if(xmlhttp.overrideMimeType){
			xmlhttp.overrideMimeType('text/xml');
		}
	} else if(window.ActiveXObject){
		try{
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e){
			}
		}
	}

	if(!xmlhttp) {
		alert('Giving up :( Cannot create an XMLHTTP instance');
		return false;
	}

	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState==4) {
		document.getElementById("chatwindow").innerHTML = xmlhttp.responseText;

		zeit = new Date(); 
		ms = (zeit.getHours() * 24 * 60 * 1000) + (zeit.getMinutes() * 60 * 1000) + (zeit.getSeconds() * 1000) + zeit.getMilliseconds(); 
		intUpdate = setTimeout("ajax_read('chat.txt?x=" + ms + "')", waittime)
		}
	}

	xmlhttp.open('GET',url,true);
	xmlhttp.send(null);
}

/* Request for Writing the Message */
function ajax_write(url){
	if(window.XMLHttpRequest){
		xmlhttp2=new XMLHttpRequest();
		if(xmlhttp2.overrideMimeType){
			xmlhttp2.overrideMimeType('text/xml');
		}
	} else if(window.ActiveXObject){
		try{
			xmlhttp2=new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try{
				xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e){
			}
		}
	}

	if(!xmlhttp2) {
		alert('Giving up :( Cannot create an XMLHTTP instance');
		return false;
	}

	xmlhttp2.open('GET',url,true);
	xmlhttp2.send(null);
}

/* Submit the Message */
function submit_msg(){
	nick = document.getElementById("chatnick").value;
	msg = document.getElementById("chatmsg").value;

	if (nick == "") { 
		check = prompt("please enter username:"); 
		if (check === null) return 0; 
		if (check == "") check = "anonymous"; 
		document.getElementById("chatnick").value = check;
		nick = check;
	} 

	document.getElementById("chatmsg").value = "";
	ajax_write("w.php?m=" + msg + "&n=" + nick);
}

/* Check if Enter is pressed */
function keyup(arg1) { 
	if (arg1 == 13) submit_msg(); 
}

/* Start the Requests! ;) */
var intUpdate = setTimeout("ajax_read('chat.txt')", waittime);

</script>

