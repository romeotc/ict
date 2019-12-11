<!DOCTYPE html>
<html>
    <head>
        <title>ระบบเช็คชื่อเข้าเรียน</title>
		 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
	<script src="./js/jquery-3.1.1.min.js"></script>
	
	  <script src="./js/jquery-ui.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		  <link href="css/w3.css" rel="stylesheet">
		  
		   <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

 html, body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Prompt', serif;
 }


</style>
<script>
	
 function del_file(ID,ID_HW,FILE){
			var result = confirm("การลบไฟล์ที่ส่งมาแล้วจะทำให้วันที่ส่งของนักเรียนเปลี่ยนแปลงเป็นวันที่ส่งล่าสุด ยืนยันต้องการลบข้อมูล?");
			//alert($('#id_hw').val());
			if (result) {
			$.ajax({
			method: "POST",
			url: "send_hw2.php",
			data: { 
				mode: "del",
				id : ID,
				id_hw : ID_HW,
				filename : FILE
				}
			})
			.done(function(data) {
			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "std_show_hw2.php",
			data: { 
			mode: "list",
			id_hw : $('#id_hw').val() 
			}
			})
			.done(function(data) {
				//alert(data);
			$('#file_upload').html(data);
			});
			
			});	
			}
				
		}
	$('document').ready(function(){
		
		$.ajax({
			method: "POST",
			url: "std_show_hw2.php",
			data: { mode: "list", id_hw : $('#id_hw').val() }
			})
			.done(function(data) {
			$('#file_upload').html(data);
			});
		
	});
 


 
  </script>
<?php
	include('db.php');
		$tb_couse ="select * from hw where id = '".$_GET['id']."'";
		$q_couse = mysqli_query($link,$tb_couse);
		$rs = mysqli_fetch_array($q_couse);
		//echo $tb_couse;
	//echo $level;
?>
<div > 
<h3 class="w3-center w3-text-blue w3-text-shadow">ชื่อการบ้าน   <?php echo $rs['id'].".".$rs['hw_name']; ?></h3>
<h4 class="w3-center"><?php echo $_SESSION['student_id']; ?> </h4>
<input id="id_hw" value="<?php echo $_GET['id']; ?>" type="hidden">


  
<div class="w3-card">

<header class="w3-container w3-light-blue">
  <h4><center>รายละเอียดการบ้าน</h4>
</header>

<div class="w3-container">
 <?php echo $rs['detail_hw']; ?>
</div>

<footer class="w3-container ">
  <h5></h5>
</footer>

</div>
<br><br>



<div class="w3-row w3-card">
<header class="w3-container w3-amber">
  <h4><center>ส่วนการส่งงานนักเรียน</h4>
</header>
	<div id="from_upload" class="w3-border w3-container w3-padding-16"><center>
		<h4 class="w3-center">งานที่นักเรียนอัพโหลดไฟล์</h4>
	<div id="file_upload"></div>
	
		
	</div>
	
	</div>