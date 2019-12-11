<?php
	include('db.php');
	include('function.php');
	
	$level = 4;
?>
<div >
<h3 class="w3-center w3-text-blue w3-text-shadow">สถานะตรวจสอบการส่งการบ้าน</h3>
<table class="w3-table w3-striped w3-bordered w3-hoverable	w3-centered">
    <tr class="w3-teal">
      <th>#</th>
      <th>รหัสวิชา</th>
      <th>ชื่อการบ้าน</th>
	 
	  <th>กำหนดส่ง</th>
	  <th>วันที่ส่ง</th>
	  <th>ความคิดเห็นคุณครู</th>
	  <th>สถานะ</th>
    </tr>
	<?php
		$tb_couse ="select *, hw.id as id_hw  from hw inner join tb_couse as b on hw.id_couse = b.id 
		where level = '".$level."'";
		$q_couse = mysqli_query($link,$tb_couse);
		//echo $tb_couse;
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){
	
	?>
	<tr>
	<td><?php echo $i.$row_couse['id_hw']; ?></td>
	<td><?php echo $row_couse['couse_id']." ".$row_couse['couse_name']; ?></td>
	<td><?php echo $row_couse['hw_name']; ?></td>
	
	<td><?php echo datetimethai($row_couse['start_date'])."<br>".datetimethai($row_couse['end_date']); ?></td>
	<td><?php 
			$chk_file ="select * from send_hw where student_id = '".$_SESSION['student_id']."' 
			and id_hw = '".$row_couse['id_hw']."' ";
			//echo $chk_file;
			$q_chk = mysqli_query($link,$chk_file);
			$rs_file = mysqli_fetch_array($q_chk);
			
			$date1 = new DateTime($rs_file['datetime']);
			$date2 = new DateTime($row_couse['end_date']);
			$diff=date_diff($date1,$date2);
			if($rs_file['datetime']==""){ echo "<div class='w3-text-red'>ยังไม่ส่ง</div>"; }else {
			if($date1 < $date2){echo " <div class='w3-text-teal'>"; }else{ echo " <div class='w3-text-red'>"; }
			echo datetimethai($rs_file['datetime']);
			echo $diff->format("( %R %d วัน %H ชม. )");
			}

	?></td>
	<td>
	<?php 
			$chk_radio = " select * from tb_comment where student_id = '".$_SESSION['student_id']."' 
				and id_hw = '".$row_couse['id_hw']."'  ";
				$q_radio = mysqli_query($link,$chk_radio);
				$rs_radio = mysqli_fetch_array($q_radio);
			
			echo $rs_radio['t_com']; 
			?>
	</td>
	<td>
	<?php 
			$chk_radio = " select sum(quality_score) as total,datetime from hw_score where student_id = '".$_SESSION['student_id']."' 
				and id_hw = '".$row_couse['id_hw']."'  ";
				$q_radio = mysqli_query($link,$chk_radio);
				$rs_radio = mysqli_fetch_array($q_radio);
			if($rs_radio['total']==""){ echo "<div class='w3-text-orange'><b>รอการตรวจ</div>"; }else{
			echo "<div class='w3-text-teal'>".$rs_radio['total']." คะแนน  (".shortdate($rs_radio['datetime']).")</div>"; }
			?>
	</td>
	</tr> 
		<?php $i++; } ?>
		
		<br>
		</div>