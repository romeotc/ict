<?php include('db.php');
			$s_std = "select * from tb_facebook where student_id = '".$_GET['std']."' ";
			$q_std = mysqli_query($link,$s_std);
			$rs_std = mysqli_fetch_array($q_std);
			
			?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php 			echo $_GET['std']; 
			echo " ".$rs_std['s_firstname']." ".$rs_std['s_lastname'];
			echo " ห้อง ม.".$rs_std['level2']."/".$rs_std['room'];
			echo " เลขที่  ".$rs_std['ordinal']; ?></title>
		 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
	<script src="./js/jquery-3.1.1.min.js"></script>
	
	  <script src="./js/jquery-ui.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		  <link href="css/w3.css" rel="stylesheet">
		  
		   <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

 html, body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Prompt', serif;
 }


</style>
<script>
var a = 0;
var answer =0;
$(document).ready(function(){
	$('#detail_hw').hide();
	$('#show_detail_hw').click(function(){
		$('#detail_hw').toggle('slow');
		
		
	});
	
	
	
	$(':radio').on('click',function(){
		i1 = 1;
		
		 r = parseInt($('#row').attr('value'));
		end = r+1;
		for(var j =1;j<=r;j++){
			var radio = "#radio" + j ;
			
		}
		//$('#show_row').html(end);
	$(":checked").each(function(){
	$('#btn_total').text("เหลือคำถามอีก " + (r-i1) + "  ข้อ");
	i1++;
	});
	
		q1 = parseInt($('input[name=radio1]:checked').val());
		$('#total1').html(q1);
		if(isNaN(q1)){q1=0; }
		q2 = parseInt($('input[name=radio2]:checked').val());
		$('#total2').html(q2);
		if(isNaN(q2)){q2=0; }
		q3 = parseInt($('input[name=radio3]:checked').val());
		$('#total3').html(q3);
		if(isNaN(q3)){q3=0; }
		q4 = parseInt($('input[name=radio4]:checked').val());
		$('#total4').html(q4);
		if(isNaN(q4)){q4=0; }
		q5 = parseInt($('input[name=radio5]:checked').val());
		$('#total5').html(q5);
		if(isNaN(q5)){q5=0;}
		q6 = parseInt($('input[name=radio6]:checked').val());
		$('#total6').html(q6);
		if(isNaN(q6)){q6=0;}
		a = parseInt(q1+q2+q3+q4+q5+q6);
		var tt = "รวม = " + a +  "   คะแนน";
		$('#total').html(tt);
		//alert(a);
		
	if((end-i1)==0){ $('#btn_answer').text(" ตอบคำถามครบแล้ว  ตรวจสอบความถูกต้องแล้วกดปุ่มบันทึก "); $('#btn_answer').show();
		var tt = "รวม =  " + a +  "  คะแนน";
		$('#btn_total').text("ตรวจครบทุกข้อแล้ว");
		$('#total').html(tt);
		
	}
	});
	
	$('#btn_answer').on('click',function(){
		
				$.ajax({
						method :'POST',
						url : 'check_score_hw5.php',
						data:{
						mode : 't_com',
						id_hw : $('#id_hw').attr('value'),
						std_id : $('#std_id').attr('value'),
						t_com : $('#t_com').val()
						},
						
						})
						.done(function(data) {
							alert(data);
						$('#status_com').html(data);
						//window.location.href = 'index.php?page=regis_learn2';
						});
						
						
						
			
		x1 =1;
		$(":checked").each(function(){
			
            //alert($(this).attr('name') + "-" + $(this).val() + x1);
			x1++;
			
			
        });
		if(x1 < end){ alert(" นักเรียนตอบแบบสอบถามไม่ครบ กรุณาตรวจสอบ!!!"); }else{ 
		q1 = parseInt($('input[name=radio1]:checked').val());
		q2 = parseInt($('input[name=radio2]:checked').val());
		q3 = parseInt($('input[name=radio3]:checked').val());
		q4 = parseInt($('input[name=radio4]:checked').val());
		q5 = parseInt($('input[name=radio5]:checked').val());
		q6 = parseInt($('input[name=radio6]:checked').val());
		//alert($('#std_id').val());
		text = "ยืนยันต้องการส่งคำตอบ กดปุ่ม OK ";
		y = confirm(text)      
			if(y==true)  
			{
				var id_Q1=$('#id_q1').attr('value');
				var id_Q2=$('#id_q2').attr('value');
				var id_Q3=$('#id_q3').attr('value');
				var id_Q4=$('#id_q4').attr('value');
				var id_Q5=$('#id_q5').attr('value');
				var id_Q6=$('#id_q6').attr('value');
			//alert(q1 + q2 + q3 + q4 + q5 + q6);
			//alert($('#row').attr('value'));
			//alert("55" + parseInt($('#id_q1').attr('value')));
			alert($('#std_id').attr('value'));
			$.ajax({
						type :'POST',
						data:{
						Mode : 'add',
						Q1 : q1,
						Q2 : q2,
						Q3 : q3,
						Q4 : q4,
						Q5 : q5,
						Q6 : q6,
						id_hw : $('#id_hw').attr('value'),
						std_id : $('#std_id').attr('value'),
						id_q1 : id_Q1,
						id_q2 : id_Q2,
						id_q3 : id_Q3,
						id_q4 : id_Q4,
						id_q5 : id_Q5,
						id_q6 : id_Q6,
						row : $('#row').attr('value')
						
						},
						url : 'check_score_hw2.php',
						success : function(data){
						//alert(data);
						//alert(parseInt(id_Q1));
						//alert(id_Q2);
						//alert(id_Q3);
						//alert(id_Q4);
						//window.location = 'index.php?m=teacher_check_hw&hw_id=' + $('#id_hw').attr('value');
						}
						
						
						});
						
							
			}
		}
	
	});
	$('#btn_clear').on('click',function(){
		
		$(':checked').each(function(){
		$(this).prop('checked',false);
		$('#btn_answer').text(" ยังตรวจไม่ครบ ");
		
		});
		});
		//แสดงตารางรายชื่อ
		$.ajax({
						type :'POST',
						data:{
						Mode : '',
						level : $('#level').attr('value'),
						year_in : $('#year_in').attr('value'),
						clss : $('#clss').attr('value'),
						room : $('#room').attr('value'),
						id_hw : $('#id_hw').attr('value')
						},
						url : 'list_score_hw.php',
						success : function(data){
						$('#show_table_data').html(data);
						//window.location.href = 'index.php?page=regis_learn2';
						}
						
						
						});
	
});


	
</script>
<?php
	include('db.php');
		$tb_couse ="select * from hw where id = '".$_GET['id']."'";
		$q_couse = mysqli_query($link,$tb_couse);
		$rs = mysqli_fetch_array($q_couse);
		//echo $tb_couse;
	//echo $level;
	echo $_GET['id']."-".$_GET['std'];
?>
<div class="w3-container"> 
<h3 class="w3-center w3-text-blue w3-text-shadow">ชื่อการบ้าน   <?php echo $rs['id'].".".$rs['hw_name']; ?></h3>
<h4 class="w3-center"><?php echo $_SESSION['student_id']; ?> </h4>
<input id="id_hw" value="<?php echo $_GET['id']; ?>" type="hidden">


  
<div id="detail_hw" class="w3-card">

<header class="w3-container w3-light-blue">
  <h4>รายละเอียดการบ้าน</h4>
</header>

<div class="w3-container">
 <div class="w3-padding-16 "><?php echo $rs['detail_hw']; ?></div>
</div>


</div><center>
<button id="show_detail_hw" class="w3-btn w3-blue">ดูรายละเอียดการบ้าน</button>

<br><br>

<?php 
			$chk_file ="select * from send_hw where student_id = '".$_GET['std']."' 
			and id_hw = '".$_GET['id']."' ";
			$q_chk = mysqli_query($link,$chk_file);
			$rs_file = mysqli_fetch_array($q_chk);
			?>



<div class="w3-contrainer w3-card  ">
<header class="w3-container w3-orange">
  <h4>คำตอบออนไลน์</h4>
</header>
<div class="w3-contrainer w3-card w3-margin"><?php echo $rs_file['comment']; ?></div>
<br>
</div>

<br>
<header class="w3-container w3-amber w3-card">
  <h4>งานที่นักเรียนอัพโหลดไฟล์</h4>
</header>
	<div id="from_upload" class="w3-border w3-container w3-padding-16"><center>
		
	
		<?php 
		$path = 'hw_file/'.$_GET['id']."_".$_GET['std']."";
	
		//echo $path;
		echo file_exists("hw_file/29_28803.*");
		if(file_exists($path)){ ?>
	
			
			<a target="_blank" href="hw_file/<?php echo $rs_file['filename']; ?>" 
			class="w3-btn w3-green w3-small" >เปิดไฟล์แนบ</a>
		
			<?php echo "ส่งวันที่  ".$rs_file['datetime']; ?>
		<?php }else{ echo "";} ?>
			
	</div>
		<br><br>
		
		
		
	<div class="w3-contrainer w3-card" >
	<header class="w3-container w3-teal">
  <h3><center><div id="name">แบบบันทึกคะแนน </div><div id="std_id" value="<?php echo $_GET['std']; ?>">
<?php 
			
			echo $_GET['std']; 
			echo " ".$rs_std['s_firstname']." ".$rs_std['s_lastname'];
			echo " ห้อง ม.".$rs_std['level2']."/".$rs_std['room'];
			echo " เลขที่  ".$rs_std['ordinal'];

 ?></div></h3>
</header>

<!--- แสดงวันที่ตรวจให้คะแนน -->
<h4 ><center>
<?php  $chk_radio = " select * from hw_score where student_id = '".$_GET['std']."' 
			and id_hw = '".$_GET['id']."'  ";
			//echo $chk_radio;
			$q_radio = mysqli_query($link,$chk_radio);
			$rs_radio = mysqli_fetch_array($q_radio);
			echo $rs_radio['datetime']; ?>
			</h4>
	<?php 
	$row = "select count(*) from  rubric as b inner join hw as c on b.id = c.id_rubric inner join rubric_sub as a on a.id_rubric = b.id 
	where c.id = '".$_GET['id']."'";
	$q_row = mysqli_query($link,$row);
	$rs_row = mysqli_fetch_array($q_row);
	
	?>
	<div id="show_row"></div>
	<div id="row" value="<?php echo $rs_row['count(*)']; ?>"><?php //echo "จำนวนข้อ ".$rs_row['count(*)']; ?></div>
	<?php 
	//echo $row;
	$s = "SELECT count(*) FROM rubric_sub as a inner join rubric as b 
	on a.id_rubric = b.id inner join rubric_quality as c on a.id = c.id_rubric_sub 
	where b.id = '".$_GET['id']."'
	group by id_rubric_sub order by count(*) desc limit 1";
	$q = mysqli_query($link,$s);
	$rs = mysqli_fetch_array($q);
	 //echo $rs['count(*)']; 
	?>
<table class="w3-table w3-striped w3-bordered w3-hoverable	">
    <tr class="w3-blue"><!-- หัวตาราง -->
      <th>#</th>
      <th>หัวข้อการวัด</th>
      <th colspan="<?php echo $rs_row['count(*)']; ?>" class="w3-center">รายละเอียดการวัด(คะแนน)</th>
	 <th></th>
	  
    </tr>
	<?php
		$tb_couse ="select *, a.id as id_sub, c.id as id_hw from rubric_sub as a inner join rubric as b  on a.id_rubric = b.id inner join hw as c on b.id = c.id_rubric
		where c.id = '".$_GET['id']."'";
		//echo $tb_couse;
		$q_couse = mysqli_query($link,$tb_couse);
		$i =1;
		$k = 1;
		while($row_couse = mysqli_fetch_array($q_couse)){
	
	?>
	<tr>  <!-- หัวข้อ -->
	<div id="id_hw" value="<?php echo $row_couse['id_hw'];?>"><?php //echo "การบ้าน".$row_couse['id_hw'];?></div>
	<td><?php echo $k; ?> 
	<?php //เงื่อนไขเช็คการกดปุ่มเดิม
	
	
	?>	
	<div id="<?php echo "id_q".$k; ?>" value="<?php echo $row_couse['id_sub'];?>" ><?php echo $row_couse['id_sub'];?></div>
	</td>
	<td><?php echo $row_couse['id']; ?>
	<!--  แสดงรายละเอียด -->
	<?php echo $row_couse['rubric_sub_name']; ?><div class="w3-text-red" id="total<?php echo $k; ?>"></div></td>
	<?php 
			$quality = "select * from rubric_quality where id_rubric_sub = '".$row_couse['id_sub']."' order by quality asc";
			$q_quality = mysqli_query($link,$quality);
			$i=1;
			while($r_q = mysqli_fetch_array($q_quality)){ $i++; 
			
			
			$chk_radio = " select * from hw_score where student_id = '".$_GET['std']."' 
			and id_rubric_sub = '".$row_couse['id_sub']."' and id_hw = '".$_GET['id']."'  ";
			//echo $chk_radio;
			$q_radio = mysqli_query($link,$chk_radio);
			$rs_radio = mysqli_fetch_array($q_radio);
			//echo $rs_radio['quality_score'];
			
			
			
			?>
			
			<td class="w3-border-left">
			<input class="w3-radio" type="radio" name="radio<?php echo $k; ?>" 
			value="<?php echo $r_q['quality']; ?>" 
			<?php if($r_q['quality']==$rs_radio['quality_score']){ 
			echo "checked"; $sum_score = $sum_score + $rs_radio['quality_score']; } ?> >
			<?php echo $r_q['rubric_quality_name']."(".
			$r_q['quality'].")"; ?>
			
			
			</td>
			<?php
			}
			for($j=$i;$j<$rs['count(*)']+1;$j++){ ?> <td>-</td> <?php }
			
			?>
			
	<td>
	
	

	</td>
	</tr> 
		<?php $i++; $k++; } ?>
		
		<br>
		</div>
		</table><p>
		
		<div id="btn_total" class="w3-center w3-large">ข้อ</div><p>
		<div id="total" class="w3-center w3-large">คะแนนรวม : <?php echo $sum_score; ?></div><p>
		<div class="w3-center w3-large" id="status_com"></div>
		<textarea id="t_com" rows="2" cols="50">
		<?php 
		$s3 = "select * from tb_comment where student_id = '".$_GET['std']."' and id_hw = '".$_GET['id']."' ";
		$q3 = $conn->query($s3);
		$rs = $q3->fetch_array();
		echo $rs['t_com'];
		?>
		</textarea>
		
		
		
		<center><button id="btn_answer" class="w3-btn w3-green">บันทึก</button> 
		<button onclick="window.close()" id="btn_close" class="w3-btn w3-red">ปิด</button> 
		<button id="btn_clear" class="w3-btn w3-yellow">ล้าง</button>
		
		<br><br><br>
		
		</div>
	</div> <!-- close form -->
	
	
	
	
	
	
	</div>
	<br><br><br><br><br><br><br><br><br>