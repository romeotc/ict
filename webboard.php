  <title><?php echo $title; ?></title>
    <meta charset="utf-8">
	 <script src="js/jquery.js"></script>

<script>
$(document).ready(function(){
	//alert("555");
	$('#btn_question').click(function(){
		//alert("555");
		$.ajax({
			method: "POST",
			url: "webboard2.php",
			data: { 
			std: $('#std').val(),
			question : $('#question').val()
			}
			})
			.done(function(data) {
				alert(data);
			//$('#status').html(data);
			$.ajax({
			method: "POST",
			url: "tb_list_question.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
			});
			
		
	});
	$.ajax({
			method: "POST",
			url: "tb_list_question.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
	
});
</script>
<div class="w3-panel w3-leftbar w3-lime w3-large ">
<h3>นักเรียนที่มีความจำเป็นต้องการติดต่อครู เกี่ยวกับปัญารายวิชา การทำแบบฝึกหัด หรือ การส่งงาน สามารถติดต่อได้ตามช่องทางต่อไปนี้</h3>
 
</div> 

 <a href="https://www.facebook.com/ict31105" class="w3-btn w3-blue" " target="_blank">
 <h3>1. facebook.com/ict31105</h3></a>
 <a href="romeo_tc@hotmail.com" class="w3-btn w3-indigo" " target="_blank">
 <h3>1. email:romeo_tc@hotmail.com</h3></a>
 <header class="w3-panel w3-leftbar w3-lime w3-large "><h3>ติดต่อ/สอบถาม</h3></header>
 <div class="w3-container">
 <div class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">หากนักเรียนมีข้อสงสัยในด้านการเรียน การทำงาน การบ้าน หรือการส่งงาน สามารถสอบถามได้ทางช่องทางต่อไปนี้ครับ</h2>
   <label>รหัสประจำตัวนักเรียน</label>
   <div id="status"></div>
  <input class="w3-input w3-border w3-round-large" id="std" type="text"></p>

    <label>คำถาม</label>
    <textarea class="w3-input w3-border" type="text" id="question"></textarea>
<p>
   <button class="w3-btn w3-blue" id="btn_question">ส่งคำถาม</button>
  </div>

  <br>
</div>
  <br>
  <div id="table_couse"></div>
    <br>
	  <br>
 </div>