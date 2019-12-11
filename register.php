<!DOCTYPE html>
<html lang="th" class="no-js">
  <head>
  <title>บทเรียนบทเว็บวิชาเทคโนโลยีสารสนเทศ</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="css/w3.css">
			<script src="js/jquery-3.1.1.min.js"></script>

<?php include('db.php');


?>


<center><h4><b>คำแนะนำการลงทะเบียน</b><br>
<small>กรณีที่นักเรียนเข้าใช้งานครั้งแรกจำเป็นต้องกรอกข้อมูลนักเรียน  เพื่อให้ผู้สอนรู้จักตัวตนนักเรียน<br>
โปรดกรอกข้อมูลลงในแบบฟอร์มด้านล่างนี้ แล้วตั้งรหัสผ่านที่นักเรียนต้องการ รหัสประจำตัวและรหัสผ่านนี้เป็นข้อมูลสำคัญที่ใช้สำหรับ Login ในครั้งต่อไป
</small></h4></center>
<?php session_start(); ?>
<div class="w3-col m3 l3 s0 w3-padding w3-center">
</div>
<div class="w3-col m6 l6 s12 w3-padding">
<div class="w3-card-4">

<div class="w3-container w3-green">
  <h4>แบบฟอร์มการลงทะเบียน</h4>
</div>
  <div class="w3-container w3-border-top  w3-light-grey"><center>




      </div>

<div id="status_regis"></div>
<div class="w3-container ">
<br>

<label class="w3-text-teal"><b>เลขประจำตัวนักเรียน : เช่น <br>ถ้านักเรียน ห้อง 3 เลขที่ 1 ให้กรอก 6040301 <br> ถ้านักเรียน ห้อง 5 เลขที่ 16 ให้กรอก 6040516</b></label>
<input id="student_id" type="text"  class="w3-input w3-border w3-light-grey" placeholder="รหัสประจำตัวนักเรียน">


<br>
<label class="w3-text-teal w3-"><b>รหัสผ่าน : </b></label>
 <input id="pass" type="password"  class="w3-input w3-border w3-light-grey" >
 <br>
 <label class="w3-text-teal"><b>ยืนยันรหัสผ่าน : </b><div id="pass_no" ></div></label>
 <input id="pass_2" type="password"  class="w3-input w3-border w3-light-grey" >
 <br>

 <label class="w3-text-teal"><b>ชื่อ : </b></label>
 <input id="name" type="text"  class="w3-input w3-border w3-light-grey" >

 <br>
 <label class="w3-text-teal"><b>นามสกุล : </b></label>
 <input id="last" type="text"  class="w3-input w3-border w3-light-grey" >
 <br>
 <label class="w3-text-teal"><b>ชั้น : </b></label>

 <select id="level"  class="w3-input w3-border w3-light-grey" >
 <?php for($i=1;$i<=6;$i++){ ?>
 <option value="<?php echo $i; ?>"> <?php echo "ม.".$i; ?></option>
 <?php } ?>
 </select>

 <br>
  <label class="w3-text-teal"><b>ห้อง : </b></label>
 <select id="room"  class="w3-input w3-border w3-light-grey" >
 <?php for($i=1;$i<=11;$i++){ ?>
 <option value="<?php echo $i; ?>"> <?php echo "ห้อง.".$i; ?></option>
 <?php } ?>
 </select>

 <br>
 <label class="w3-text-teal"><b>เลขที่ : </b></label>
 <input id="ordinal" type="text"  class="w3-input w3-border w3-light-grey" >

  <br>

 <input id="facebook_id" type="hidden"  value="<?php echo $_SESSION['FACEBOOK_ID']; ?>" >
 <hr>
 <footer>
  <a class="w3-btn w3-green" id="regis">ลงทะเบียน</a>
 <a href="index.php" class="w3-btn w3-red" id="cancel">ยกเลิก</a>
 </footer>
 <br>

</div>
</div>
</div>


 <script>

  $('document').ready(function(){



		$('#regis').click(function(){
			//alert("55");
			//text = $('textarea').val();

			var result = confirm("ยืนยันบันทึกข้อมูล?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "register2.php",
			data: {
				mode: "save",
				name : $('#name').val(),
				last : $('#last').val(),
				level : $('#level').val(),
				room : $('#room').val(),
				ordinal : $('#ordinal').val(),
				pin : $('#pin').val(),
				student_id : $('#student_id').val(),
				pass : $('#pass').val()
				}
			})
			.done(function(data) {
			$('#status_regis').html(data);
      if(data=='1')
      {
        alert("สำเร็จ");
        window.location.assign("index.php")
      }else{
        alert("ผิดพลาด กรุณาตรวจสอบอีกครั้ง");
      }
			//alert(data);

			//



			});
			}






	});



	$('#name').focus(function(){

		a = $('#pass').val();
		b = $('#pass_2').val();
		if(a!=""){
		if(a!=b){  $('#pass_no').text("รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง"); $('#pass_no').attr('class','w3-text-red'); $('#pass').focus();
		}else{
		$('#pass_no').text("รหัสผ่านตรงกัน"); $('#pass_no').removeClass('w3-text-red'); $('#pass_no').addClass('w3-text-teal');

		}}

	});





	});



  </script>
