<?php include('db.php'); ?>
<?php
session_start();
$Q[1] = $_POST['Q1'];
$Q[2] = $_POST['Q2'];
$Q[3] = $_POST['Q3'];
$Q[4] = $_POST['Q4'];
$Q[5] = $_POST['Q5'];
$Q[6] = $_POST['Q6'];
$id_hw = $_POST['id_hw'];
$row = $_POST['row'];
$id_Q[1] = $_POST['id_q1'];
$id_Q[2] = $_POST['id_q2'];
$id_Q[3] = $_POST['id_q3'];
$id_Q[4] = $_POST['id_q4'];
$id_Q[5] = $_POST['id_q5'];
$id_Q[6] = $_POST['id_q6'];
$std_id = $_POST['std_id'];
//echo "row=".$row."id_Q=".$id_Q[1]."id_Q=".$id_Q[2]."id_Q=".$id_Q[3];

if($_POST['Mode']=='add'){

	for($i=1;$i<=$row;$i++){
	$c = "select * from hw_score where student_id = '".$std_id."' and id_hw = '".$id_hw."' and id_rubric_sub = '".$id_Q[$i]."'";
	$q_c = mysqli_query($link,$c);
	$num = mysqli_num_rows($q_c);
	//echo "66".$num;
	if($num==""){
	$add = "INSERT INTO hw_score (student_id,id_hw,id_rubric_sub,quality_score) VALUES 
	('".$std_id."','".$id_hw."','".$id_Q[$i]."','".$Q[$i]."') ";
	$q_add = mysqli_query($link,$add);
	//if(!$q_add){ echo "การเพิ่มข้อมูลผิดพลาด"; }else{ echo "เพิ่มข้อมูลเสร็จสิ้น"; }
	}else{
	$add = "UPDATE hw_score SET quality_score = '".$Q[$i]."' where student_id =  '".$std_id."' and id_hw = '".$id_hw."' 
	and id_rubric_sub = '".$id_Q[$i]."' ";
	
	$q_add = mysqli_query($link,$add);
	}
	//close for
	if(!$q_add){ echo "การเพิ่มข้อมูลผิดพลาด"; }else{ echo "เพิ่มข้อมูลเสร็จสิ้น กดปุ่ม ตกลง เพื่อไปยังหน้าลงทะเบียน"; } }

	
}

?>
