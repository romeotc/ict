<?php
	include('db.php');
	
	if($_POST['mode']=='add'){
			$add = "INSERT INTO rubric_sub (id_rubric, rubric_sub_name) VALUES( '".$_POST['id_rubric']."', 
			'".$_POST['rubric_sub_name']."')";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='add_rubric_quality'){
			$add = "INSERT INTO rubric_quality (id_rubric_sub, rubric_quality_name, quality) 
			VALUES( '".$_POST['id_sub']."', '".$_POST['rubric_quality']."', '".$_POST['quality']."' )";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='edit_rubric_quality'){
			$add = "UPDATE rubric_quality set rubric_quality_name='".$_POST['rubric_quality']."'
			, quality='".$_POST['quality']."' where id = '".$_POST['id_sub']."' ";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='del'){
			$del = "delete from rubric_sub where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			if($q_del)
			{
				echo "ลบข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='del_sub'){
			$del = "delete from rubric_quality where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			if($q_del)
			{
				echo "ลบข้อมูลสำเร็จ";
			}
	}
?>