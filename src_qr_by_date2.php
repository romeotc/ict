
<!DOCTYPE html>
<html lang="th" class="no-js">
  <head>
  <title>บทเรียนบทเว็บวิชาเทคโนโลยีสารสนเทศ</title>
    <meta charset="utf-8">

<?php
include('db.php');

$date = $_POST['date'];
echo $date;
$s = "select * from tb_student59 as a inner join tb_track as b on a.student_id = b.student_id  
where b.student_id = '".$_POST['id']."' and date(b.datetime) = '".$date."'  ";
$q = mysqli_query($link,$s);
$rs = mysqli_num_rows($q);
$result = mysqli_fetch_array($q);
//echo $s;

if($rs>0){
echo " <h3>".$time. " <h4 class='w3-text-red'> " .$_POST['id'].  " </h4> <h4>เช็คชื่อไปแล้ว   ".$result['datetime']."</h4>";
}else{
	if($_POST['mode']=='add'){
	$s_add = "INSERT INTO tb_track (student_id) VALUES ('".$_POST['id']."') ";
	$q_add = mysqli_query($link,$s_add);
	
if($q_add){ echo "<h3 class='w3-text-teal'>".$time." ".$_POST['id']."  บันทึกสำเร็จ</h3>"; }else{ echo "Add DATA ERROR!!"; }

	}
	}



$s = "select * from tb_student59 where room = '".$_POST['room']."' order by ordinal asc limit 100";
$q = mysqli_query($link,$s);
//echo $s;
$i=1;

$s_d = "select date(datetime) as date from tb_track as a inner join tb_student59 as b on 
a.student_id = b.student_id 
where room = '".$_POST['room']."' group by date(datetime)";
$q_sd = mysqli_query($link,$s_d);
$num_date = mysqli_num_rows($q_sd);
//echo $s_d;
?>
<h3>รายชื่อนักเรียน ห้อง <?php echo $_POST['room']; ?></h3>
<table class="w3-table w3-bordered w3-striped">
<tr class="w3-teal"><td>เลขที่</td><td>รหัสนักเรียน</td><td>ชื่อ-นามสกุล</td>
<!-- สร้างตารางวันที่ -->
<?php $a = 1; 
while($rs_qd = mysqli_fetch_array($q_sd)){       $d[$a] = $rs_qd['date']; ?>
<td>
<?php echo $rs_qd['date']; ?>
</td>
<?php $a++; } ?>




<?php while($rs = mysqli_fetch_assoc($q)){ ?>
<tr>
<td> <?php echo $rs['ordinal']; ?> </td>
<td> <?php echo $rs['student_id']; ?> </td>
<td> <?php echo $rs['s_firstname']." ".$rs['s_lastname']; ?> </td>
<?php for($j=1;$j<=$num_date;$j++){ ?>

<td> 
 <?php 
		$c_std = " select * from tb_track where date(datetime) = '".$d[$j]."' and student_id = '".$rs['student_id']."' ";
		$q_c_std = mysqli_query($link,$c_std);
		$rs_q = mysqli_fetch_array($q_c_std);
		//echo $c_std;
		if($rs_q['student_id']==""){ echo "<img src='img/error.png' height='32'>"; 
		}else{ echo "<img src='img/answer.png' height='32'>"; }


 ?></td>
<?php } ?>
</tr>
	

	
	
<?php
$i++;	
}
?>

</table>