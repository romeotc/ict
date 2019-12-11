<?php
	include('db.php');
	
	if($_POST['mode']=='add'){
			$add = "INSERT INTO hw (id_couse, hw_name, room, id_rubric, start_date, end_date, score, present, term) 
			VALUES( '".$_POST['couse_id']."', 
			'".$_POST['hw_name']."', '".$_POST['room']."', '".$_POST['rubric_id']."',
			'".$_POST['start_date']."', '".$_POST['end_date']."', '".$_POST['score']."' ,'".$y."', '".$t."' )";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='del'){
			$del = "delete from hw where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			echo $del;
			if($q_del)
			{
				echo "ลบข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='edit'){
			$add = "UPDATE  hw SET id_couse='".$_POST['couse_id']."', hw_name='".$_POST['hw_name']."',  
			room='".$_POST['room']."', id_rubric = '".$_POST['rubric_id']."', start_date='".$_POST['start_date']."', 
			end_date='".$_POST['end_date']."', score='".$_POST['score']."', present='".$y."', term='".$t."' where id = '".$_POST['id']."' ";
			$q_add = mysqli_query($link, $add);
			//echo $add;
			if($q_add)
			{
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='edit_detail'){
			$add = "UPDATE  hw SET detail_hw='".$_POST['detail']."' where id = '".$_POST['id']."' ";
			$q_add = mysqli_query($link, $add);
			//echo $add;
			if($q_add)
			{
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
	}
?>