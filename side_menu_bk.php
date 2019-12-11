<?php
	$u[1] = "บทที่ 1 เทคโนโลยีสารสนเทศ";
	$u[2] = "บทที่ 2 คอมพิวเตอร์เบื้องต้น";
	$u[3] = "บทที่ 3 เครือข่ายคอมพิวเตอร์";
	$u[4] = "บทที่ 4 การเขียนโปรแกรมคอมพิวเตอร์";
	$sub[11] = "1.1 ความหมายและองค์ประกอบของเทคโนโลยีสารสนเทศและการสื่อสาร";
	$sub[12] = "1.2 ประโยชน์และแนวโน้มของเทคโนโลยีสารสนเทศและการสื่อสาร";
	$sub[13] = "1.3 การใช้เทคโนโลยีสารสนเทศเพื่อการตัดสินใจ";
	$sub[14] = "1.4 การใช้เทคโนโลยีสารสนเทศนำเสนอผลงาน";
	$sub[15] = "1.5 จริยธรรมในโลกของข้อมูล";
	$sub[21] = "2.1 องค์ประกอบและหลักการทำงานของคอมพิวเตอร์";
	$sub[22] = "2.2 การเลือกซื้อคอมพิวเตอร์และอุปกรณ์";
	$sub[23] = "2.3 การดูแลรักษาและแก้ปัญหาคอมพิวเตอร์เบื้องต้น";
	$sub[24] = "2.4 ระบบจำนวนและเลขฐาน";
	$sub[31] = "3.1 การสื่อสารข้อมูล";
	$sub[32] = "3.2 สื่อกลางในการสื่อสารข้อมูลและเครือข่ายคอมพิวเตอร์";
	$sub[33] = "3.3 โพรโตคอลและอุปกรณ์การสื่อสาร";
	$sub[34] = "3.4 อินเทอร์เน็ตและเวิลด์ไวด์เว็บ";
	$sub[41] = "4.1 หลักการแก้ปัญหาและภาษาโปรแกรมคอมพิวเตอร์";
	$sub[42] = "4.2 ขั้นตอนการพัฒนาโปรแกรมและภาษา C#";
	$sub[43] = "4.3 การพัฒนาโปรแกรมด้วย SHARPDEVELOP และโครงสร้างแบบลำดับ";
	$sub[44] = "4.4 การพัฒนาโปรแกรมคำนวณและโครงสร้างควบคุมแบบทางเลือก";

if($_SESSION['group_hw']==''){
// Login
?>

<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3>ระบบสมาชิก
</h3>
</div>

</header>


<div class="w3-container">

<div class="w3-section">
	<label><b> ชื่อผู้ใช้</label>
	<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="พิมพ์ชื่อผู้ใช้" id="username" autofocus>
	<label><b>รหัสผ่าน</b></label>
	<input class="w3-input w3-border" type="password" placeholder="พิมพ์รหัสผ่าน" id="password" required>
	<a onclick="doLogin();" class="w3-btn w3-block w3-green w3-section w3-padding" type="submit">เข้าสู่ระบบ</a>

</div>
</div>
<?php
}else{  //$session
if($_SESSION['group_hw']=='student'){
if(isset($_GET['u'])==""){



	?>

<header class="w3-container w3-indigo " style="max-width:100%;" >
  <h4>บทเรียน</h4>
</header>
<div class="w3-container w3-padding-16 w3-center">
	<!--<a href="index.php?m=couse" ><img src="img/couse.jpg" class="w3-" alt="couse" style="width:90%;"></a> -->
	<a href="index.php?m=pretest" ><img src="img/pre.jpg" class="w3-" alt="intro" style="width:90%; "></a>
	<a href="index.php?u=1" ><img src="img/menu1.jpg" class="w3-" alt="intro" style="width:90%"></a>
	<a href="index.php?u=2" ><img src="img/menu2.jpg" class="w3-" alt="intro" style="width:90%"></a>
	<!--<a href="index.php?u=3" ><img src="img/menu3.jpg" class="w3-" alt="intro" style="width:90%"></a>-->
	<!--<a href="index.php?u=4" ><img src="img/menu4.jpg" class="w3-" alt="intro" style="width:90%"></a>-->
	<a href="index.php?m=posttest" ><img src="img/post.jpg" class="w3-" alt="intro" style="width:90%"></a>
</div>
<?php } ?>

<?php if($_GET['u']=='2' && $_GET['s']=='' ){  ?>

<header class="w3-container w3-indigo " style="max-width:100%;" >
 <h4>

 <?php echo $u[$_GET['u']]; ?>

 </h4>
</header>

<div class="w3-container w3-center"><div class="w3-padding-16">
<a href="index.php" class="w3-button w3-red" style="width:100%">กลับเมนูหลัก</a><p>
	<a href="index.php?u=1&m=pretest_u2" ><img src="img/menu<?php echo $_GET['u'];?>_pretest.jpg" class=" " alt="intro" style="width:100%"></a>

<a href="index.php?u=<?php echo $_GET['u'];?>&s=1" ><img src="img/<?php echo $_GET['u'];?>-1.jpg" class="" alt="intro" style="width:100%"></a>
<a href="index.php?u=<?php echo $_GET['u'];?>&s=2" ><img src="img/<?php echo $_GET['u'];?>-2.jpg" class="" alt="intro" style="width:100%"></a>
<a href="index.php?u=<?php echo $_GET['u'];?>&s=3" ><img src="img/<?php echo $_GET['u'];?>-3.jpg" class="" alt="intro" style="width:100%"></a>
<a href="index.php?u=<?php echo $_GET['u'];?>&s=4" ><img src="img/<?php echo $_GET['u'];?>-4.jpg" class="" alt="intro" style="width:100%"></a>

	<img src="img/menu<?php echo $_GET['u'];?>_postest.jpg" class="" alt="intro" style="width:100%">
	</div>
</div>


<?php } ?>
<?php if($_GET['u']=='1' && $_GET['s']=='' ){  ?>

<header class="w3-container w3-indigo " style="max-width:100%;" >
 <h4>

 <?php echo $u[$_GET['u']]; ?>

 </h4>
</header>

<div class="w3-container w3-center"><div class="w3-padding-16">

	<a href="index.php"
		class="w3-block w3-button w3-hover-black w3-orange w3-border-bottom" style="text-align:left;">
		<h6>&nbsp;&nbsp;<i class="fas fa-home" style='font-size:30px'></i><b> กลับหน้าหลัก</b>  </h6>
	</a>
<hr />



	<a href="index.php?u=1&m=pretest_u1" ><img src="img/menu<?php echo $_GET['u'];?>_pretest.jpg" class=" " alt="intro" style="width:100%"></a>

<a href="index.php?u=<?php echo $_GET['u'];?>&s=1" ><img src="img/<?php echo $_GET['u'];?>-1.jpg" class="" alt="intro" style="width:100%"></a>
<a href="index.php?u=<?php echo $_GET['u'];?>&s=2" ><img src="img/<?php echo $_GET['u'];?>-2.jpg" class="" alt="intro" style="width:100%"></a>
<a href="index.php?u=<?php echo $_GET['u'];?>&s=3" ><img src="img/<?php echo $_GET['u'];?>-3.jpg" class="" alt="intro" style="width:100%"></a>
<a href="index.php?u=<?php echo $_GET['u'];?>&s=4" ><img src="img/<?php echo $_GET['u'];?>-4.jpg" class="" alt="intro" style="width:100%"></a>
<a href="index.php?u=<?php echo $_GET['u'];?>&s=5" ><img src="img/<?php echo $_GET['u'];?>-5.jpg" class="" alt="intro" style="width:100%"></a>
	<img src="img/menu<?php echo $_GET['u'];?>_postest.jpg" class="" alt="intro" style="width:100%">
	</div>
</div>


<?php } ?>




<?php if($_GET['u']!='' && $_GET['s']!='' ){  ?>
<div class="">


<header class="w3-container w3-teal " style="max-width:100%;" >
  <h4><?php
  $su = intval($_GET['u'].$_GET['s']);

  echo $sub[$su]; ?></h4>
</header>

<div class="w3-container  ">
	<div class="w3-padding-16">



	<a href="index.php?u=<?php echo $_GET['u']; ?>"
		class="w3-block w3-button w3-hover-black w3-red w3-border-bottom" style="text-align:left;">
		<h6>&nbsp;&nbsp;<i class="fas fa-chevron-circle-left" style='font-size:30px'></i><b> กลับ<?php echo $u[$_GET['u']]; ?></b>  </h6>
	</a>

	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=indic"
		class="w3-block w3-button w3-hover-black w3-green w3-border-bottom" style="text-align:left;">
		<h6>&nbsp;&nbsp;<i class="fas fa-chalkboard-teacher" style='font-size:30px'></i><b> แผนการเรียนประจำหัวข้อ</b>  </h6>
	</a>

	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=cai"
		class="w3-block w3-button w3-hover-black w3-indigo w3-border-bottom" style="text-align:left;">
		<h6>&nbsp;&nbsp;<i class="fas fa-book" style='font-size:30px'></i><b> เรื่องความหมายของเทคโนโลยีสารสนเทศ</b>  </h6>
	</a>

	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=learning"
		class="w3-block w3-button w3-hover-black w3-yellow w3-border-bottom" style="text-align:left;">
		<h6>&nbsp;&nbsp;<i class="fas fa-user-graduate" style='font-size:30px'></i><b> ใบงานที่ 1.1 </b>  </h6>
	</a>


	<a href="index.php"
		class="w3-block w3-button w3-hover-black w3-orange w3-border-bottom" style="text-align:left;">
		<h6>&nbsp;&nbsp;<i class="fas fa-home" style='font-size:30px'></i><b> กลับหน้าหลัก</b>  </h6>
	</a>
	<!--
	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=goal" >
	<img src="img/goal.jpg" class="" alt="intro" style="width:100%"></a>

		<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=intro" >
	<img src="img/intro.jpg" class="" alt="intro" style="width:100%"></a>

	<!--	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=cai" >
	<img src="img/cai.jpg" class="" alt="intro" style="width:100%"></a>

<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=learning" >
	<img src="img/learning.jpg" class="" alt="intro" style="width:100%"></a>

	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=conclusion" >
	<img src="img/conclusion.jpg" class="" alt="intro" style="width:100%"></a>

	<a href="index.php" class="w3-button w3-green" style="width:100%">กลับหน้าหลัก</a> -->
	</div>
</div>
</div>

<?php } ?>
<?php } // student?>



<?php  if($_SESSION['group_hw']=='teacher')
{  ?>
	<header class="w3-container w3-indigo " style="max-width:100%;" >
	  <h4>เมนูหลัก</h4>
	</header>
	<div class="w3-container w3-padding-16 w3-">
		<!--<a href="index.php?m=couse" ><img src="img/couse.jpg" class="w3-" alt="couse" style="width:90%;"></a> -->
		<a href="index.php?m=student" class="w3-border w3-bar-item w3-button w3- w3-hover-black  w3-block" style="text-align:left;">
			<h4 class="w3-text-blue" >
			&nbsp;&nbsp;&nbsp;	<i class="fa fa-users"></i><b>&nbsp;ข้อมูลนักเรียน</b></h4></a>
		<a href="index.php?m=teacher_test" class="w3-border w3-bar-item w3- w3-button w3-hover-black w3-block" style="text-align:left;">
				<h4 class="w3-text-blue" >
			&nbsp;&nbsp;&nbsp;	<i class='fa fa-clipboard'></i>&nbsp;<b>ข้อมูลแบบทดสอบ</b></h4></a>
		<a href="index.php?m=test_result" class="w3-border w3-bar-item w3- w3-button w3-hover-black w3-block" style="text-align:left;">
			<h4 class="w3-text-blue" >
		&nbsp;&nbsp;&nbsp;	<i class='fa fa-bar-chart-o'></i>&nbsp;<b>ผลการสอบ</b></h4></a>

			<a href="index.php?m=unit" class="w3-border w3-bar-item w3- w3-button w3-hover-black w3-block" style="text-align:left;">
				<h4 class="w3-text-blue" >
			&nbsp;&nbsp;&nbsp;	<i class='fas fa-network-wired'></i>&nbsp;<b>หน่วยการเรียน</b></h4></a>

			<a href="index.php?m=content" class="w3-border w3-bar-item w3- w3-button w3-hover-black w3-block" style="text-align:left;">
				<h4 class="w3-text-blue" >
			&nbsp;&nbsp;&nbsp;	<i class='fas fa-book'></i>&nbsp;<b>เนื้อหา</b></h4></a>

			<a href="index.php?m=menu" class="w3-border w3-bar-item w3- w3-button w3-hover-black w3-block" style="text-align:left;">
				<h4 class="w3-text-blue" >
			&nbsp;&nbsp;&nbsp;	<i class='fas fa-project-diagram'></i>&nbsp;<b>จัดการเมนู</b></h4></a>

				<a  onclick="logout();" class="w3-border w3-bar-item w3-red w3-button w3-hover-black w3-block" style="text-align:left;">
				<h4 class="w3-text-white" style="text-shadow:1px 1px 0 #444">
			&nbsp;&nbsp;&nbsp;	<i class='fa fa-close'></i>&nbsp;<b>ออกจากระบบ</b></h4></a>

	</div>

	<!-- Sidebar -->

<?php }  // teacher  ?>
<?php } // close group_hw ?>
