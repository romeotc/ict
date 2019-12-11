<?php
	include('db.php');

?>
<div >
<h3 class="w3-center w3-text-blue">ตารางเกณฑ์รูบริค</h3>
<table class="w3-table w3-striped w3-bordered w3-hoverable	">
    <tr class="w3-teal">
      <th>#</th>
      <th>ชื่อ</th>
      <th>คะแนนเต็ม</th>
	  <th>ครู</th>
	  <th>เครื่องมือ</th>
    </tr>
	<?php
		$tb_couse ="select * from rubric where teacher_id = '".$_SESSION['teacher_id']."' order by id desc";
		$q_couse = mysqli_query($link,$tb_couse);
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){
	
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><a href="index.php?m=add_rubric_sub&id=<?php echo $row_couse['id']; ?>"><?php echo $row_couse['rubric_name']; ?></a></td>
	<td><?php echo $row_couse['rubric_score']; ?></td>
	<td><?php echo $row_couse['teacher_id']; ?></td>
	<td>
	<button onclick="edit_rubric('<?php echo $row_couse['id']; ?>','<?php echo $row_couse['rubric_name']; ?>',
	'<?php echo $row_couse['rubric_score']; ?>','<?php echo $row_couse['teacher_id']; ?>');" class="w3-btn w3-orange w3-small">แก้ไข</button>
	<button id="btn_del_couse" onclick="del_rubric('<?php echo $row_couse['id']; ?>');" class="w3-btn w3-red w3-small">ลบ</button>
	</td>
	</tr> 
		<?php $i++; } ?>
		
		<br>
		</div>