<?php
	include('db.php');
	$date = date("Y-m-d H:i:s");
	//echo $_POST['id_hw'];
	//echo $_GET['id_hw'];
	//$uploadOk = 1;
	session_start();
	//echo "a=".$_FILES['filename'];
	//echo "a".$_POST['mode'].$_POST['id_hw'];
	$info = end( explode( '.' , $_FILES['filename']["name"] ) ) ;
	$filename = $_POST['id_hw']."_".$_SESSION['student_id'].".".$info;
	//echo $filename;
	if($_POST['mode']=='send'){

				if (!file_exists('hw_file')) {
					mkdir('hw_file', 0777, true);
				}
				
				
				//echo "ext=".$info ;

				$target_dir = "hw_file/";
				$target_file = $target_dir . basename($filename);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists

// Check file size
				if ($_FILES["filename"]["size"] > 50000000000) {
					echo "Sorry, your file is too large.";
				$uploadOk = 0;
				
				 header( "location: std_show_hw.php?id=".$_POST['id_hw'] );
						exit(0);
				}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
				} else {
				$chk = "select * from send_hw where id_hw = '".$_POST['id_hw']."' and student_id = '".$_SESSION['student_id']."' ";
				$q_chk = mysqli_query($link,$chk);
				$num = mysqli_num_rows($q_chk);
				echo $chk;
				if($num==0){ // if num
			
			$add = "INSERT INTO send_hw(student_id, id_hw, filename, datetime) VALUES( '".$_SESSION['student_id']."', 
			'".$_POST['id_hw']."', '".$filename."', '".$date."')";
			$q_add = mysqli_query($link, $add);
			echo $add;
			if($q_add)
			{
				if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["filename"]["name"]). " has been uploaded.";
							 header( "location: std_show_hw.php?id=".$_POST['id_hw'] );
						exit(0);
				} else { echo "Sorry, there was an error uploading your file."; }
			}	
			
			}else{ // if num
			$add = "UPDATE send_hw SET filename ='".$filename."', datetime = '".$date."' where id = '".$_POST['id']."' ";
			$q_add = mysqli_query($link, $add);
			echo $add;
			if($q_add)
			{ //2
				if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["filename"]["name"]). " has been uploaded.";
							 header( "location: std_show_hw.php?id=".$_POST['id_hw'] );
						exit(0);
				} else { echo "Sorry, there was an error uploading your file.";	}
			} //2
			
			} //// if num
				
				
				}	// if uploadOK
						
		} /* mode = send */
	
	
		if($_POST['mode']=='del'){
		
		$del = "delete from send_hw where id = '".$_POST['id']."' ";
			$q_del = mysqli_query($link, $del);
			echo $del;
			if($q_del)
			{	
				$a = $_POST['filename'];
				unlink("hw_file/".$a);
				echo "ลบข้อมูลสำเร็จ";
				
			}
			header( "location: std_show_hw.php?id=".$_POST['id_hw'] );
						exit(0);
		}
		if($_POST['mode']=='list'){
			header( "location: std_show_hw.php?id=".$_POST['id_hw'] );
						exit(0);
			
		}
	if($_POST['mode']=='edit_comment'){
		$date = date("Y-m-d H:i:s");
		$chk = "select * from send_hw where id = '".$_POST['id']."' and student_id = '".$_SESSION['student_id']."' ";
		$q_chk = mysqli_query($link,$chk);
		$num = mysqli_num_rows($q_chk);
		if($num>0){
			
			$add = "UPDATE  send_hw SET comment ='".$_POST['comment']."', datetime = '".$date."' where id = '".$_POST['id']."' ";
			$q_add = mysqli_query($link, $add);
			//echo $add;
			if($q_add)
			{
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
		}else{
			$s="INSERT INTO send_hw (student_id , id_hw , comment , datetime) values 
			( '".$_SESSION['student_id']."','".$_POST['id_hw']."' , '".$_POST['comment']."' , '".$date."' ) ";
			$q = mysqli_query($link,$s);
			if($q)
			{
				echo "บันทึกการแก้ไขข้อมูลสำเร็จ";
			}
		}
			
	}
	
	echo "555";
?>
