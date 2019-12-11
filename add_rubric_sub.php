<script>
$(document).ready(function(){
	
	$('#form_rubric_sub').hide();
	$('#form_rubric_quality').hide();
	$('#show_rubric_sub').click(function(){
		$('#form_rubric_sub').slideDown();
		$('#show_rubric_sub').hide();
		
	});
	$('#btn_close_form_add_couse').click(function(){
		$('#form_rubric_sub').slideUp();
		$('#show_rubric_sub').show();
		
	});
	
	$('#save_add_couse').click(function(){
		$.ajax({
		method: "POST",
		url: "add_rubric_sub2.php",
		data: 
		{ 
			mode: "add",
			id_rubric : $('#id_rubric').val(),
			rubric_sub_name : $('#rubric_sub_name').val()
			
			
		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			$('#rubric_sub_name').val("");
			
			$.ajax({
			method: "POST",
			url: "tb_list_rubric_sub.php",
			data: { mode: "list",
					id : $('#id_rubric').val()
			}
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});
		
		
	});
		$.ajax({
		method: "POST",
		url: "tb_list_rubric_sub.php",
		data: { mode: "list",
				id : $('#id_rubric').val()
				}
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
			url: "add_rubric_sub2.php",
			data: { 
				mode: "del",
				id : ID		
				}
			})
			.done(function(data) {
			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "tb_list_rubric_sub.php",
			data: { mode: "list",
					id : $('#id_rubric').val()
					}
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
			
			});	
			}
				
		}
		function add_rubric_quality(name){
			
			$('#form_rubric_quality').slideDown();
			
			
			
		}
		function del_rubric_sub(ID){
			var result = confirm("ต้องการลบข้อมูล?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "add_rubric_sub2.php",
			data: { 
				mode: "del_sub",
				id : ID		
				}
			})
			.done(function(data) {
			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "tb_list_rubric_sub.php",
			data: { mode: "list",
					id : $('#id_rubric').val()
					}
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
			
			});	
			}
				
		}
		function edit_rubric_sub(ID,NAME,QUALITY){
			$('#form_rubric_quality').slideDown();
			$('#id_sub').val(ID);
			$('#rubric_quality').val(NAME);
			$('#quality').val(QUALITY);
			$('#save_rubric_quality').hide();
			$('#save_edit_rubric_quality').show();
		}
		function add_rubric_quality(name){
			$('#form_rubric_quality').slideDown();
			
			
			
		}
</script>
<a href="index.php?m=add_rubric" class="w3-btn w3-orange">กลับไปยังเกณฑ์รูบริค</a>
<button id="show_rubric_sub" class="w3-btn w3-green">เพิ่มหัวข้อการวัดผล</button>
<div class="w3-center w3-xlarge">เกณฑ์การให้คะแนน <b>
<?php 
	$rubric = "select * from rubric where id = '".$_GET['id']."' ";
	$q_rubric = mysqli_query($link, $rubric);
	$r_rubric = mysqli_fetch_array($q_rubric);
	echo $r_rubric['rubric_name'];
?></div>
	<div id="form_rubric_sub">
	<p>
	<input class="w3-input w3-border " id="id_rubric" type="text" value="<?php echo $_GET['id']; ?>">
	
	<label class="w3-label w3-text-teal"><b>หัวข้อการวัดผล</b></label>
	<input class="w3-input w3-border " id="rubric_sub_name" type="text">
	<p>
	<button id="save_add_couse" class="w3-btn w3-blue">บันทึก</button>
	<button id="btn_close_form_add_couse" class="w3-btn w3-red">ปิด</button>
	</div>
	
<br>
<div id="table_couse"></div>
	
	