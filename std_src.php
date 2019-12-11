<?php include('db.php'); ?>
<a href="index.php?m=check" class="w3-btn w3-orange ">กลับไปค้นหานักเรียน</a><p>
<?php
//echo $y;
			$std = "select * from tb_student59 where student_id = '".$_GET['id']."'";
			$q_std = mysqli_query($link,$std);
			$rs_std = mysqli_fetch_array($q_std);
			//echo $std;
			?>
			<div class="w3-container w3-yellow w3-center"><h3> <?php
			$level2 = (($y-$rs_std['year_in'])+$rs_std['class']);
			echo "รหัส".$rs_std['student_id']." ".$rs_std['title_name'].$rs_std['s_firstname']." ".$rs_std['s_lastname']."  ชั้น ม.".$level2."/".$rs_std['room'].
			" เลขที่ ".$rs_std['ordinal'];
?></h3>
</div>
<table class="w3-table w3-centered w3-bordered w3-hoverable"><tr>
<th>#</th>
<th>ชื่อวิชา</th>
<th>ชื่อการบ้าน</th>
<th>คะแนน</th>
<th>กำหนดส่ง</th>
<th>สถานะส่ง</th>
<th>สถานะตรวจ</th>
<th>หมายเหตุ</th>

<?php
		$hw = " select *, a.id as id_hw from hw as a inner join tb_couse as b on a.id_couse = b.id 
		where b.level = '".$level2."' order by start_date asc";
		$q_hw = mysqli_query($link,$hw);
		//echo $hw;
		$i = 1;
		while( $rs_hw = mysqli_fetch_array($q_hw)){
?>
	<tr>
	<td><?php echo $i;  ?></td>
	<td><?php echo $rs_hw['couse_name'];  ?></td>
	<td><?php echo $rs_hw['hw_name'];  ?></td>
	<td><?php echo $rs_hw['score'];  ?></td>
		<td><?php echo shortdate($rs_hw['start_date'])."<br>".shortdate($rs_hw['end_date']);  ?></td>
	<td><!---สถานะส่ง -->
	<?php $send_hw = "select * from send_hw where id_hw = '".$rs_hw['id_hw']."' and student_id = '".$rs_std['student_id']."' ";
				$q_send = mysqli_query($link,$send_hw);
				$rs_send = mysqli_fetch_array($q_send);
							
				$date1 = new DateTime($rs_send['datetime']);
				$date2 = new DateTime($rs_hw['end_date']);
				$diff=date_diff($date1,$date2);
			
				
				
				if($rs_send){
					if($date1 < $date2){echo " <div class='w3-teal'>"; }else{ echo " <div class='w3-orange'>"; }
				echo datetimethai($rs_send['datetime']);
				echo $diff->format("( %R %d วัน %H ชม. )");
					
				 }else{ echo "<div class='w3-red'>ยังไม่ส่ง"; }
				?></div>
	</td>
	<td>
	<?php
	$status = "select sum(quality_score) as total,datetime from hw_score where student_id = '".$rs_std['student_id']."' and id_hw = '".$rs_hw['id_hw']."' ";
	$q_status = mysqli_query($link,$status);
	$rs_status = mysqli_fetch_array($q_status);
	//echo $rs_status['total'];
	//echo $status;
	if($rs_status['total']<=0){ ?><div class="w3-yellow">รอตรวจ</div><?php }else{ ?>
	<div class="w3-green">ตรวจแล้ว  (<?php echo shortdate($rs_status['datetime']); ?>)</div>
	<?php } ?>
	</td>
	<td></td>
	</tr>
	
		
	<?php $i++;	} ?>
	</table>

