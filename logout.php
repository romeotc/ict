<?php
	session_start();

	require_once("db.php");
	
	
	session_start();  
	//require_once("inc/dbconnect.php");  
	unset(  
    $_SESSION['ses_user_id'],  
    $_SESSION['ses_user_name']  ,  
    $_SESSION['ses_user_last_login'], 
	$_SESSION['strEmail'],
	$_SESSION['name'],
		$_SESSION['group_hw']
);  


	//*** Update Status
	//$sql = "UPDATE tb_student59 SET login_status = '0', last_update = '0000-00-00 00:00:00' WHERE student_id = '".$_SESSION["student_id"]."' ";
	//$query = mysqli_query($link,$sql);

	//session_destroy();
	header("location:index.php");
	
	
?>