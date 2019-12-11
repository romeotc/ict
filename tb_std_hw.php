<script>
function popup(ID,STD) {
    window.open("std_show_hw.php?id=" + ID +"&std=" + STD, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=10,left=100,width=1200,height=800");
}
</script>
<?php
	include('db.php');
		$tb_couse ="select *, hw.id as id_hw  from hw inner join tb_couse as b on hw.id_couse = b.id 
		where level = 4 and present = '".$y."'     ";
		$q_couse = mysqli_query($link,$tb_couse);
		$num = mysqli_num_rows($q_couse);
		if($num==0){ echo "<h3><center>ยังไม่มีการมอบหมายการบ้านครับ</h3>";}else{
	//echo $level;
?>
<div >
<h3 class="w3-center w3-text-blue w3-text-shadow">ตารางการบ้าน</h3>
<table class="w3-table w3-striped w3-bordered w3-hoverable	">
    <tr class="w3-teal">
      <th>#</th>
      
      <th>ชื่อการบ้าน</th>
	  <th>รายละเอียด</th>
	 
	  <th>กำหนดส่ง</th>
	  <th>กำหนดส่ง</th>
	  <th>สถานะ</th>
	  <th>เครื่องมือ</th>
    </tr>
	<?php
		
		//echo $tb_couse;
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){
	
	?>
	<tr>
	<td><?php echo $i.$row_couse['id_hw']; ?></td>
	<td><?php echo $row_couse['hw_name']; ?></td>
	<td><?php echo $row_couse['detail_hw'];?></td>
	
	
	<td><?php echo $row_couse['start_date']; ?></td>
	<td><?php echo $row_couse['end_date']; ?></td>
	
	<td>
	<?php 
			$chk_file ="select * from send_hw where student_id = '".$_SESSION['student_id']."' 
			and id_hw = '".$row_couse['id_hw']."' ";
			$q_chk = mysqli_query($link,$chk_file);
			$rs_file = mysqli_fetch_array($q_chk);
			if($rs_file){ echo "<h3 class='w3-text-teal'><b>ส่งแล้ว</b></h3>";}else{ 
			echo "<h3 class='w3-text-red'><b>ยังไม่ส่ง</b></h3>";} ?></td>
			<td><?php			
			
			if ($rs_file) {
			?>
			<a onclick="popup('<?php echo $row_couse['id_hw']; ?>','<?php echo $_SESSION['student_id']; ?>' )"  class="w3-btn w3-green">ดูการบ้าน</a>
			<?php
			}else{ ?>
			<a onclick="popup('<?php echo $row_couse['id_hw']; ?>','<?php echo $_SESSION['student_id']; ?>' )"  class="w3-btn w3-green">ส่งการบ้าน</a>
		<?php } ?>
	</td>
	</tr> 
		<?php $i++; }  ?>
		<?php }  ?>  <!-- ปิด else -->
		<br>
		</div>