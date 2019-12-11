<script>
$(document).ready(function(){
	$.ajax({
		method: "POST",
		url: "tb_std_hw.php",
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
<?php include('db.php');
session_start();
$s = "select * from tb_student59 where student_id = '".$_SESSION['student_id']."' ";
$q = mysqli_query($link,$s);
$rs = mysqli_fetch_array($q);
$level = ($y-$rs['year_in'])+$rs['class'];
?>
  <h3>หน้าหลักส่งการบ้าน ปีการศึกษา 25<?php echo $y." ".$rs['student_id']." ".$_SESSION['name'].
  " ชั้น ม.".$level."/".$rs['room']."  เลขที่  ".$rs['ordinal']; ?> </h3>
</div>
<div id="add_couse_status"></div>

<div id="table_couse"></div>
