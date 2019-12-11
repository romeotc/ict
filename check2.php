<?php //echo $_POST['src']; ?>

<table class="w3-table">
<tr class="w3-teal" >
<th>#</th>
<th>เลขนักเรียน</th>
<th>ชื่อ-นามสกุล</th>
<th>ชั้น-ห้อง</th>
<th>เครื่องมือ</th>

</tr>
<?php
		include('db.php');
		$src = "select * from tb_student59 where s_firstname like '".$_POST['src']."%' or 
		student_id like '".$_POST['src']."%' order by room asc";
		$q_src = mysqli_query($link,$src);
		echo $src;
		$i = 1;
		while($rs_src = mysqli_fetch_array($q_src)){
?>
<?php ?> 
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $rs_src['student_id']; ?></td>
<td><?php echo $rs_src['s_firstname']." ".$rs_src['s_lastname']; ?></td>
<td><?php 
		
echo "ม.".(($y-$rs_src['year_in'])+$rs_src['class'])."/".$rs_src['room']; ?></td>
<td><a href="index.php?m=std_src&id=<?php echo $rs_src['student_id']; ?>" class="w3-btn w3-small w3-orange">เลือก</a>
</tr>

<?php // close if =2 
		$i++; } ?>
</table>