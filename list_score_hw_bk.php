<?php include('db.php'); ?>
<?php include('function.php'); ?>
<script>
function open_pop(ID,STD) {
    window.open("check_score_hw3.php?id=" + ID + "&std=" + STD, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=10,left=10,width=800,height=600");
}
</script>


<p ><center class="w3-text-gray w3-xlarge"><?php 
	$hw2 = "select * from hw where id = '".$_POST['id_hw']."' ";
		$q_hw2 = mysqli_query($link,$hw2);
		$rs_hw2 = mysqli_fetch_array($q_hw2);
		
		echo "คะแนนเต็ม ".$rs_hw2['score']." กำหนดส่ง วันที่  ". datetimethai($rs_hw2['start_date'])." - ".datetimethai($rs_hw2['end_date']);
		?>
<table class="w3-table w3-centered w3-bordered ">
<tr class="w3-teal w3-center">
<th>#</th>
<th>รหัสนักเรียน</th>
<th>ชื่อ-นามสกุล</th>
<th>วันที่ส่ง</th>
<th>การบ้าน</th>
<th>คะแนนที่ได้</th>

</tr>
<?php 
	
		
		$std = "select * from tb_facebook where present = '".$_POST['level']."' and room = '".$_POST['room']."' order by  s_firstname asc ";
		//echo $std;
		$q_std = mysqli_query($link,$std);
		$i = 1;
		while( $rs_std = mysqli_fetch_array($q_std)){
?>
		<tr>
		<td><?php echo $i; ?> </td>
		<td><?php echo $rs_std['student_id']; ?> </td>
		<td><?php echo $rs_std['s_firstname']." ".$rs_std['s_lastname'] ; ?> </td>
		<td><?php 
		$hw = "select * from send_hw where id_hw = '".$_POST['id_hw']."' and student_id = '".$rs_std['student_id']."' ";
		$q_hw = mysqli_query($link,$hw);
		$rs_hw = mysqli_fetch_array($q_hw);
		if($rs_hw['filename']!=""){
		?>
		
	<?php } ?></td>
		<td><?php 
			$date1 = new DateTime($rs_hw['datetime']);
			$date2 = new DateTime($rs_hw2['end_date']);
			$diff=date_diff($date1,$date2);
			if($rs_hw['datetime']!=""){
			if($date1 < $date2){echo " <div class='w3-text-teal'>"; }else{ echo " <div class='w3-text-red'>"; }
			echo datetimethai($rs_file['datetime']);
			echo $diff->format("( %R %d วัน %H ชม. )  ");
			
		
		
			echo shortdate($rs_hw['datetime'])."</div>";  }  ?></td>
		<td>
			<button onclick="open_pop(<?php echo $_POST['id_hw']; ?>','<?php echo $rs_std['student_id']; ?>');" class="w3-btn w3-indigo" >
		ตรวจการบ้าน</button> 
		<?php //ส่งการบ้าน 
				$chk_radio = " select sum(quality_score) as total,datetime from hw_score where student_id = '".$rs_std['student_id']."' 
				and id_hw = '".$_POST['id_hw']."'  ";
				$q_radio = mysqli_query($link,$chk_radio);
				$rs_radio = mysqli_fetch_array($q_radio);
				
				
				$chk_hw = "select * from send_hw where student_id = '".$rs_std['student_id']."' and id_hw = '".$_POST['id_hw']."' ";
				//echo $chk_hw;
				$q_chk = mysqli_query($link,$chk_hw);
				$rs_chk = mysqli_fetch_array($q_chk);
				if(!$rs_chk){ ?> <a href="" id="btn_show_form_score" class='w3-btn w3-yellow' >ยังไม่ส่ง</a> 
				<?php }else{  if($rs_radio['total']>0){ ?>  <a href="#top" class="w3-btn w3-orange" 
				onclick="open_form('<?php echo $rs_std['student_id']; ?>','<?php echo $rs_std['s_firstname']; ?>',
				'<?php echo $rs_std['s_lastname']; ?>','update');">แก้ไขคะแนน</a> 
				<?php }else{ ?>
				<a href="#top" class="w3-btn w3-orange" onclick="open_form('<?php echo $rs_std['student_id']; ?>','<?php echo $rs_std['s_firstname']; ?>',
				'<?php echo $rs_std['s_lastname']; ?>','add');">ตรวจ</a> <?php }  }  echo $rs_radio['sum(quality_score)']; ?>
		
		</td>
		<td class="w3-centered w3-text-green w3-xlarge">
		<?php
		
			if($rs_radio['total']!=""){
			echo $rs_radio['total']."  (".shortdate($rs_radio['datetime']).")"; }
		
		?>
		</td>
		</tr>
		
		
		
		
		
		<?php  $i++; } ?>
</table>