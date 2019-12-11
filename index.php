<?php
		include('db.php');
		include('function.php');
		session_start();

	?>
<!DOCTYPE html>
<html lang="th" class="no-js">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
  <head>
  <title>บทเรียนผ่านเว็บวิชาเทคโนโลยีสารสนเทศและการสื่อสาร-ict</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--
<script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script> -->
 <script src="ckeditor/ckeditor.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="ckeditor5/ckeditor.js"></script>


	<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=t64xafwz3jqztvnvzu5j5hi22tn30nsriyb6mba0rv5lhonc"></script> -->

  <?php if($_GET['m']!="qr"){ ?>
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> --><?php } ?>
	<script src="js/jquery-3.1.1.min.js"></script>

	  <script src="./js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">

	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Kanit:300&subset=thai' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="fonts/thsarabunnew.css" />
<style>
/*body { font-family: 'Kanit', sans-serif; }
 html, body, h1, h2, h3, h4, h5, h6 {
	 font-family: 'Kanit', sans-serif;
       <!-- font-family: 'Prompt', serif; -->
 }*/

<?php if($_GET[type]==2){ ?>
 #scroll_final {
	 display: none;
	 position: fixed;
	 bottom: 20px;
	 right: 530px;
	 z-index: 99;
	 font-size: 18px;
	 border: none;
	 outline: none;
	 background-color: green;
	 color: white;
	 cursor: pointer;
	 padding: 15px;
	 border-radius: 4px;
 }
 #scroll_mid {
 	display: none;
 	position: fixed;
 	bottom: 20px;
 	right: 530px;
 	z-index: 99;
 	font-size: 18px;
 	border: none;
 	outline: none;
 	background-color: orange;
 	color: black;
 	cursor: pointer;
 	padding: 15px;
 	border-radius: 4px;
 }

 #scroll_num {
   display: none;
   position: fixed;
   bottom: 20px;
   right: 130px;
   z-index: 99;
   font-size: 18px;
   border: none;
   outline: none;
   background-color: red;
   color: white;
   cursor: pointer;
   padding: 15px;
   border-radius: 4px;
 }
#Scroll_top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}
<?php } ?>
#Scroll_top:hover {
  background-color: #555;
}
body { font-family: 'THSarabunNew', sans-serif; }
 html, body, h1, h2, h3, h4, h5, h6 {
	 font-family: 'THSarabunNew', sans-serif;
       <!-- font-family: 'Prompt', serif; -->
 }
 p {
 	margin-top : 30px;
 }
 .style2 {
 	font-size: 20px ;
	color: gray;
 }
 .sub_test {
 	font-size: 18px ;

 }
 .ver-cen {
	 vertical-align: middle;
}
.show_ans {
  padding: 10pt;
  background-color: rgba(10, 250, 10);

  bottom: 0;
	position: fixed;
    top: 10em;
    right: 1em;
		height:100px;
}


.sidebar1 {
	background:#ffffff;
   position: fixed;
   left: 10px;
   top: 150px;
   border: 0px solid black;
}
.content1 {
	margin-left: 390px;
   left: 300px;
   top: 130px;

}
strong {
	font-weight: bold;
	font-weight: 900;
}



</style>



	<script>
		$(document).ready(function(){
			$("strong").addClass('font-weight-bold');
			$('#content').hide();
			$('#content').slideDown("slow");
			$('#password').keypress(function (e) {
  if (e.which == 13) {
   doLogin();
    return false;    //<---- Add this line
  }
});

		});

		function doLogin() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  }

		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
			var user = document.getElementById("username").value;
			var pass = document.getElementById("password").value;
			//alert(user + "-" + pass);
		  var url = 'check_login.php';
		  var pmeters = "username=" + encodeURI( document.getElementById("username").value) +
									"&password=" + encodeURI( document.getElementById("password").value );

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			//HttPRequest.setRequestHeader("Content-length", pmeters.length);
			//HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);


			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{

					document.getElementById("status_login").innerHTML = "Now is Loading...";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{


						window.location= 'index.php';
					}
					else
					{
						alert(HttPRequest.responseText);
					}
				}

			}

	   }
	function logout() {
		var result = confirm("ต้องการออกจากระบบ?");
		if (result) {
				window.location = 'logout.php';
    //Logic to delete the item
}

    //window.location.assign("logout.php")

	}




	</script>
	<script language="javascript" type="text/javascript">
<!--
function pop_up(url) {
	newwindow=window.open(url,'name','height=600,width=800');
	if (window.focus) {newwindow.focus()}
	return false;
}


// -->
</script>

	</head>
<body>


<button onclick="topFunction()" id="scroll_final" title="Go to top" class="">จบแล้ว..เก่งมากเลยครับ</button>
<button onclick="topFunction()" id="scroll_mid" title="Go to top" class="">พยายามอีกนิดนะครับ..สู้ๆ</button>
<button onclick="topFunction()" id="scroll_num" title="Go to top" class="">กลับขึ้น</button>
<button onclick="topFunction()" id="Scroll_top" title="Go to top" class="">กลับขึ้น</button>

<div class="w3-top no-print">
<header class="w3-container w3-padding-16 w3-amber  w3-hide-small" style="padding-left:32px">
  <h1 class="w3-xlarge "><img src="img/it.png" height="32">  ยินดีต้อนรับเข้าสู่บทเรียนบนเว็บรายวิชา
  <span class="w3-text-light-gray"><b style="text-shadow:1px 1px 0 #444">เทคโนโลยีสารสนเทศ เรื่องเทคโนโลยีสารสนเทศและคอมพิวเตอร์</b></span></h1>

  </header>

<div class=" w3-bar w3-teal w3-bottombar w3-border-orange w3-large" >
 <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  <a class="w3-bar-item w3-button w3-hide-small" href="index.php"><i class="fa fa-home"></i> หน้าแรก</a>
  <a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=explan">คำชี้แจง</a>
	<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=explan_course">คำอธิบายรายวิชา</a>
	<?php
if($_SESSION['group_hw']==''){
?>
	<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=regis">ลงทะเบียน</a>
<?php } ?>
	<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=download">ดาวน์โหลด</a>
<!--  <div class="w3-dropdown-hover " >
    <button class="w3-button w3-hover-orange" >บทเรียน</button>

		<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-teal " style="width:450px">
		<a class="w3-bar-item w3-button w3-hover-orange" href="index.php?u=1">หน่วยที่ 1 เทคโนโลยีสารสนเทศ</a>
        <a class="w3-bar-item w3-button w3-hover-blue" href="index.php?u=2">หน่วยที่ 2 คอมพิวเตอร์เบื้องต้น</a>
        <a class="w3-bar-item w3-button w3-hover-teal" href="index.php?u=3">หน่วยที่ 3 ระบบเครือข่ายคอมพิวเตอร์</a>
		  <a class="w3-bar-item w3-button w3-hover-red" href="index.php?u=4">หน่วยที่ 4 การพัฒนาโปรแกรมเพื่อแก้ปัญหา</a>

		</div>
	</div>-->


    <?php
  if($_SESSION['group_hw']=='student'){
  ?>
	<div class="w3-dropdown-hover ">
  <!--  <button class="w3-button w3-hover-orange">เมนูนักเรียน</button>

		<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-teal " style="width:450px">
		<a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=send">ส่งการบ้าน</a>
        <a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=std_check">ตรวจสอบการบ้าน</a>
        <a class="w3-bar-item w3-button w3-hover-orange" href="#">บันทึกข้อความถึงคุณครู</a>
		   <a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=std_qr">Qr-code</a>

		</div> -->
	</div>
  <?php } ?>
   <?php
  if($_SESSION['group_hw']=='teacher'){
  ?>
	<!--<div class="w3-dropdown-hover ">
    <button class="w3-button w3-hover-orange">เมนูคุณครู</button>

		<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-teal " style="width:450px">
		<!--  <a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=add_rubric">1. เพิ่มเกณฑ์รูบริค</a> -->
		<!--<a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=add_hw">2. เพิ่มการบ้าน</a> -->

      <!--  <a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=teacher_check">3. ตรวจการบ้าน</a> -->
		<!-- <a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=teacher_test">แบบทดสอบ</a>

		 <!--   <a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=qr">5. เช็คชื่อ Qr-code</a>
			<a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=p_qr">6. พิมพ์บัตร Qr-code</a> -->

		<!--</div>
	</div> -->
  <?php } ?>

   <?php
  if($_SESSION['group_hw']=='manager'){
  ?>
	<div class="w3-dropdown-hover ">
    <button class="w3-button w3-hover-orange">เมนูเจ้าหน้าที่</button>

		<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-teal " style="width:450px">
		<a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=add_couse">เพิ่มรายวิชา</a>
        <a class="w3-bar-item w3-button w3-hover-orange" href="#">เพิ่ม/แก้ไขข้อมูลนักเรียน</a>
		<a class="w3-bar-item w3-button w3-hover-orange" href="#">เพิ่ม/แก้ไขข้อมูลครู</a>
        <a class="w3-bar-item w3-button w3-hover-orange" href="#">จัดการปีการศึกษา</a>
		   <a class="w3-bar-item w3-button w3-hover-orange" href="index.php?m=qr">Qr-code</a>


		</div>
	</div>
  <?php } ?>
	<!--<button class="w3-button w3-hover-orange">สารสนเทศ</button>
<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-teal " style="width:450px">
  <a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=check">ตรวจสอบการบ้าน</a>
    <a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=src_qr">ตรวจสอบเวลาเรียน</a>


	</div>
</div> -->
	<!--<div class="w3-dropdown-hover ">
<button class="w3-button w3-hover-orange">คะแนนบทที่ 1</button>
<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-teal " style="width:450px">

  		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=pretest_unit1">คะแนนแบบทดสอบก่อนเรียนบทที่ 1</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit1-1">คะแนนบทเรียนที่ 1.1</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit1-2">คะแนนบทเรียนที่ 1.2</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit1-1">คะแนนบทเรียนที่ 1.3</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit1-1">คะแนนบทเรียนที่ 1.4</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit1-1">คะแนนบทเรียนที่ 1.5</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=posttest_unit1">คะแนนแบบทดสอบหลังเรียนบทที่ 1</a>

	</div>
</div>-->

	<!--	<div class="w3-dropdown-hover ">
<button class="w3-button w3-hover-orange">คะแนนบทที่ 2</button>
<div class="w3-dropdown-content w3-bar-block w3-card-4 w3-teal " style="width:450px">

  		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=pretest_unit2">คะแนนแบบทดสอบก่อนเรียนบทที่ 2</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit2-1">คะแนนบทเรียนที่ 2.1</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit2-2">คะแนนบทเรียนที่ 2.2</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit2-3">คะแนนบทเรียนที่ 2.3</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=unit2-4">คะแนนบทเรียนที่ 2.4</a>
		<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=posttest_unit2">คะแนนแบบทดสอบหลังเรียนบทที่ 2</a>

	</div>
</div> -->

  <!-- <a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=fb">ถาม-ตอบ</a> -->
    <a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=learnsquare">แหล่งเรียนรู้</a>
	<a class="w3-bar-item w3-button w3-hover-orange w3-hide-small" href="index.php?m=contact">ติดต่อผู้สอน</a>

  <?php
	if($_SESSION["group_hw"]!=""){ ?>
	<a class="w3-right w3-button w3-red " onclick="logout();">
	<?php
	if($_SESSION['group_hw']=='student'){echo '( นักเรียน ):'; }
	if($_SESSION['group_hw']=='teacher'){echo '( ครู ):'; }
	echo $_SESSION["name"]; ?>  -> ออกจากระบบ</a><?php }else{ ?>
  <!--<a onclick="document.getElementById('id01').style.display='block'" class="w3-right w3-button w3-green ">เข้าสู่ระบบ</a> -->
	<?php } ?>
</div>
</div><!---w3-top-->

<!--<div class="w3-container w3-content" style="max-width:auto;margin-top:20px">-->
<div class="w3-hide-small" style="margin-top:150px"></div>
<div class="w3-container w3-content " style="max-width:100%;">
<div class="w3-row">


  <div class="w3-col m4 l3 w3-animate-top " id="mySidebar" > <!-- sidebar -->
   <div class="w3-card w3-margin-right" style="overflow: auto;">
     <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-teal w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>


<?php
include('side_menu.php');

?>


</div>

  </div><!-- sidebar -->

   <div class="w3-rest w3-border w3-margin-left" style="overflow: auto; "> <!-- main -->
		 <div class="w3-animate-top" id="content">
<?php
	if($_GET['m']=="" && $_GET['u']=="" && $_SESSION['group_hw']==''){
	include_once('main_index.php');
 }else{
	 include_once('main_content.php');
 } ?>
</div>
	</div> <!-- main -->




</div>


</div>





<!-- Footer -->
<br><p><?php echo $_SESSION['group_hw']; ?>

<footer class="w3-container  w3-padding-16 w3-orange w3-center">

	<b style="font-size:20px">
	<button class="w3-btn w3-xlarge w3-round w3-red"
	onclick="window.open('https://www.youtube.com/user/TheRomeotc','_blank');">
	<i class="fa fa-youtube-play"></i></button>
  <a target="_blank" class="w3-btn w3-xlarge w3-round w3-blue" href="http://ict.kruimron.com" title="Web"><i class="fa fa-internet-explorer"></i></a>
	<button class="w3-btn w3-xlarge w3-round w3-indigo"
	onclick="window.open('https://www.facebook.com/ict31105','_blank');">
	&nbsp;<i class="fa fa-facebook"></i>&nbsp;</button>

  <p>ออกแบบและสร้างสรรค์ โดย นายอิมรอน  จารงค์  ครูโรงเรียนนราธิวาส <a href="" target="_blank"></a></p>

  <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">
		<img alt="สัญญาอนุญาตของครีเอทีฟคอมมอนส์" style="border-width:0"
		src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />ผลงานนี้ ใช้
		<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">
			สัญญาอนุญาตของครีเอทีฟคอมมอนส์แบบ แสดงที่มา-ไม่ใช้เพื่อการค้า 4.0 International</a>.

  <div style="position:relative;bottom:5px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>
    <a class="w3-button w3-theme" href="#top"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
	</b>
</footer>




  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span>
        <img src="./img/student.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>
		<center><div id="status_login"></div>
      <form class="w3-container" action="" method="post">
        <div class="w3-section">
          <label><b> Student ID (รหัสประจำตัวนักเรียน)</label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Student ID" id="username1">
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" id="password1" required>
          <a onclick="doLogin();" class="w3-btn w3-block w3-green w3-section w3-padding" type="submit">เข้าสู่ระบบ</a>

        </div>
      </form>

		      <div class="w3-container w3-border-top  w3-light-grey"><center>

		<!--	<h3>  เข้าสู่ระบบด้วย Account ของ Facebook </h3>
สำหรับนักเรียนที่มี Account ของ Facebook อยู่แล้ว ก็สามารถคลิกปุ่ม Login via Facebook ด้านล่าง เพื่อเข้าสู่ระบบได้เช่นกัน<br>
**กรณีที่ยังไม่ลงทะเบียนระบบจะส่งไปหน้าลงทะเบียนโดยอัตโนมัติ



		<p>
<fb:login-button
  scope="public_profile,email"
  onlogin="checkLoginState();" >
</fb:login-button></center>
<form action="fb2.php" method="post" name="frmMain" id="frmMain">
	<input type="hidden" id="hdnFbID" name="hdnFbID">
	<input type="hidden" id="hdnName" name="hdnName">
	<input type="hidden" id="hdnEmail" name="hdnEmail">
</form> -->


      </div>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <a onclick="document.getElementById('id01').style.display='none'"  class="w3-btn w3-red">ยกเลิก</a>
   <!--   <a  href="index.php?m=register" class="w3-btn w3-blue">ลงทะเบียน</a>  -->
      </div>

    </div>
	</div>


<?php if($_GET['u']=="" && $_GET['m']=="" ){ ?>
<div class="w3-modal" id="overlay">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="document.getElementById('overlay').style.display='none'" >&times;</button>
        <h4 class="modal-title">แจ้งข่าว</h4>
      </div>
      <div class="modal-body">
        <p>นักเรียนที่ยังไม่ได้ทำแบบทดสอบก่อนเรียนบทที่ 1 ให้รีบทำด้วยนะครับ</p>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<script>
	function check_session()
	{
		var check = $('#session').val();
			$.ajax({
				url: 'check_session.php',
				type: 'POST',
				dataType: 'html',
				data: {param1: 'value1'}
			})
			.done(function(result) {
				console.log("success");
				console.log("session:" + result +"check:" + check);

				//alert(result);

				if(check!=result){
					location.href = "index.php";
				}


			})
			.fail(function() {
				//console.log("error");
			})
			.always(function() {
				//console.log("complete");
			});


	}
	setInterval(check_session, 5000);
	$('document').ready(function(){
		$('#overlay1').show();





	});
 $('#start_date').datetimepicker();
 $('#end_date').datetimepicker();
</script>


<div id="fb-root"></div>


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0&appId=387305204984300&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>






<script>
/*
  var bFbStatus = false;
  var fbID = "";
  var fbName = "";
  var fbEmail = "";

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '387305204984300',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


function statusChangeCallback(response)
{

		if(bFbStatus == false)
		{
			fbID = response.authResponse.userID;

			  if (response.status == 'connected') {
				getCurrentUserInfo(response)
			  } else {
				FB.login(function(response) {
				  if (response.authResponse){
					getCurrentUserInfo(response)
				  } else {
					console.log('Auth cancelled.')
				  }
				}, { scope: 'email' });
			  }
		}


		bFbStatus = true;
}


    function getCurrentUserInfo() {
      FB.api('/me?fields=name,email', function(userInfo) {

		  fbName = userInfo.name;
		  fbEmail = userInfo.email;
		  //alert(fbID);




			$("#hdnFbID").val(fbID);
			$("#hdnName ").val(fbName);
			$("#hdnEmail").val(fbEmail);
			$("#frmMain").submit();

      });
    }

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
*/

</script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("Scroll_top").style.display = "block";
  } else {
    document.getElementById("Scroll_top").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


</script>
<input id="session" value="<?php if($_SESSION['group_hw']==''){ echo '0'; }else{ echo '1'; } ?>" >

</body>
</html>
