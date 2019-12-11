<?php
	include('db.php');

	if($_POST['mode']=='add' && $_POST['test_name']!=""){
			$add = "INSERT INTO test (id_couse, test_name)
			VALUES( '10',
			'".$_POST['test_name']."')";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='del'){
			$del = "delete from test where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			if($q_del)
			{
				echo "ลบข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='edit'){
			$add = "UPDATE  test SET test_name='".$_POST['test_name']."'

			 where id = '".$_POST['id']."' ";
			$q_add = mysqli_query($link, $add);
			//echo $add;
			if($q_add)
			{
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
	}

?>
