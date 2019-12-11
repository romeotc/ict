<?php
session_start();
echo $_POST["hdnFbID"]."<br>";
echo $_POST["hdnName"]."<br>";
echo $_POST["hdnEmail"]."<br>";

	$_SESSION["strFacebookPic"] = "https://graph.facebook.com/".$_POST["hdnFbID"]."/picture?type=large";
	
	$_SESSION['strFacebookLink'] = "https://www.facebook.com/app_scoped_user_id/".$_POST["hdnFbID"]."/";


	include('db.php');


	// Check Exists ID
	$strSQL = "SELECT * FROM tb_facebook WHERE EMAIL = '".$_POST["hdnEmail"]."' ";
	$objQuery = mysqli_query($link,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		$up = "UPDATE tb_facebook SET FACEBOOK_ID = '".$_POST['hdnFbID']."' ,
			 NAME = '".$_POST["hdnName"]."', PICTURE = '".$_SESSION["strFacebookPic"]."', 
			LINK = '".$_SESSION['strFacebookLink']."' where EMAIL = '".$_POST["hdnEmail"]."' ";
			echo $up;
			$q = mysqli_query($link,$up);
		$_SESSION["strFacebookID"] = $objResult["FACEBOOK_ID"];
		$_SESSION["group_hw"] = "student";
		$_SESSION["student_id"] = $objResult["student_id"];
		$_SESSION["student_name"] = $objResult["s_firstname"]." ".$objResult["s_lastname"];
		$_SESSION['strEmail'] =  $objResult["EMAIL"];
		$_SESSION["name"] = $objResult["s_firstname"]." ".$objResult["s_lastname"];
		header("location:index.php");
		exit();
	}
	else
	{
		// Create New ID
			
			//$strPicture = "https://graph.facebook.com/".$_POST["hdnFbID"]."/picture?type=large";
			$_SESSION["strFacebookPic"] = "https://graph.facebook.com/".$_POST["hdnFbID"]."/picture?type=large";
			$_SESSION['strFacebookLink'] = "https://www.facebook.com/app_scoped_user_id/".$_POST["hdnFbID"]."/";
			$_SESSION['FACEBOOK_ID'] = $_POST["hdnFbID"];
			$_SESSION['before_Email'] =  $_POST["hdnEmail"];
			$_SESSION['strFacebookName'] = $_POST['hdnName'];
/*			
			$strSQL ="  INSERT INTO  tb_facebook (FACEBOOK_ID	,NAME,EMAIL,PICTURE,LINK,CREATE_DATE) 
				VALUES
				('".trim($_POST["hdnFbID"])."',
				'".trim($_POST["hdnName"])."',
				'".trim($_POST["hdnEmail"])."',
				'".trim($strPicture)."',
				'".trim($strLink)."',
				'".trim(date("Y-m-d H:i:s"))."')";
			$objQuery  = mysqli_query($link,$strSQL);
			*/

			header("location:index.php?m=register");
			exit();
	}

	mysqli_close();
?>