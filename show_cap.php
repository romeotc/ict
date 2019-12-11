<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//TH"> 

<html> 

<head> 

<title>CVC CHACHOENGSAO</title> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

</head> 

<body> 

<?php 

include('add_cap.php'); 

$cid = mysql_connect($host, $usr, $pwd); 

mysql_select_db($db); 

$sql = "SELECT * FROM unit1_pretest ORDER BY id desc LIMIT 0,20"; 

$result = mysql_query($sql) or die("Couldn't execute query"); 

echo "<table width=\"100%\"><tr><td>ตารางแสดงคะแนนผู้เข้าทดสอบ 20 คนล่าสุด</td>

<td aligh=\"right\">&nbsp;</td></tr></table>"; 

echo "<table border=1 width=\"100%\">"; 

echo "<TR><TD>ลำดับที่</TD><TD align=\"center\">

ชื่อ</TD><TD align=\"center\">

คะแนน</TD><TD align=\"center\">



เวลาทำแบบทดสอบ</TD><TD align=\"center\">

วันที่สอบ</TD><TD align=\"center\">

เริ่มสอบเวลา</TD><TD align=\"center\">

รหัสแบบทดสอบ</TD><TD align=\"center\">
session</TD></TR>"; 

$idx = 0; 

while ($row= mysql_fetch_array($result)) { 

$idx += 1; 

$stname = $row["std_name"]; 

$score = $row["score"]."/".$row['max_score']; 
$max_score = $row["max_score"]; 

$ttest= $row["ttest"]; 

$datevalue= $row["date"]; 

$timevalue= $row["time"]; 

$quizno= $row["txt"]; 
$session = $row['session'];


echo "<tr valign = \"top\"><td>$idx</td>

<td>$stname</td> 

<td>$score</td>

<td>$session</td>

<td>$datevalue</td>

<td>$timevalue</td>

<td>$quizno</td>

<td>$session</td> 
</tr>"; 

} 

echo "</table>"; 



?> 

</body> 

</html>