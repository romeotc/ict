

<script>
var ID_edit = $('#id').val();
$(document).ready(function(){
$('#btn_save_edit').hide();
	$('#form_add_couse').hide();

	$('#show_add_couse').click(function(){
		$('#form_add_couse').slideDown();
		$('#save_add_couse').show();
			$('#btn_save_edit').hide();
		$('#score').val("");
			$('#couse_id').val("");
			$('#test_name').val("");

			tinyMCE.activeEditor.setContent('');




		$('#show_add_couse').hide();



	});
	$('#btn_edit_couse').click(function(){
		$('#form_add_couse').slideDown();
		$('#show_add_couse').hide();
		$('#save_add_couse').hide();
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
		url: "t_test2.php",
		data:
		{
			mode: "add",
			couse_id : $('#couse_id').val(),
			test_name : $('#test_name').val()



		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);

			$('#couse_id').val("");
			$('#test_name').val("");

			$.ajax({
			method: "POST",
			url: "t_test3.php",
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
			url: "t_test2.php",
			data: {
				mode: "edit",
				id : ID_edit,
				couse_id : $('#couse_id').val(),
				test_name : $('#test_name').val()

				}
			})
			.done(function(data) {

			$('#add_couse_status').html(data);

			$('#couse_id').val("");
			$('#test_name').val("");

			$.ajax({
			method: "POST",
			url: "t_test3.php",
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
		url: "t_test3.php",
		data: { mode: "" }
		})
		.done(function(data) {
		$('#table_couse').html(data);
		});


});

		function del_couse(ID){
			console.log(ID);
			var result = confirm("ต้องการลบข้อมูล?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "t_test2.php",
			data: {
				mode: "del",
				id : ID


				}
			})
			.done(function(data) {
			$('#add_couse_status').html(data);
			$.ajax({
			method: "POST",
			url: "t_test3.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});

			});
			}

		}
			function edit_couse(ID,ID_COURSE,test_name){
				//alert(DETAIL);
				ID_edit = ID;
			//	alert(ID_edit);

				$('#form_add_couse').slideDown();
				$('#show_add_couse').hide();
				$('#btn_save_edit').show();
				$('#save_add_couse').hide();

				$('#show_add_couse').hide();
				$('#id').val(ID);
				$('#couse_id').val(ID_COURSE);

				$('#test_name').val(test_name);

				tinyMCE.activeEditor.setContent(DETAIL);


			$.ajax({
			method: "POST",
			url: "t_test2.php",
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
  <h3>ข้อมูลแบบทดสอบ</h3>
</div>

<div id="form_add_couse">
<div class="w3-container">

	<p>

  <label class="w3-label w3-text-teal"><b>ชื่อแบบทดสอบ</b></label>
  <input class="w3-input w3-border " id="test_name" type="text">



	<p>


  <button id="save_add_couse" class="w3-btn w3-blue">บันทึก</button>
  <button onclick="save_edit_couse();" id="btn_save_edit" class="w3-btn w3-orange" >บันทึกการแก้ไข</button>
  <button id="btn_close_form_add_couse" class="w3-btn w3-red">ปิด</button>
</div>
</div>
	<div class="w3-container w3-margin">

		<div id="add_couse_status" class="w3-text-orange w3-center w3-large" ></div>
		<button id="show_add_couse" class="w3-button w3-green"><i class="fa fa-plus"></i> เพิ่มแบบทดสอบ</button>

		<div id="table_couse"></div>
	</div>

</div>
