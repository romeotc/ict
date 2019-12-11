<script>
$(document).ready(function(){
	
	$('#txtsrc').keyup(function(){
		
		//alert($('#txtsrc').val());
		$.ajax({
			method: "POST",
			url: "check2.php",
			data: { 
				mode: "src",
				src : $('#txtsrc').val()
				
				}
			})
			.done(function(data) {
			$('#src_status').html(data);
		});
	});
	
});
</script>

<div class="w3-yellow w3-center "><h3>แบบค้นหาข้อมูลการส่งการบ้านรายบุคคล  ปีการศึกษา 25<?php  echo $y  ?></h3>
<p class="w3-center">กรุณากรอกชื่อนักเรียนเพื่อค้นหา</p></div>
<p>
<input class="w3-input w3-xlarge" placeholder="พิมพ์ชื่อนักเรียน" id="txtsrc">

<div id="src_status"></div>


