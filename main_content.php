<input type="hidden" id="sid" value="<?php echo $_GET['sid']; ?>">
<input type="hidden" id="type" value="<?php echo $_GET['type']; ?>">
<input type="hidden" id="link_id" value="<?php echo $_GET['link_id']; ?>">
<input type="hidden" id="m" value="<?php echo $_GET['m']; ?>">


<?php
if($_POST['type']==4){ $icon = "fa fa-clipboard"; }
if($_POST['type']==2){ $icon = "fa fa-book"; }
if($_POST['type']==3){ $icon = "fas fa-network-wired"; }
if($_POST['type']==1){ $icon = "fas fa-project-diagram"; }
 ?>
<script>
function update()
{

	var type = $('#type').val();
  var url ='';
	if(type==1 || type==''){ url = 'main_unit.php'; }
	if(type==2){ url = 'main_con.php'; }
  if(type==6){ url = 'main_con.php'; }
	if(type==4){ url = 'main_test.php'; }
	if(type==3){ url = 'main_unit.php'; }
  console.log("url=" +url);
	var link_id = $('#link_id').val();
  if(type>1){
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'html',
		data: {
			type: type,
			link_id:link_id,
      m:$('#m').val()
		}
	})
	.done(function(result) {
		console.log("success");
		$('#main').html(result);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
  }
}
	$(document).ready(function() {

		update();
	});
</script>

<?php
	include('db.php');

	$u[1] = "หน่วยที่ 1 เทคโนโลยีสารสนเทศ";
	$u[2] = "หน่วยที่ 2 คอมพิวเตอร์เบื้องต้น";
	$u[3] = "หน่วยที่ 3 เครือข่ายคอมพิวเตอร์";
	$u[4] = "หน่วยที่ 4 การเขียนโปรแกรมคอมพิวเตอร์";
	$sub[11] = "1.1 ความหมายและองค์ประกอบของเทคโนโลยีสารสนเทศและการสื่อสาร";
	$sub[12] = "1.2 ประโยชน์และแนวโน้มของเทคโนโลยีสารสนเทศและการสื่อสาร";
	$sub[13] = "1.3 การใช้เทคโนโลยีสารสนเทศเพื่อการตัดสินใจ ";
	$sub[14] = "1.4 การใช้เทคโนโลยีสารสนเทศนำเสนอผลงาน ";
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

	if($_SESSION['group_hw']=='')
	{
	if($_GET['m']=="work"){ include('work.php'); }
	if($_GET['m']=="download"){ include('download.php'); }


	if($_GET['m']=="url"){ include('std_url.php'); }
	if($_GET['m']=="src_qr"){ include('src_qr_by_date.php'); }

	//if($_GET['u']=="1"){ include('unit1.php'); }
	//if($_GET['u']=="2"){ include('unit2.php'); }
	//if($_GET['u']=="3"){ include('unit3.php'); }
	//if($_GET['u']=="4"){ include('unit4.php'); }  
	if($_GET['m']=="contact"){ include('contact.php'); }
	if($_GET['m']=="learnsquare"){ include('learnsquare.php'); }
	if($_GET['m']=="explan"){ include('explan.php'); }
	if($_GET['m']=="register"){ include('register.php'); }
	if($_GET['m']=="explan_course"){ include('explan_course.php'); }

	if($_GET['m']=="manual"){ include('manual.php'); }
	if($_GET['m']=="couse"){ include('couse_syllabus.php'); }
	if($_GET['m']=="regis"){ include('register.php'); }
	if($_GET['m']=="qr"){ include('scan_qr.php'); }
	if($_GET['m']=="fb"){ include('webboard.php'); }
	if($_GET['m']=="check"){ include('check.php'); }
	if($_GET['m']=="std_src"){ include('std_src.php'); }
	if($_GET['u']=="" && $_GET['s']=='' && $_GET['a']=='' && $_GET['m']=='' && $_GET['t']==''){ include('main_index.php'); }
	elseif($_GET['u']!="" && $_GET['s']=='' && $_GET['a']=='' && $_GET['m']=='' && $_GET['t']=='' ){ //echo "2";
		include('main_index.php'); }
	elseif($_GET['u']!="" && $_GET['s']!='' && $_GET['a']=='' ){   include('main_unit.php'); }

	if($_GET['u']=="1" && $_GET['s']!='' && $_GET['a']!='' ){
	//include('main_learn.php');
	if($_GET['a']=='conclusion'){ include('conclusion.php'); }
	if($_GET['a']=='indic'){ include('indic.php'); }
	if($_GET['a']=='goal'){ include('goal.php'); }
	if($_GET['a']=='learning'){ include('learning.php'); }
	if($_GET['a']=='intro'){ include('intro.php'); }
	if($_GET['a']=='cai'){ include('cai.php'); }
	}

	if($_GET['u']=="2" && $_GET['s']!='' && $_GET['a']!='' ){
	//include('main_learn.php');
	if($_GET['a']=='conclusion'){ include('conclusion.php'); }
	if($_GET['a']=='indic'){ include('indic.php'); }
	if($_GET['a']=='goal'){ include('goal.php'); }
	if($_GET['a']=='learning'){ include('learning.php'); }
	if($_GET['a']=='intro'){ include('intro.php'); }
	if($_GET['a']=='cai'){ include('cai.php'); }
	}
} //group ==''

	if($_SESSION['group_hw']=='manager')
	{
		if($_GET['m']=="add_couse"){ include('add_couse.php'); }
	}

	if($_SESSION['group_hw']=='teacher')
	{
    if($_GET['m']=="download"){ include('download.php'); }
    if($_GET['m']=="learnsquare"){ include('learnsquare.php'); }
		if($_GET['m']==''){ include('teacher_index.php'); }
		if($_GET['m']=="student"){ include('student.php'); }
		if($_GET['m']=="test_result"){ include('test_result.php'); }
		if($_GET['m']=="content"){ include('content.php'); }
		if($_GET['m']=="manage_con"){ include('manage_con.php'); }
		if($_GET['m']=="unit"){ include('unit.php'); }
		if($_GET['m']=="menu"){ include('manage_menu.php'); }
		if($_GET['m']=="manage_sub_menu"){ include('manage_sub_menu.php'); }
    	if($_GET['m']=="edit_test"){ include('edit_test.php'); }

		if($_GET['m']=="add_hw"){ include('add_hw.php'); }
		if($_GET['m']=="add_rubric"){ include('add_rubric.php'); }
		if($_GET['m']=="add_rubric_sub"){ include('add_rubric_sub.php'); }
		if($_GET['m']=="teacher_check"){ include('check_score.php'); }
		if($_GET['m']=="teacher_check_hw"){ include('check_score_hw.php'); }
		if($_GET['m']=="teacher_test"){ include('t_test.php'); }
		if($_GET['m']=="teacher_test_sub"){ include('t_test_sub.php'); }
		if($_GET['m']=="teacher_choice"){ include('t_test_sub4.php'); }
		if($_GET['m']=="p_qr"){ include('p_qr.php'); }

		if($_GET['m']=="explan"){ include('explan.php'); }
		if($_GET['m']=="explan_course"){ include('explan_course.php'); }

		if($_GET['a']=='conclusion'){ include('conclusion.php'); }
		if($_GET['a']=='indic'){ include('indic.php'); }
		if($_GET['a']=='goal'){ include('goal.php'); }
		if($_GET['a']=='learning'){ include('learning.php'); }
		if($_GET['a']=='intro'){ include('intro.php'); }
		if($_GET['a']=='cai'){ include('cai.php'); }

	}
		if($_SESSION['group_hw']=='student')
	{
		
		if($_GET['m']=="contact"){ include('contact.php'); }
		if($_GET['sid']=='' && $_GET['m']==''){ include('main_index.php');  }
		if($_GET['m']=="explan_course"){ include('explan_course.php'); }
		if($_GET['m']=="explan"){ include('explan.php'); }
		if($_GET['m']=="download"){ include('download.php'); }
		if($_GET['m']=="learnsquare"){ include('learnsquare.php'); }
    	if($_GET['sid']=='1' && $_GET['type']=='1'){ include('session_index.php');  }
		/*
		if($_GET['m']=="pretest"){ include('pretest.php'); }
		if($_GET['m']=="pretest_u1"){ include('pretest_u1.php'); }
		if($_GET['m']=="pretest_u2"){ include('pretest_u2.php'); }
		if($_GET['m']=="learnsquare"){ include('learnsquare.php'); }
		if($_GET['m']=="download"){ include('download.php'); }
		if($_GET['m']=="posttest"){ include('posttest.php'); }

		if($_GET['m']=="send"){ include('send_hw.php'); }
		if($_GET['m']=="std_check"){ include('std_check_hw.php'); }
		if($_GET['m']=="std_qr"){ include('std_qr_gen.php'); }
		if($_GET['m']=="explan"){ include('explan.php'); }

			if($_GET['u']!="" && $_GET['s']!='' && $_GET['a']!='' ){
	//include('main_learn.php');
				if($_GET['a']=='conclusion'){ include('conclusion.php'); }
				if($_GET['a']=='indic'){ include('indic.php'); }
				if($_GET['a']=='goal'){ include('goal.php'); }
				if($_GET['a']=='learning'){ include('learning.php'); }
				if($_GET['a']=='intro'){ include('intro.php'); }
				if($_GET['a']=='cai'){ include('cai.php'); }
			}
			if($_GET['u']=='' && $_GET['s']=='' && $_GET['a']=='' && $_GET['m']=='')
			{
				include_once('session_index.php');
			}
			 if($_GET['u']=='1' && $_GET['s']=='' && $_GET['a']=='' && $_GET['m']=='' )
			{
				include_once('session_index_u1.php');
			}
			if($_GET['u']=='1' && $_GET['s']!='' && $_GET['a']=='' && $_GET['m']=='' )
		 {
			 include_once('intro.php');
		 }
		 */
     	echo "<div id='main'></div>";
		 	if(isset($_GET['type']) && isset($_GET['link_id']))
			{
				$t = "select * from tb_type where id=  '{$_GET['type']}' ";
				$qt = mysqli_query($link,$t);
				$rst = mysqli_fetch_array($qt);
				//echo "t=".$t."<br />";
				$s = "select * from {$rst['tb_name']} where id = {$_GET['link_id']}";
				//echo $s;

			}
	}


?>
