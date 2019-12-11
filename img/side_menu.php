<?php
	$u[1] = "บทที่ 1 เทคโนโลยีสารสนเทศ";
	$u[2] = "บทที่ 2 คอมพิวเตอร์เบื้องต้น";
	$u[3] = "บทที่ 3 เครือข่ายคอมพิวเตอร์";
	$u[4] = "บทที่ 4 การเขียนโปรแกรมคอมพิวเตอร์";
	$sub[11] = "1.1 ความหมายและองค์ประกอบของเทคโนโลยีสารสนเทศและการสื่อสาร";
	$sub[12] = "1.2 ประโยชน์และแนวโน้มของเทคโนโลยีสารสนเทศและการสื่อสาร";
	$sub[13] = "1.3 ข้อมูล สารสนเทศ และการจัดการความรู้";
	$sub[14] = "1.4 จริยธรรมในโลกของข้อมูล";
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


if(isset($_GET['u'])==""){ ?>

<header class="w3-container w3-indigo " style="max-width:100%;" >
  <h4>บทเรียน</h4>
</header>
<div class="w3-container w3-padding-16 w3-center">
	<a href="index.php?m=couse" ><img src="img/couse.jpg" class="w3-" alt="couse" style="width:90%;"></a>
	<a href="index.php?m=pretest" ><img src="img/pre.jpg" class="w3-" alt="intro" style="width:90%; "></a>
	<a href="index.php?u=1" ><img src="img/menu1.jpg" class="w3-" alt="intro" style="width:90%"></a>
	<a href="index.php?u=2" ><img src="img/menu2.jpg" class="w3-" alt="intro" style="width:90%"></a>
	<a href="index.php?u=3" ><img src="img/menu3.jpg" class="w3-" alt="intro" style="width:90%"></a>
	<a href="index.php?u=4" ><img src="img/menu4.jpg" class="w3-" alt="intro" style="width:90%"></a>
	<a href="index.php?m=posttest" ><img src="img/post.jpg" class="w3-" alt="intro" style="width:90%"></a>
</div>
<?php } ?>

<?php if($_GET['u']!='' && $_GET['s']=='' ){  ?>

<header class="w3-container w3-indigo " style="max-width:100%;" >
 <h4>
 
 <?php echo $u[$_GET['u']]; ?>
  
 </h4>
</header>

<div class="w3-container w3-center"><div class="w3-padding-16">
<a href="index.php" class="w3-button w3-red" style="width:100%">กลับเมนูหลัก</a><p>
	<a href="index.php?u=<?php echo $_GET['u'];?>&t=pretest<?php echo $_GET['u'];?>" >
	<img src="img/pretest_unit<?php echo $_GET['u'];?>.jpg" class=" " alt="intro" style="width:100%"><a>
	
<a href="index.php?u=<?php echo $_GET['u'];?>&s=1" ><img src="img/index_unit<?php echo $_GET['u'];?>.jpg" class="" alt="intro" style="width:100%"></a>

	<a href="index.php?u=<?php echo $_GET['u'];?>&t=posttest<?php echo $_GET['u'];?>" >
	<img src="img/menu<?php echo $_GET['u'];?>_postest.jpg" class="" alt="intro" style="width:100%"></a>
	</div>
</div>


<?php } ?>




<?php if($_GET['u']!='' && $_GET['s']!='' ){  ?>

<header class="w3-container w3-indigo " style="max-width:100%;" >
  <h4><?php 
  $su = intval($_GET['u'].$_GET['s']);
  echo $sub[$su]; ?></h4>
</header>

<div class="w3-container w3-center"><div class="w3-padding-16">
<a href="index.php?u=<?php echo $_GET['u']; ?>" class="w3-button w3-red" style="width:100%">กลับ<?php echo $u[$_GET['u']]; ?></a><p>
<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s']; ?>" 
class="w3-button w3-orange" style="width:100%">แสดงเนื้อหาทั้งหมด</a><p>
	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=indic#indicator" >
	<img src="img/indicator.jpg" class="" alt="intro" style="width:100%"></a>
	
	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=goal#goal" >
	<img src="img/goal.jpg" class="" alt="intro" style="width:100%"></a>
	
		<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=intro#intro" >
	<img src="img/intro.jpg" class="" alt="intro" style="width:100%"></a>
	
	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=learning#learn" >
	<img src="img/learning.jpg" class="" alt="intro" style="width:100%"></a>
	
	<a href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=conclusion#conclusion" >
	<img src="img/conclusion.jpg" class="" alt="intro" style="width:100%"></a>
	<p>
	<a href="index.php" class="w3-button w3-green" style="width:100%">กลับหน้าหลัก</a><p>
	</div>
</div>


<?php } ?>