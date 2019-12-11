<?php include('db.php'); ?>
<?php $s = "select * from hw where id = '".$_GET['id']."' ";
$q =mysqli_query($link,$s);

$rs = mysqli_fetch_array($q);
echo $rs['detail_hw']; ?>