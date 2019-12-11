<?php
	include('db.php');

	if($_POST['mode']=='add'){
			$add = "INSERT INTO test_sub (id_test, test_sub_name,score,q1,q2,q3,q4,answer) VALUES( '".$_POST['id_test']."',
			'".$_POST['test_sub_name']."','".$_POST['test_score']."',
			'".$_POST['q1']."',
			'".$_POST['q2']."',
			'".$_POST['q3']."',
			'".$_POST['q4']."',
			'".$_POST['answer']."'
		)";
			$q_add = mysqli_query($link, $add);

			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
			for($i=1;$i<=4;$i++){
			$c[$i]= $_POST['choice'.$i];
			$order[$i] = $_POST['order'.$i];
			$score[$i] = $_POST['score'.$i];
			$add_c = "INSERT INTO test_choice (id_test_sub, test_sub_name) VALUES( '".$_POST['id_test']."',
			'".$_POST['test_sub_name']."')";
			$q_add = mysqli_query($link, $add_c);

			if($q_add_c)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}

			}
	}
	if($_POST['mode']=='edit'){
			$add = "UPDATE `test_sub` SET `test_sub_name`='".$_POST['test_sub_name']."',`score`='".$_POST['test_score']."' ,
			q1 = '".$_POST['q1']."',
			q2 = '".$_POST['q2']."',
			q3 = '".$_POST['q3']."',
			q4 = '".$_POST['q4']."' ,
			answer = '".$_POST['answer']."'
			WHERE id = '".$_POST['test_id']."' ";
			$q_add = mysqli_query($link, $add);

			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
			for($i=1;$i<=4;$i++){
			$c[$i]= $_POST['choice'.$i];
			$order[$i] = $_POST['order'.$i];
			$score[$i] = $_POST['score'.$i];
			$add_c = "INSERT INTO test_choice (id_test_sub, test_sub_name) VALUES( '".$_POST['id_test']."',
			'".$_POST['test_sub_name']."')";
			$q_add = mysqli_query($link, $add_c);

			if($q_add_c)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}

			}
	}
	if($_POST['mode']=='add_test_choice'){
			$add = "INSERT INTO test_choice (id_test_sub, choice_name, score)
			VALUES( '".$_POST['id_sub']."', '".$_POST['choice_name']."', '".$_POST['score']."' )";
			$q_add = mysqli_query($link, $add);
			if($q_add)
			{
				echo "เพิ่มข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='del'){
			$del = "delete from test_sub where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			if($q_del)
			{
				echo "ลบข้อมูลสำเร็จ";
			}
	}
	if($_POST['mode']=='edit_test_sub'){
			$edit = "UPDATE `test_sub` SET `test_sub_name`='".$_POST['test_sub_name']."',`score`='".$_POST['score']."' WHERE id = '".$_POST['id']."' ";
			$q_edit = mysqli_query($link, $edit);
			if($q_edit)
			{
				echo "1";
			}else{
				echo '0';
			}
	}
?>
