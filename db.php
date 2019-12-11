<?php  $link = mysqli_connect('localhost', 'kruimron_root', 'starsmti', 'kruimron_hw');
mysqli_set_charset($link, "utf8");
if (!$link) {
    //die('Could not connect: ' . mysqli_connect_errno());
}
//$result = mysqli_query($link, "SELECT * WHERE 1=1");
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//echo 'Connected DB successfully';
  $s = "select * from tb_present";
	$q_present = mysqli_query($link,$s);
	$present = mysqli_fetch_array($q_present,MYSQLI_ASSOC);
	$y = $present['present'];
	$t = $present['term'];
	session_start();
	if($_SESSION['group_hw']=='student'){
	$std = "SELECT * FROM tb_student59 WHERE student_id = '".$_SESSION["student_id"]."' ";
	$q_std = mysqli_query($link, $std);
	$rs = mysqli_fetch_array($q_std);
	$student_id = $rs['student_id'];
	$level = $rs['level2'];
	$room = $rs['room'];
	$name = $rs['s_firstname']." ".$rs['s_lastname'];
	$ordinal = $rs['ordinal'];
}
?>
