<?php include('db.php');
$s ="select * from send_hw where id = '".$_POST['id_send']."' ";
$q = mysqli_query($link,$s);
$rs = mysqli_fetch_array($q);
echo $rs['datetime']; 
if($rs['datetime']==""){ echo "กรณีพิมพ์คำตอบครั้งแรก กดปุ่มนี้   -->  ";
?><input type="button" class="w3-btn w3-blue" value="Refresh" onClick="window.location.reload()"><?php

 }

?>