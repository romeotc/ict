

<div ><center>คะแนนแบบทดสอบหลังเรียน บทที่ 1 </div>
<table class="w3-table w3-striped w3-bordered ">
<tr class="w3-teal"><th>#</th><th>no</th><th>name</th><th>room</th><th>ordinal</th><th>score</th><th>datetime</th></tr>

<?php 
$s = "select * from unit1_posttest as a inner join tb_student59 as b on a.std_id = b.student_id order by datetime";
$q = $conn->query($s);
$i =1;
while($rs = $q->fetch_assoc()){
	
?>
<tr>
<td><?php echo $i; ?> </td>
<td><?php echo $rs['std_id']; ?> </td>
<td><?php echo $rs['s_firstname']."  ".$rs['s_lastname']; ?> </td>
<td><?php echo $rs['room']; ?> </td>
<td><?php echo $rs['ordinal']; ?> </td>
<td><?php echo $rs['score']."/".$rs['max_score']; ?> </td>
<td><?php echo $rs['datetime']; ?> </td>
</tr>
<?php $i++;} ?>

</table>
<?php //echo $s; ?>