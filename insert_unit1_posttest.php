<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<HTML> 

<HEAD>
<TITLE> imron CAI</TITLE> 

<META http-equiv=Content-Type content="text/html; charset=utf-8"> 

</HEAD> 
  
<body> 

<?php 

include ("add_cap.php"); 

foreach ($_POST as $k => $v) { if($k == "Filedata") { if(get_magic_quotes_gpc()) 

$Filedata = stripslashes($v); else $Filedata = $v; } } 

$Filedata = str_replace("\n", "", $Filedata); $Filedata = str_replace("\"", "", $Filedata); $Filedata = 

str_replace("</", "", $Filedata); $Filedata = str_replace("<", "", $Filedata); $Filedata = 

str_replace("/>", "+++", $Filedata); $Filedata = str_replace(">", "+++", $Filedata); // $Filedata = 

str_replace(" ", "", $Filedata); 

$cp5Dat = array(); 

$cp5Dat = explode('+++', $Filedata); 

$pos = strpos($cp5Dat[4],"="); $stdname = substr($cp5Dat[4], $pos+1); 

$pos = strpos($cp5Dat[5],"="); $email = substr($cp5Dat[5], $pos+1); 
  

$pos = strpos($cp5Dat[13],"="); $stdid = substr($cp5Dat[13], $pos+1); 

$pos = strpos($cp5Dat[18],"="); $status = substr($cp5Dat[18], $pos+1); 

$pos = strpos($cp5Dat[20],"="); $score = substr($cp5Dat[20], $pos+1); 

$pos = strpos($cp5Dat[21],"="); $max = substr($cp5Dat[21], $pos+1); 

$pos = strpos($cp5Dat[23],"="); $session = substr($cp5Dat[23], $pos+1); 

$pos = strpos($cp5Dat[27],"="); $datevalue = substr($cp5Dat[27], $pos+1); 

$pos = strpos($cp5Dat[28],"="); $timevalue = substr($cp5Dat[28], $pos+1); 

$pos = strpos($cp5Dat[30],"="); $quizno = substr($cp5Dat[30], $pos+1); 

//??????????????????????

function displaydate($datex) {
	$date_array=explode("/",$datex);
	$m=$date_array[0];
	$d=$date_array[1];
	$y=$date_array[2];
	$displaydate="$y-$m-$d";
	return $displaydate;
}

$date =  displaydate($datevalue);


$dblink = mysqli_connect($host, $usr, $pwd, $db); 

//mysql_select_db($db, $dblink); 

$sql = " INSERT INTO unit1_posttest"; 

$sql .= " (std_name, email, max_score , score, std_id, date, time, quizno, txt, status, session ) VALUES "; 

$sql .= " ('$stdname', '$email', '$max', '$score', '$stdid', '$date', '$timevalue', '$quizno', '$Filedata' ,'$status', '$session')"; 

$result = mysqli_query($dblink, $sql ); 

mysqli_close($dblink); 

?> 

</body> 

</html>