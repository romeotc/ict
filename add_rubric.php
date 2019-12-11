<script>
$(document).ready(function(){
	
	$('#form_add_couse').hide();
	$('#show_add_couse').click(function(){
		$('#form_add_couse').slideDown();
		$('#show_add_couse').hide();
		
	});
	$('#btn_close_form_add_couse').click(function(){
		$('#form_add_couse').slideUp();
		$('#show_add_couse').show();
		
	});
	
	$('#save_add_couse').click(function(){
		$.ajax({
		method: "POST",
		url: "add_rubric2.php",
		data: 
		{ 
			mode: "add",
			rubric_name : $('#rubric_name').val(),
			rubric_score : $('#rubric_score').val(),
			teacher_id : $('#teacher_id').val()
			
		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			$('#rubric_name').val("");
			$('#rubric_score').val("");
			$('#teacher_id').val("");
			$.ajax({
			method: "POST",
			url: "tb_list_rubric.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});
		
		
	});
		$.ajax({
		method: "POST",
		url: "tb_list_rubric.php",
		data: { mode: "list" }
		})
		.done(function(data) {
		$('#table_couse').html(data);
		});
		
		$('#btn_save_edit').click(function(){
			//alert(ID);
			var result = confirm("ยืนยันบันทึกข้อมูลที่แก้ไข?");
			if (result) {
		
			$.ajax({
			method: "POST",
			url: "add_rubric2.php",
			data: { 
				mode: "edit",
				id : ID_edit,
				couse_id : $('#couse_id').val(),
				rubric_name : $('#rubric_name').val(),
				rubric_score : $('#rubric_score').val(),
				teacher_id : $('#teacher_id').val()
				
				}
			})
			.done(function(data) {
				
			$('#add_couse_status').html(data);
			
			$('#id').val("");
			$('#rubric_name').val("");
			$('#rubric_score').val("");
			$('#teacher_id').val("");
			
			$.ajax({
			method: "POST",
			url: "tb_list_rubric.php",
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
		url: "tb_list_rubric.php",
		data: { mode: "" }
		})
		.done(function(data) {
		$('#table_couse').html(data);
		});
	
});
		
		function del_rubric(ID){
			var result = confirm("ต้องการลบข้อมูล?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "add_rubric2.php",
			data: { 
				mode: "del",
				id : ID		
				}
			})
			.done(function(data) {
			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "tb_list_rubric.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
			
			});	
			}
				
		}
		function edit_rubric(ID,RUBRIC_NAME,RUBRIC_SCORE,TEACHER_ID){
				//alert(DETAIL);
				ID_edit = ID;
				alert(ID_edit);
				
				$('#form_add_couse').slideDown();
				$('#show_add_couse').hide();
				$('#btn_save_edit').show();
				$('#save_add_couse').hide();
				
				$('#show_add_couse').hide();
				$('#id').val(ID);
				$('#rubric_name').val(RUBRIC_NAME);
				
				$('#rubric_score').val(RUBRIC_SCORE);
				$('#teacher_id').val(TEACHER_ID);
				
				
			
				
			$.ajax({
			method: "POST",
			url: "add_rubric2.php",
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
<div class="w3-container w3-deep-purple">
  <h3>แบบฟอร์มเพิ่มเกณฑ์รูบริค</h3>
</div>

<div id="form_add_couse">
<div class="w3-container">

	
 
		<p>
  <label class="w3-label w3-text-teal"><b>ชื่อเกณฑ์รูบริค</b></label>
  <input class="w3-input w3-border " id="rubric_name" type="text">
	<p>
	 <label class="w3-label w3-text-teal"><b>คะแนน</b></label>
  <input class="w3-input w3-border " id="rubric_score" type="text">
	<p>
	
  <input class="w3-input w3-border " id="teacher_id" type="hidden" value="<?php echo $_SESSION['teacher_id']; ?>">
  <p>
  <button id="save_add_couse" class="w3-btn w3-blue">บันทึก</button>
  <button  id="btn_save_edit" class="w3-btn w3-orange" >บันทึกการแก้ไข</button>
  <button id="btn_close_form_add_couse" class="w3-btn w3-red">ปิด</button>
</div>
</div>
<p>
<button id="show_add_couse" class="w3-btn w3-green">เพิ่มรูบริค</button>
<div id="add_couse_status" class="w3-text-orange w3-center w3-large" ></div>
<div id="table_couse"></div>
</div>