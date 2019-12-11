<?php include('db.php'); ?>
<div class="w3-container w3-teal w3-center">
  <h3>แบบตรวจคะแนน 
  <?php 
	$tt = "select * from tb_teacher where teacher_id = '".$_SESSION['teacher_id']."' ";
	$q_t = mysqli_query($link, $tt);
	$rs_q = mysqli_fetch_array($q_t);
  echo $rs_q['teacher_id']." ".$rs_q['t_firstname']." ".$rs_q['t_lastname']; 
   echo "ภาคเรียนที่  ".$t." ปีการศึกษา  ".$y; 
  ?>
  
  </h3>
	
  
</div>
<table class="w3-table w3-bordered">
<tr class="w3-orange">
<th>#</td>

<th>ชื่อวิชา</th>
<th>ชื่อการบ้าน</th>
<th>ห้อง</th>
<th>กำหนดส่ง</th>
<th>เครื่องมือ</th>
</tr>
<?php
		
		$hw = "select *, a.id as hw_id from hw as a inner join tb_couse as b on a.id_couse = b.id where teacher_id = '".$_SESSION['teacher_id']."' 
		order by id_couse asc, a.id asc, room asc ";
		$q_hw = mysqli_query($link, $hw);
		$i = 1;
		//echo $hw;
		$id_couse = "";
		while($rs_hw = mysqli_fetch_array($q_hw)){
?>
		<tr <?php if($id_couse != $rs_hw['id_couse']){ ?> class='w3-topbar  w3-border-gray' <?php } ?> >
		<td><?php echo $i; ?></td>
		<td><?php if($id_couse != $rs_hw['id_couse']) { 
		echo $rs_hw['couse_id']." ".$rs_hw['couse_name']; 
		}else{ }?></td>
		<td><?php echo $rs_hw['hw_name'];?></td>
		<td><?php echo $rs_hw['room'];?></td>
		<td><?php echo shortdate($rs_hw['end_date']); ?></td>
		<td><a href="index.php?m=teacher_check_hw&hw_id=<?php echo $rs_hw['hw_id']; ?>" class="w3-btn w3-yellow w3-small">ตรวจ</a></td>
		</tr>
		<?php $i++; $id_couse = $rs_hw['id_couse']; } ?>
</table>
