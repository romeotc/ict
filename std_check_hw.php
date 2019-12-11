<script>
$(document).ready(function(){
	$.ajax({
		method: "POST",
		url: "tb_std_check.php",
		data: { mode: "list" }
		})
		.done(function(data) {
		$('#table_couse').html(data);
		});
		
});
	
	function Send_hw(ID){
		//alert(ID);
		var result = confirm("ตรวจสอบไฟล์ที่ต้องการส่งถูกต้อง?");
			if (result) {
		$.ajax({
		method: "POST",
		url: "send_hw2.php",
		data: 
		{ 
			mode: "send",
			id_hw : ID
						
		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			
			$.ajax({
			method: "POST",
			url: "tb_std_hw.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});
		
		}
	}
		
	
	function del_file(ID,ID_HW,FILE){
			var result = confirm("ต้องการลบข้อมูล?");
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
			url: "tb_std_hw.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
			
			});	
			}
				
		}

		
		
</script>
<div class="w3-container w3-orange w3-text-shadow">
  <h3>หน้าหลักตรวจการบ้าน ปีการศึกษา 25<?php session_start(); echo $y." ".$_SESSION['name']; ?> </h3>
</div>
<div id="add_couse_status"></div>

<div id="table_couse"></div>
