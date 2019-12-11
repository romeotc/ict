	<?php
	include('db.php');
$std_id = $_POST['std_id'];
$id_hw = $_POST['id_hw'];
	if($_POST['mode']=='t_com'){
		echo $_POST['mode'];
	$comment = "select * from tb_comment where student_id = '".$std_id."' and id_hw = '".$id_hw."' ";
	$qcom = $conn->query($comment);
	$rs = $qcom->fetch_array();
	$num_com = $qcom->num_rows;
	//echo $comment;
	if($num_com>0){ 
	$com = "UPDATE tb_comment SET t_com = '".$_POST['t_com']."' where student_id = '".$std_id."' and id_hw = '".$id_hw."' ";
	
	if($up = $conn->query($com)){ echo "update success"; }
	}
	if($num_com=='0'){
		$com = "INSERT INTO tb_comment (t_com,student_id,id_hw) VALUES 
		( '".$_POST['t_com']."' , '".$std_id."' ,'".$id_hw."') ";
	if($up = $conn->query($com)){ echo "add success"; }
	
	}
	echo $com;
	echo "num=".$num_com;
	}
	?>