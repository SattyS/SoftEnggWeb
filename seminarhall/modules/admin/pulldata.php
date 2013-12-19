<?php

mysql_connect("localhost","root","") or die("Error Connect");

$con = mysql_select_db("ooad") or die("Error select");

  $task = '';
  if ( isset($_POST['task'])){
    $task = $_POST['task'];   // Get this from Ext
  }
  switch($task){
    case "LISTING":              // Give the entire list
      getList();
      break;
	  
	case "UPDATEFAC":
        updateFaculty();
        break;
		
	case "GETSTAFF":
		getFac();
		break;

    default:
      echo "{failure:true}";  // Simple 1-dim JSON array to tell Ext the request failed.
      break;
  }


function getList() 
{
	$query = "SELECT facultyid,fname, rank, mailid, username, password FROM login NATURAL JOIN faculty WHERE rank!=3";
	$result = mysql_query($query) or die("Query error :(");
	$nbrows = mysql_num_rows($result);	
	if($nbrows>0){
		while($rec = mysql_fetch_array($result)){
             // render the right date format
			$arr[] = $rec;
		}
		$jsonresult = JEncode($arr);
		echo '({"total":"'.$nbrows.'","results":'.$jsonresult.'})';
	} else {
		echo '({"total":"0", "results":""})';
	}
}

function getFac() 
{
	$query = "SELECT facultyid,fname, rank, mailid, username, password FROM login NATURAL JOIN faculty WHERE rank=3";
	$result = mysql_query($query) or die("Query error :(");
	$nbrows = mysql_num_rows($result);	
	if($nbrows>0){
		while($rec = mysql_fetch_array($result)){
             // render the right date format
			$arr[] = $rec;
		}
		$jsonresult = JEncode($arr);
		echo '({"total":"'.$nbrows.'","results":'.$jsonresult.'})';
	} else {
		echo '({"total":"0", "results":""})';
	}
}


function JEncode($arr){
    if (version_compare(PHP_VERSION,"5.2","<"))
    {    
        require_once("./JSON.php");   //if php<5.2 need JSON class
        $json = new Services_JSON();  //instantiate new json object
        $data=$json->encode($arr);    //encode the data in json format
    } else
    {
        $data = json_encode($arr);    //encode the data in json format
    }
    return $data;
}


function updateFaculty()
{
	$fid = $_POST['facultyid'];
	$facname = $_POST['fname'];
	$rank = $_POST['rank'];
	$facmail = $_POST['mailid'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
	
    // Now update the president
    $query1 = "UPDATE login SET username='$user', password = '$pass' WHERE facultyid = $fid ";
	$query2 = "UPDATE faculty SET fname='$facname', rank='$rank',mailid='$facmail' WHERE facultyid = $fid ";
    $result = mysql_query($query1) or die("Not at all happy");
	$result = mysql_query($query2) or die("Not at all happy");
    echo '1';        // success
}


?>