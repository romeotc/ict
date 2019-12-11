

<div ><center></div>
<br>
<table class="w3-table w3-striped w3-bordered ">
<tr class="w3-teal"><th>#</th><th>no</th><th>name</th><th>room</th><th>ordinal</th><th>score</th><th>datetime</th></tr>

<?php 
$s = "select * from unit11 as a inner join tb_student59 as b on a.student_id = b.student_id order by datetime";
$q = $conn->query($s);
$i =1;
//echo $s;
while($rs = $q->fetch_assoc()){
	
?>
<tr>
<td><?php echo $i; ?> </td>
<td><?php echo $rs['student_id']; ?> </td>
<td><?php echo $rs['s_firstname']."  ".$rs['s_lastname']; ?> </td>
<td><?php echo $rs['room']; ?> </td>
<td><?php echo $rs['ordinal']; ?> </td>
<td><?php echo $rs['score']."/10"; ?> </td>
<td><?php echo $rs['datetime']; ?> </td>
</tr>
<?php $i++;} ?>

</table>
<?php //echo $s; ?>