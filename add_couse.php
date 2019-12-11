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
		url: "add_couse2.php",
		data: 
		{ 
			mode: "add",
			couse_id : $('#couse_id').val(),
			couse_name : $('#couse_name').val(),
			level : $('#level').val(),
			teacher_id : $('#teacher_id').val()
			
		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			$('#couse_id').val("");
			$('#couse_name').val("");
			$('#level').val("");
			$('#teacher_id').val("");
			$.ajax({
			method: "POST",
			url: "tb_list_couse.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});
		
		
	});
		$.ajax({
		method: "POST",
		url: "tb_list_couse.php",
		data: { mode: "list" }
		})
		.done(function(data) {
		$('#table_couse').html(data);
		});

	
});
		
		function del_couse(ID){
			var result = confirm("ต้องการลบข้อมูล?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "add_couse2.php",
			data: { 
				mode: "del",
				id : ID		
				}
			})
			.done(function(data) {
			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "tb_list_couse.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
			
			});	
			}
				
		}
</script>
<div class="w3-container w3-teal">
  <h3>แบบฟอร์มเพิ่มรายวิชา</h3>
</div>

<div id="form_add_couse">
<div class="w3-container">

	<p>
  <label class="w3-label w3-text-teal"><b>รหัสวิชา</b></label>
  <input class="w3-input w3-border " id="couse_id" type="text">
	<p>
		<p>
  <label class="w3-label w3-text-teal"><b>ชื่อวิชา</b></label>
  <input class="w3-input w3-border " id="couse_name" type="text">
	<p>
	<label class="w3-label w3-text-teal"><b>ระดับชั้น</b></label>
	<select class="w3-select w3-border " name="option" id="level" >
	<option value="" disabled selected>เลือกระดับชั้น</option>
	<?php for($i=1;$i<=6;$i++){
			?>
  <option value="<?php echo $i; ?>" ><?php echo "ชั้น ม.".$i; ?></option>

			<?php } ?>
</select>
	<p>
	<label class="w3-label w3-text-teal"><b>เลือกครู</b></label>
	<select class="w3-select w3-border " id="teacher_id" name="option">
  <option value="" disabled selected>เลือกครู</option>
			<?php
			$teacher = "select * from tb_teacher";
			$q_teacher = mysqli_query($link,$teacher);
			while( $row_teacher = mysqli_fetch_array($q_teacher)){
			?>
			<option value="<?php echo $row_teacher['teacher_id']; ?>"><?php echo $row_teacher['teacher_id']." ".$row_teacher['t_firstname']; ?></option>
			<?php } ?>
</select>
	<p>

  <button id="save_add_couse" class="w3-btn w3-blue">บันทึก</button>
  <button id="btn_close_form_add_couse" class="w3-btn w3-red">ปิด</button>
</div>
</div>
<p>
<button id="show_add_couse" class="w3-btn w3-green">เพิ่มรายวิชา</button>
<div id="add_couse_status" class="w3-text-orange w3-center w3-large" ></div>
<div id="table_couse"></div>
</div>