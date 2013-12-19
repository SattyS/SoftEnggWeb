<?php

mysql_connect("localhost","root","") or die("Error Connect");

$con = mysql_select_db("ooad") or die("Error select");

  $task = '';
  if ( isset($_POST['task'])){
    $task = $_POST['task'];   // Get this from Ext
  }
  switch($task){
    case "ADDFAC":
      addFac(0);
      break;
	  
	case "ADDSTAFF":
		addFac(3);
		break;
	  
	case "DELFAC":
        deleteFaculty();
        break;

    default:
      echo "{failure:true}";
      break;
  }
  
  function addFac($i)
  {	  
	  $query = "insert into faculty values(NULL,'NA',$i,'NA')";
	  
	  $rs = mysql_query($query);
	  
	  $value = mysql_insert_id();
	  
	  $query1 = "insert into login values('NA','NA',".$value.",CURRENT_TIMESTAMP)";
	  
	  $res = mysql_query($query1) or die("SQL sucks!!".mysql_error());
	  
	  echo '{success:true,insert_id:'.$value.'}';
	  
  }
  
  function deleteFaculty()
  {
	  $fid = $_POST['facultyid'];
	  
	  $query = "DELETE FROM login WHERE facultyid = $fid";
	  $query1 = "DELETE FROM faculty WHERE facultyid = $fid";
	  
	  $result = mysql_query($query) or die("0");
	  $result = mysql_query($query1) or die("0");
      echo '1';        // success
  }
?>