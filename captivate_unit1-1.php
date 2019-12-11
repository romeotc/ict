<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<HTML> 

<HEAD>
<TITLE> CVC CHACHOENGSAO</TITLE> 

<META http-equiv=Content-Type content="text/html; charset=utf-8"> 

</HEAD> 

<body> 

<?php 
echo $_GET['txt'];
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
  

$pos = strpos($cp5Dat[27],"="); $stdid = substr($cp5Dat[27], $pos+1); 

$pos = strpos($cp5Dat[34],"="); $status = substr($cp5Dat[34], $pos+1); 

$pos = strpos($cp5Dat[36],"="); $score = substr($cp5Dat[36], $pos+1); 



$pos = strpos($cp5Dat[37],"="); $session = substr($cp5Dat[37], $pos+1); 

$pos = strpos($cp5Dat[41],"="); $datevalue = substr($cp5Dat[41], $pos+1); 

$pos = strpos($cp5Dat[42],"="); $timevalue = substr($cp5Dat[42], $pos+1); 



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


$dblink = mysql_connect($host, $usr, $pwd); 

mysql_select_db($db, $dblink); 

$sql = " INSERT INTO unit11"; 

$sql .= " (student_id, status, session, date, time, score, text) VALUES 
('".$stdid."','".$status."','".$session."','".$date."','".$timevalue."','".$score."','".$Filedata."')"; 

echo $sql;

$result = mysql_query($sql, $dblink); 

mysql_close($dblink); 

?> 

</body> 

</html>