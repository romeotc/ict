

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
	$sid = isset($_GET['sid'])?$_GET['sid']:'1';
	//if($sid=''){ $sid=1;}
	if($sid>1){
		?>

		<a href="index.php" class="w3-orange w3-border w3-bar-item w3- w3-button w3-hover-black w3-block" style="text-align:left;margin-bottom:5px;">
				<h6 class="w3-" >
						&nbsp;&nbsp;&nbsp;	<i class='fas fa-chevron-circle-left'></i>&nbsp;<b> กลับเมนูหลักนักเรียน</b></h6></a>

	<?php
}else{ ?>
	<a href="index.php" class="w3-blue w3-border w3-bar-item w3- w3-button w3-hover-teal w3-block" style="text-align:left;margin-bottom:5px;">
			<h5 class="w3-" >
					&nbsp;&nbsp;&nbsp;	<i class='fas fa-home'></i>&nbsp;<b> เมนูหลักนักเรียน</b></h5></a>

	<?php
}
	$s = "SELECT *,a.id as id FROM tb_menu as a inner join tb_type as b on a.type = b.id where a.sid = {$sid} order by order_id";
	//echo $s;
	$q = mysqli_query($link,$s);
	$index ='';
	while( $rs = mysqli_fetch_array($q)){
		if($rs['type']==3){ $rs['sid']= $rs['id'];  $index = "&index=1"; }
		$link = "sid=".$rs['sid']."&type=".$rs['type']."&link_id=".$rs['link_id'].$index;


		?>

		<a href="index.php?<?php echo $link; ?>" class="w3- btn btn-outline-primary w3-hover- btn-block
			<?php if($rs['link_id']==$_GET['link_id'] && $rs['type']==$_GET['type']){ echo " active"; } ?>
			" style="text-align:left;width: auto;
    word-wrap: break-word;">
			<h6 class="<?php echo $rs['color']; ?>" style="word-wrap: break-word;text-shadow:1px 1px 0 #aaa" >
		&nbsp;&nbsp;&nbsp;	<i class='<?php echo $rs['icon']; ?>'></i>&nbsp;<b><?php echo $rs['menu_name']; ?></b></h6></a>
		<?php
	}
?>
<?php if($_SESSION['group_hw']!=''){ ?>

	<a  onclick="logout();" class="w3-border w3-bar-item w3-red w3-button w3-hover-black w3-block" style="text-align:left;margin-top:5px;">
	<h5 class="w3-text-white" style="text-shadow:1px 1px 0 #444">
	&nbsp;&nbsp;&nbsp;	<i class='fa fa-close'></i>&nbsp;<b>ออกจากระบบ</b></h5></a>

<?php } ?>

<?php } // student?>



<?php  if($_SESSION['group_hw']=='teacher')
{  ?>
	<header class="w3-container w3-indigo " style="max-width:100%;" >
	  <h4>เมนูหลัก</h4>
	</header>
	<div class="w3-container w3-padding-16 w3-">
		<!--<a href="index.php?m=couse" ><img src="img/couse.jpg" class="w3-" alt="couse" style="width:90%;"></a> -->
		<a href="index.php?m=student" class="w3-border w3-bar-item btn btn-outline-primary w3-hover-black  w3-block
		<?php if($_GET['m']=='student'){ echo "active"; } ?>
		" style="text-align:left;">
			<h4 class="w3-" >
			&nbsp;&nbsp;&nbsp;	<i class="fa fa-users"></i><b>&nbsp;ข้อมูลนักเรียน</b></h4></a>


		<a href="index.php?m=teacher_test" class="w3-border w3-bar-item btn btn-outline-primary w3-hover-black w3-block
		<?php if($_GET['m']=='teacher_test' || $_GET['m']=='teacher_test_sub'){ echo "active"; } ?> "
		style="text-align:left;">
				<h4 class="w3-text-" >
			&nbsp;&nbsp;&nbsp;	<i class='fa fa-clipboard'></i>&nbsp;<b>ข้อมูลแบบทดสอบ</b></h4></a>


		<a href="index.php?m=test_result" class="w3-border w3-bar-item btn btn-outline-primary w3-hover-black w3-block
		<?php if($_GET['m']=='test_result'){ echo "active"; } ?>"
		style="text-align:left;">
			<h4 class="w3-text-" >
		&nbsp;&nbsp;&nbsp;	<i class='fa fa-bar-chart-o'></i>&nbsp;<b>ผลการสอบ</b></h4></a>

			<a href="index.php?m=unit" class="w3-border w3-bar-item btn btn-outline-primary w3-hover-black w3-block
			<?php if($_GET['m']=='unit'){ echo "active"; } ?>"
			style="text-align:left;">
				<h4 class="w3-text-" >
			&nbsp;&nbsp;&nbsp;	<i class='fas fa-network-wired'></i>&nbsp;<b>หน่วยการเรียน</b></h4></a>

			<a href="index.php?m=content" class="w3-border w3-bar-item w3- btn btn-outline-primary w3-hover-black w3-block
			<?php if($_GET['m']=='content'){ echo "active"; } ?>"
			style="text-align:left;">
				<h4 class="w3-text-" >
			&nbsp;&nbsp;&nbsp;	<i class='fas fa-book'></i>&nbsp;<b>เนื้อหา</b></h4></a>

			<a href="index.php?m=menu" class="w3-border w3-bar-item btn btn-outline-primary w3-hover-black w3-block
			<?php if($_GET['m']=='menu'){ echo "active"; } ?>"
			style="text-align:left;">
				<h4 class="w3-text-" >
			&nbsp;&nbsp;&nbsp;	<i class='fas fa-project-diagram'></i>&nbsp;<b>จัดการเมนู</b></h4></a>
			<?php if($_SESSION['group_hw']!=''){ ?>

				<a  onclick="logout();" class="w3-border w3-bar-item w3-red w3-button w3-hover-black w3-block" style="text-align:left;">
				<h5 class="w3-text-white" style="text-shadow:1px 1px 0 #444">
				&nbsp;&nbsp;&nbsp;	<i class='fa fa-close'></i>&nbsp;<b>ออกจากระบบ</b></h5></a>

			<?php } ?>


	</div>

	<!-- Sidebar -->

<?php }  // teacher  ?>
<?php } // close group_hw ?>
