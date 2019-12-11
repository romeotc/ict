<?php 
include('db.php');
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
<table class="w3-table w3-border w3-card-2" >
<tr class="w3-teal">
<th>#</th><th>วันที่</th><th>คำถาม</th><th>คำตอบ</th></tr>
<?php 
$i=1;
$s = "select * from tb_question";
$q = $conn->query($s);
while($rs = $q->fetch_array()){
	?><tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $rs['datetime']; ?></td>
	<td><?php echo $rs['question']; ?></td>
	<td><?php echo $rs['answer']; ?></td></tr>
	<?php
$i++;	
}
?>
