<?php
	session_start();
	//echo $_POST['username'];
	//echo $_POST['password'];
	include("db.php");

	$strUsername = mysqli_real_escape_string($link,$_POST['username']);
	$strPassword = mysqli_real_escape_string($link,$_POST['password']);

	$strSQL = "SELECT * FROM manager WHERE username = '".$strUsername."'
	and password = '".$strPassword."'";
	//echo $strSQL;
	$objQuery = mysqli_query($link,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "Y";
			//*** Update Status Login

			//*** Session
			$_SESSION["manager_id"] = $objResult["username"];
			$_SESSION["group_hw"] = "manager";
			session_write_close();

			//*** Go to Main pageu
			//header("location:index.php");


		}else{
		$strSQL2 = "SELECT * FROM tb_teacher WHERE teacher_id = '".$strUsername."' and password = '".$strPassword."' ";
		$objQuery2 = mysqli_query($link,$strSQL2);
		$objResult2 = mysqli_fetch_array($objQuery2);
			if($objResult2)
			{
			echo "Y";
			//*** Session ***//
			$_SESSION["teacher_id"] = $objResult2["teacher_id"];
			$_SESSION["teacher_Username"] = $strUsername;
			$_SESSION["group_hw"] = "teacher";
			$_SESSION["password"] = $objResult2["password"];
			$_SESSION["name"] = $objResult2["t_firstname"]." ".$objResult2["t_lastname"];
			session_write_close();
			}else{
				$strSTD = "SELECT * FROM tb_student59 WHERE student_id = '".$strUsername."' and password = '".$strPassword."'  ";
				$Std_query = mysqli_query($link,$strSTD);
				$re_std = mysqli_fetch_array($Std_query);
				if($re_std){
					echo "Y";
					//*** Session ***//
					$_SESSION["student_id"] = $re_std["student_id"];
					$_SESSION["student_name"] = $re_std["s_firstname"]." ".$re_std["s_lastname"];
					$_SESSION["group_hw"] = "student";
					$_SESSION['strEmail'] = $re_std['EMAIL'];
					$_SESSION["name"] = $re_std["s_firstname"]." ".$re_std["s_lastname"];
					$_SESSION['year_in'] = $re_std["year_in"];
					$_SESSION['room'] = $re_std["room"];
					$_SESSION['ordinal'] = $re_std["ordinal"];
					$_SESSION['class'] = $re_std["class"];

					$_SESSION['level'] = ($y - $re_std["year_in"]) + $re_std["class"];
					session_write_close();
					}else{


					echo " ชื่อผู้ใช้  หรือ  รหัสผ่านไม่ถูกต้อง.";
					}


		}
	}
	mysqli_close($link);
?>
