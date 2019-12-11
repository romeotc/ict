<?php
	include('db.php');

?>
<div >
<h3 class="w3-center w3-text-blue">ตารางรายวิชา</h3>
<table class="w3-table w3-striped w3-bordered w3-hoverable	">
    <tr class="w3-teal">
      <th>#</th>
      <th>รหัสวิชา</th>
      <th>ชื่อวิชา</th>
	  <th>ระดับชั้น</th>
	  <th>ครู</th>
	  <th>เครื่องมือ</th>
    </tr>
	<?php
		$tb_couse ="select * from tb_couse order by id desc";
		$q_couse = mysqli_query($link,$tb_couse);
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){
	
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row_couse['couse_id']; ?></td>
	<td><?php echo $row_couse['couse_name']; ?></td>
	<td><?php echo "ม.".$row_couse['level']; ?></td>
	<td><?php echo $row_couse['teacher_id']; ?></td>
	<td>
	<button class="w3-btn w3-orange w3-small">แก้ไข</button>
	<button id="btn_del_couse" onclick="del_couse('<?php echo $row_couse['id']; ?>');" class="w3-btn w3-red w3-small">ลบ</button>
	</td>
	</tr> 
		<?php $i++; } ?>
		
		<br>
		</div>