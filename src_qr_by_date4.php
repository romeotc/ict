
<!DOCTYPE html>
<html lang="th" class="no-js">


<?php
include('db.php');
if($_POST['date'] ==""){ echo "กรุณาเลือกวันที่"; }else{
$date = $_POST['date'];
//echo $date;
$s = "select * from tb_student59 as a inner join tb_track as b on a.student_id = b.student_id  
where b.student_id = '".$_POST['email']."' and b.datetime = '".$date."'  ";
$q = mysqli_query($link,$s);
$rs = mysqli_num_rows($q);
$result = mysqli_fetch_array($q);
//echo $s;

if($rs>0){
echo " <h3>".$time. " <h4 class='w3-text-red'> " .$_POST['id'].  " </h4> <h4>เช็คชื่อไปแล้ว   ".$result['datetime']."</h4>";
}else{
	if($_POST['mode']=='add_m'){
	$s_add = "INSERT INTO tb_track (student_id,datetime) VALUES ('".$_POST['id']."','".$_POST['date']."') ";
	$q_add = mysqli_query($link,$s_add);
	
if($q_add){ echo "<h3 class='w3-text-teal'>".$time." ".$_POST['id']."  บันทึกสำเร็จ</h3>"; }else{ echo "Add DATA ERROR!!"; }

	}
	}



} // if date ==0
//echo $s_d;
?>