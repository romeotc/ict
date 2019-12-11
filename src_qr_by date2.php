<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="th" class="no-js">
  <head>
  <title>บทเรียนบทเว็บวิชาเทคโนโลยีสารสนเทศ</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/w3.css">
<?php
include('db.php');

$date = date("Y-m-d");
$time = date("H:i:s");
$s = "select * from tb_facebook as a inner join tb_track as b on a.EMAIL = b.email  
where b.email = '".$_POST['id']."' and date(b.datetime) = '".$date."'  ";
$q = mysqli_query($link,$s);
$rs = mysqli_num_rows($q);
$result = mysqli_fetch_array($q);
//echo $s;

if($rs>0){
echo " <h3>".$time. " <h4 class='w3-text-red'> " .$_POST['id'].  " </h4> <h4>เช็คชื่อไปแล้ว   ".$result['datetime']."</h4>";
}else{
	if($_POST['mode']=='add'){
	$s_add = "INSERT INTO tb_track (EMAIL) VALUES ('".$_POST['id']."') ";
	$q_add = mysqli_query($link,$s_add);
	
if($q_add){ echo "<h3 class='w3-text-teal'>".$time." ".$_POST['id']."  บันทึกสำเร็จ</h3>"; }else{ echo "Add DATA ERROR!!"; }

	}
	}



$s = "select * from tb_track as a inner join tb_facebook as b on a.email = b.Email 
where date(datetime) = '".$date."' order by datetime desc limit 100";
$q = mysqli_query($link,$s);
//echo $s;
$i=1;
?>
<table class="w3-table w3-bordered w3-striped">
<tr class="w3-teal"><td>#</td><td>รหัสนักเรียน</td><td>ชื่อ-นามสกุล</td><td>วันที่</td><td>ห้อง</td><td>เลขที่</td></tr>

<?php while($rs = mysqli_fetch_assoc($q)){ ?>
<tr>
<td> <?php echo $i; ?> </td>
<td> <?php echo $rs['student_id']; ?> </td>
<td> <?php echo $rs['s_firstname']." ".$rs['s_lastname']; ?> </td>
<td> <?php echo $rs['datetime']; ?> </td>
<td> <?php echo "ม.".$rs['level2']."/".$rs['room']; ?> </td>
<td> <?php echo $rs['ordinal']; ?> </td>
</tr>
	

	
	
<?php
$i++;	
}
?>

</table>