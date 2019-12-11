

<script>
var a = 0;
var answer =0;
$(document).ready(function(){
	$('#form_score').hide();
	$('#btn_answer').hide();
	
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
<?php include('db.php');  ?>
<div class="w3-container w3-yellow w3-center">

  <h3><a href="index.php?m=teacher_check" class="w3-btn w3-orange w3-left w3-large">กลับ</a>ชื่อการบ้าน 
  <?php 
	$hw = "select *, a.id as hw_id from hw as a inner join tb_couse as b on a.id_couse = b.id where a.id = '".$_GET['hw_id']."' ";
	//echo $hw;
	$q_hw = mysqli_query($link, $hw);
	$rs_hw = mysqli_fetch_array($q_hw);
	$level = $rs_hw['present'];
  echo $_GET['hw_id']." ".$rs_hw['hw_name']." ห้อง ".$rs_hw['level']."/".$rs_hw['room'] ; 
  
  ?>
  <div id="level" value="<?php echo $rs_hw['present']; ?>"></div>
  <div id="year_in" value="<?php echo $year_in; ?>"></div>

  <div id="room" value="<?php echo $rs_hw['room']; ?>"><?php //echo $rs_hw['room']; ?></div>
  </h3>
	
  
</div>

<div id="top"></div>
<div id="form_score" style="display:none;">
<h3><center><div id="name">แบบบันทึกคะแนน </div><div id="std_id"></div></h3>
	<?php 
	$row = "select count(*) from  rubric as b inner join hw as c on b.id = c.id_rubric inner join rubric_sub as a on a.id_rubric = b.id 
	where c.id = '".$_GET['hw_id']."'";
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
		where c.id = '".$_GET['hw_id']."'";
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
			
			if(isset($_GET['std_id'])){
			$chk_radio = " select * from hw_score where student_id = '".$_GET['std_id']."' 
			and id_rubric_sub = '".$row_couse['id_sub']."' and id_hw = '".$_GET['hw_id']."'  ";
			$q_radio = mysqli_query($link,$chk_radio);
			$rs_radio = mysqli_fetch_array($q_radio);
			}
			
			
			?>
			
			<td class="w3-border-left">
			<input class="w3-radio" type="radio" name="radio<?php echo $k; ?>" 
			value="<?php echo $r_q['quality']; if($r_q['quality']==$rs_radio['quality_score']){ echo "checked"; } ?>" >
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
		<div id="total" class="w3-center w3-large">คะแนนรวม</div><p>
		<center><button id="btn_answer" class="w3-btn w3-green">บันทึก</button> <button id="btn_close" class="w3-btn w3-red">ปิด</button> 
		<button id="btn_clear" class="w3-btn w3-yellow">ล้าง</button>
	</div> <!-- close form -->

<div id="show_table_data"></div>