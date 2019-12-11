<?php 
include('db.php');

	$ID = mysqli_real_escape_string($link,$_GET['id']);
	$d = date('Y-m-d');
	
	$c = "select * from tb_track where EMAIL = '".$ID."' and date(datetime) = '".$d."' ";
	$qc = mysqli_query($link,$c);
	$nc = mysqli_num_rows($qc);
	if($nc==0){
		$s = "INSERT INTO tb_track (email) VALUES ('".$ID."') ";
		$q = mysqli_query($link,$s);
		if($q){ echo "success.."; }
		
	}
		


?>