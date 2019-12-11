<?php include('db.php') ?>
<?php
	
		$s = "select * from tb_facebook ";
		$q = mysqli_query($link,$s);
		while($rs = mysqli_fetch_array($q)){
			$id = 6040000+((100*$rs['room'])+$rs['ordinal']);
			$up = " update tb_facebook set std_id = '".$id."' where room = '".$rs['room']."' 
			and ordinal = '".$rs['ordinal']."' ";
			$qup = mysqli_query($link,$up);
			if($qup){ echo "success".$id."<br>"; }
			echo $up;
			
			
		}



?>