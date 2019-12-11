<!DOCTYPE html>
<html lang="th" class="no-js">
  <head>
  <title>บทเรียนบทเว็บวิชาเทคโนโลยีสารสนเทศ</title>
    <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=t64xafwz3jqztvnvzu5j5hi22tn30nsriyb6mba0rv5lhonc"></script>
	
  <?php if($_GET['m']!="qr"){ ?> 
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> --><?php } ?>
	<script src="./js/jquery-3.1.1.min.js"></script>
	
	  <script src="./js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
<link href="https://fonts.googleapis.com/css?family=Maitree|Prompt&amp;subset=thai" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
div #listclub{

display: none;
}

 html, body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Prompt', serif;
 }




</style>
<style>
.sidebar1 {
	background:#ffffff;
   position: fixed;
   left: 10px;
   top: 150px;
   border: 0px solid black;
}
.content1 {
	margin-left: 390px;
   left: 300px;
   top: 130px;
	
}
</style>
<style>
input {
	text-align : center;
}
select {
	width: 70px;
    height: 37px;
	padding: 0 0 0 20px;
}
</style>
<script>
	$(document).ready(function(){
		
		$('#room').change(function(){
			//alert($('#datepicker').val());
		$.ajax({
			method: "POST",
			url: "src_qr_by_date2.php",
			data: { 
			mode: "list",
			date : $('#datepicker').val(),
			room : $('#room').val()
			}
			})
			.done(function(data) {
			$('#table').html(data);
			});
		
		
		});
		
		$('#room_add').change(function(){
			//alert($('#datepicker').val());
		$.ajax({
			method: "POST",
			url: "src_qr_by_date3.php",
			data: { 
			mode: "list",
			date : $('#datepicker').val(),
			room : $('#room_add').val()
			}
			})
			.done(function(data) {
			$('#table_add').html(data);
			});
		
		
		});
		$('#show_form_add').click(function(){
			$('#form_add_m').slideDown();
			$('#show_form_add').hide();
			
		});
	
		
	
	});
	
		
	
</script><p>
<?php if($_SESSION['group_hw']=='teacher'){ ?>
<a class="w3-btn w3-teal" id="show_form_add" href="index.php?m=src_qr&add_m=1"
<?php if($_GET['add_m']=="1"){echo "style='display:none;' "; } ?> >เช็คชื่อด้วยมือ</a> <?php } // close group teacher ?> 
<p><center>
<div class="w3-container">
<?php if($_GET['add_m']==""){ ?>
<div id="view" class="w3-card">
<p>ขั้นตอนการตรวจสอบข้อมูลนักเรียนมาเรียน คลิกเลือกห้องที่ต้องการทราบผล</p><p>
<label>เลือกห้อง</label> 
<select id="room" class="w3-select w3-border" style="width:20%;">
<option value="0" >เลือกห้อง</option>
<?php
for($i=1;$i<=11;$i++){
	echo "<option value='".$i."'>ห้อง".$i."</option>";
}
?>
</select>
<p>
</div>
<div id="table"></div><p>
<?php } 

?>
<?php if($_GET['add_m']=="1"){ ?>
<div id="form_add_m" class="w3-card" >
<p>ขั้นตอนการเช็คชื่อด้วยมือ ให้คุณครูคลิกเลือกวันที่และเวลาที่ต้องการบันทึก  จากนั้นเลือกห้อง  คลิกเลือกนักเรียนที่เข้าเรียน กดปุ่มบันทึก</p><p>
<label>เลือกวันที่ที่ต้องการเช็คชื่อ</label> 

	 <input class="w3-input w3-border" type="text" id="start_date" style="width:20%;"><p>

<label>เลือกห้อง</label><br>
<select id="room_add" class="w3-select w3-border" style="width:20%;">
<option value="0" >เลือกห้อง</option>
<?php
for($i=1;$i<=11;$i++){
	echo "<option value='".$i."'>ห้อง".$i."</option>";
}
?>
</select><p>
<input type="button" id="save_value" name="save_value" value="บันทึก" class="w3-btn w3-teal"/>
<a href="index.php?m=src_qr" id="close_form" class="w3-btn w3-red">ปิด</a>
</div><!---close form -->
<div id="table_add"></div>
<p>
<?php } ?>

</div><!--- container -->
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
	
  } );
  </script>