<?php
	include('db.php');
	
	if($_POST['mode']=='add'){
			$add = "INSERT INTO tb_couse (couse_id, couse_name, level, teacher_id) VALUES( '".$_POST['couse_id']."', 
			'".$_POST['couse_name']."', '".$_POST['level']."', '".$_POST['teacher_id']."')";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='del'){
			$del = "delete from tb_couse where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			if($q_del)
			{
				echo "ลบข้อมูลสำเร็จ";
			}
	}
?>