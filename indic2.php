<?php
	include('db.php');
	$date = date('Y-m-d H:i:s');
	//echo $date;
	
	$name = $_POST['u']."-".$_POST['s']."-".$_POST['a'];
	//echo "t=".$_POST['text'];
	$s = "select * from tb_intro where name =  '".$name."' ";
	$q = mysqli_query($link,$s);
	$num = mysqli_num_rows($q);
	//echo $num;
	if($_POST['mode']=='save'){
	if($num>0){
		
		$up = "UPDATE tb_intro SET text= '".$_POST['text']."',datetime = '".$date."' where name = '".$name."' ";
			$q_add = mysqli_query($link, $up);
			//echo $up;
			if($q_add)
			{
				
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
		
	}else{
		
			$add = "INSERT INTO tb_intro (name, text) 
			VALUES( '".$name."', 
			'".$_POST['text']."' )";
			$q_add = mysqli_query($link, $add);
			//echo $add;
			if($q_add)
			{
				
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	
	} // mode = save
	
	
?>