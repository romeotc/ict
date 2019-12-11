<?php
	include('db.php');
	
	if($_POST['mode']=='add'){
			$add = "INSERT INTO rubric (rubric_name, rubric_score, teacher_id) VALUES( '".$_POST['rubric_name']."', 
			'".$_POST['rubric_score']."', '".$_POST['teacher_id']."')";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='del'){
			$del = "delete from rubric where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			if($q_del)
			{
				echo "ลบข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='edit'){
			$add = "UPDATE  rubric SET  rubric_name='".$_POST['rubric_name']."',  
			rubric_score='".$_POST['rubric_score']."', teacher_id = '".$_POST['teacher_id']."' 
			where id = '".$_POST['id']."' ";
			$q_add = mysqli_query($link, $add);
			//echo $add;
			if($q_add)
			{
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
	}
?>