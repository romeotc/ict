<?php include('db.php');


?>

<?php

		$s = "select * from tb_student59 where student_id = '".$_POST['student_id']."'"  ;
		$q = mysqli_query($link,$s);
		$num = mysqli_num_rows($q);

	if($_POST['level']>=3){ $class = 4; }else{ $class =1; }
	$year_in = $y - ($_POST['level']-$class);

		//echo "n".$num;
		$add = "INSERT INTO tb_student59 ( s_firstname, s_lastname, year_in, class, room, ordinal, student_id,
		pin, password) VALUES (  '".$_POST['name']."', '".$_POST['last']."',
			'".$year_in."', '".$class."','".$_POST['room']."',  '".$_POST['ordinal']."',  '".$_POST['student_id']."', '".$_POST['pin']."' ,
			'".$_POST['pass']."' )
			";

		if($_POST['mode']=='save' && $_POST['student_id']!=''){
			//echo $add;
			$q2 = mysqli_query($link,$add);
		}
			if($q2){

			//echo $q2;
			echo "1";

			}else{
			echo "0";
			//echo $q2;
			//echo $add;
			}
?>
