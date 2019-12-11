

<script>
var ID_edit = $('#id').val();
$(document).ready(function(){
	
	$('#form_add_couse').hide();
	$('#show_add_couse').click(function(){
		$('#form_add_couse').slideDown();
		$('#score').val("");
			$('#couse_id').val("");
			$('#hw_name').val("");
			tinyMCE.activeEditor.setContent('');
			$('#room').val("");
			$('#rubric_id').val("");
			$('#start_date').val("");
			$('#end_date').val("");
		
		
		
		$('#show_add_couse').hide();
		$('#btn_save_edit').hide();
		
		
	});
	$('#btn_edit_couse').click(function(){
		$('#form_add_couse').slideDown();
		$('#show_add_couse').hide();
		$('#btn_save_edit').show();
		
		
	});
	
	$('#btn_close_form_add_couse').click(function(){
		$('#form_add_couse').slideUp();
		$('#show_add_couse').show();
		var txt=tinyMCE.activeEditor.getContent();
		alert(txt);
		
	});
	
	$('#save_add_couse').click(function(){
		$.ajax({
		method: "POST",
		url: "add_hw2.php",
		data: 
		{ 
			mode: "add",
			couse_id : $('#couse_id').val(),
			hw_name : $('#hw_name').val(),
			detail : $('#detail_hw').val(),
			room : $('#room').val(),
			rubric_id : $('#rubric_id').val(),
			start_date : $('#start_date').val(),
			end_date : $('#end_date').val(),
			score : $('#score').val()
		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			
			$('#couse_id').val("");
			$('#hw_name').val("");
			$('#detail_hw').val("");
			$('#room').val("");
			$('#rubric_id').val("");
			$('#start_date').val("");
			$('#end_date').val("");
			$.ajax({
			method: "POST",
			url: "tb_list_hw.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});
		
		
	});
	$('#btn_save_edit').click(function(){
			//alert(ID);
			var result = confirm("ยืนยันบันทึกข้อมูลที่แก้ไข?");
			if (result) {
		
			$.ajax({
			method: "POST",
			url: "add_hw2.php",
			data: { 
				mode: "edit",
				id : ID_edit,
				couse_id : $('#couse_id').val(),
				hw_name : $('#hw_name').val(),
				room : $('#room').val(),
				rubric_id : $('#rubric_id').val(),
				start_date : $('#start_date').val(),
				end_date : $('#end_date').val(),
				score : $('#score').val()
				}
			})
			.done(function(data) {
				
			$('#add_couse_status').html(data);
			
			$('#couse_id').val("");
			$('#hw_name').val("");
			$('#detail_hw').val("");
			$('#room').val("");
			$('#rubric_id').val("");
			$('#start_date').val("");
			$('#end_date').val("");
			$.ajax({
			method: "POST",
			url: "tb_list_hw.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			$('#form_add_couse').slideUp();
			});
			
			});	
			}
				
		});
	
	
	
		$.ajax({
		method: "POST",
		url: "tb_list_hw.php",
		data: { mode: "" }
		})
		.done(function(data) {
		$('#table_couse').html(data);
		});

	
});
		
		function del_couse(ID2){
			//alert(ID2);
			var result = confirm("ต้องการลบข้อมูล?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "add_hw2.php",
			data: { 
				mode: "del",
				id : ID2
				
				}
			})
			.done(function(data) {
			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "tb_list_hw.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
			
			});	
			}
				
		}
			function edit_couse(ID,ID_HW,HW_NAME,DETAIL,ROOM,SCORE,ID_RUBRIC,START_DATE,END_DATE){
				//alert(DETAIL);
				ID_edit = ID;
				alert(ID_edit);
				
				$('#form_add_couse').slideDown();
				$('#show_add_couse').hide();
				$('#btn_save_edit').show();
				$('#save_add_couse').hide();
				
				$('#show_add_couse').hide();
				$('#id').val(ID);
				$('#couse_id').val(ID_HW);
				
				$('#hw_name').val(HW_NAME);
				$('#room').val(ROOM);
				$('#score').val(SCORE);
				$('#rubric_id').val(ID_RUBRIC);
				$('#start_date').val(START_DATE);
				$('#end_date').val(END_DATE);
				tinyMCE.activeEditor.setContent(DETAIL);
			
				
			$.ajax({
			method: "POST",
			url: "add_hw2.php",
			data: { 
				mode: "",
				id : ID		
				}
			})
			.done(function(data) {
						
				
			$('#add_couse_status').html(data);
						
			});	
			
				
		}
		

  </script>



<div class="w3-container w3-teal">
  <h3>แบบฟอร์มเพิ่มการบ้าน</h3>
</div>

<div id="form_add_couse">
<div class="w3-container">

	<p>
  <label class="w3-label w3-text-teal"><b>เลือกวิชา</b></label>
  <input class="w3-input w3-border " id="id" type="text" >
	<select class="w3-select w3-border" name="option" id="couse_id">
	<option value="" disabled selected>เลือกวิชา</option>
	<?php 
			$couse = "select * from tb_couse where teacher_id = '".$_SESSION['teacher_id']."' ";
			$q_couse = mysqli_query($link,$couse);
			while( $r_couse = mysqli_fetch_array($q_couse)){
	?>
		<option value="<?php echo $r_couse['id']; ?>"><?php echo $r_couse['couse_id']." ".$r_couse['couse_name']; ?></option>
			<?php } ?>
		</select>
	<p>
		<p>
  <label class="w3-label w3-text-teal"><b>ชื่อการบ้าน</b></label>
  <input class="w3-input w3-border " id="hw_name" type="text">
	
	<label class="w3-label w3-text-teal"><b>ห้อง</b></label>
	<select class="w3-select w3-border " name="option" id="room" >
	<option value="" disabled selected>เลือกห้อง</option>
	<?php for($i=1;$i<=11;$i++){
			?>
  <option value="<?php echo $i; ?>" ><?php echo "ห้อง.".$i; ?></option>

			<?php } ?>
</select>
	<p>
	<label class="w3-label w3-text-teal"><b>คะแนน</b></label>
	 <input class="w3-input w3-border" type="text" id="score"><p>
	
	
	<label class="w3-label w3-text-teal"><b>เลือกเกณฑ์การวัดรูบริค</b></label>
	<select class="w3-select w3-border " id="rubric_id" name="option">
  <option value="" disabled selected>เลือกรูบริค</option>
			<?php
			$teacher = "select * from rubric ";
			$q_teacher = mysqli_query($link,$teacher);
			while( $row_teacher = mysqli_fetch_array($q_teacher)){
			?>
			<option value="<?php echo $row_teacher['id']; ?>"><?php echo $row_teacher['rubric_name']." ".$row_teacher['t_firstname']; ?></option>
			<?php } ?>
</select>
	<p>
	<label class="w3-label w3-text-teal"><b>วันที่เริ่มส่ง</b></label>
	 <input class="w3-input w3-border" type="text" id="start_date"><p>
	 <p>
	<label class="w3-label w3-text-teal"><b>สิ้นสุดการส่ง</b></label>
	 <input class="w3-input w3-border" type="text" id="end_date"><p>

  <button id="save_add_couse" class="w3-btn w3-blue">บันทึก</button>
  <button onclick="save_edit_couse();" id="btn_save_edit" class="w3-btn w3-orange" >บันทึกการแก้ไข</button>
  <button id="btn_close_form_add_couse" class="w3-btn w3-red">ปิด</button>
</div>
</div>
<p>
<button id="show_add_couse" class="w3-btn w3-green">เพิ่มการบ้าน</button>
<div id="add_couse_status" class="w3-text-orange w3-center w3-large" ></div>
<div id="table_couse"></div>
</div>