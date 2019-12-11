<?php
	include('db.php');

?>

<div >

<table class="w3-table w3-striped w3-bordered w3-hoverable	">
    <tr class="w3-teal">
      <th>#</th>

      <th>ชื่อแบบทดสอบ</th>



	  <th>เครื่องมือ</th>
    </tr>
	<?php
		$tb_couse ="select * from test ";
		$q_couse = mysqli_query($link,$tb_couse);
		//echo $tb_couse;
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){

	?>


	<tr>
	<td><?php echo $i; ?></td>

	<td><?php echo $row_couse['test_name']; ?></td>

	<td>
	<button id="btn_edit_couse" class="w3-btn w3-orange w3-small"
	onclick="edit_couse('<?php echo $row_couse['id']; ?>','<?php echo $row_couse['id_couse']; ?>','<?php echo $row_couse['test_name']; ?>');">
		<i class="fa fa-edit"></i>
	</button>
	<button id="btn_del_couse"
	onclick="del_couse('<?php echo $row_couse['id']; ?>');" class="w3-btn w3-red w3-small"><i class="fa fa-trash"></i></button>
	<a id="btn_add_test" href="index.php?m=teacher_test_sub&id=<?php echo $row_couse['id']; ?>" class="w3-btn w3-blue w3-small" >
	 <i class="fa fa-plus"></i> เพิ่มคำถาม</a>
	</td>
	</tr>
		<?php $i++; } ?>

		<br><br>
		</div>
