<?php
	include_once('db.php');
//	$date = date('Y-m-d H:i:s');
	//echo $date;
	if($_POST['mode']=='submit_ans')
	{
		if($_POST['val']!='' && $_POST['student_id']!='' && $_POST['test_id'] !='' && $_POST['id_test']!='')
		{
			$check = "select * from test_answer where student_id = '".$_POST['student_id']."' and
			test_sub_id = '".$_POST['test_id']."' and id_test = '".$_POST['id_test']."' ";
			$qcheck = mysqli_query($link,$check);
			if($qcheck){
				$num_check = mysqli_num_rows($qcheck);
				if($num_check==0){
					$add ="INSERT INTO `test_answer`(`student_id`, `test_sub_id`, `answer`, `id_test`, `present`)
					VALUES ('".$_POST['student_id']."','".$_POST['test_id']."','".$_POST['val']."',
					'".$_POST['id_test']."','61') ";
					$qadd = mysqli_query($link,$add);
					if($qadd)
					{
						echo '1,Answer Submit Success';
					}else{
						echo '2,Answer Submit Error';
					}
				}
			}


		}
	}
	mysqli_close($link);

?>
