<?php
	include('db.php');

?>
<script>
$(document).ready(function(){
	$('#form_rubric_quality').hide();
	$('#btn_close_form_rubric_quality').click(function(){
		$('#form_rubric_quality').slideUp();
	});
	$('#save_rubric_quality').click(function(){
		
		$.ajax({
		method: "POST",
		url: "add_rubric_sub2.php",
		data: 
		{ 
			mode: "add_rubric_quality",
			id_sub : $('#id_sub').val(),
			rubric_quality : $('#rubric_quality').val(),
			quality : $('#quality').val()
			
			
		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			$('#rubric_quality_name').val("");
			
			$.ajax({
			method: "POST",
			url: "tb_list_rubric_sub.php",
			data: { mode: "list",
					id : $('#id_rubric').val()
			}
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});
		
		
	
		
	});
	$('#save_edit_rubric_quality').click(function(){
		
		$.ajax({
		method: "POST",
		url: "add_rubric_sub2.php",
		data: 
		{ 
			mode: "edit_rubric_quality",
			id_sub : $('#id_sub').val(),
			rubric_quality : $('#rubric_quality').val(),
			quality : $('#quality').val()
			
			
		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			$('#rubric_quality_name').val("");
			
			$.ajax({
			method: "POST",
			url: "tb_list_rubric_sub.php",
			data: { mode: "list",
					id : $('#id_rubric').val()
			}
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});
		
		
	
		
	});
});
	function add_rubric_quality(name,ID){
		$('#form_rubric_quality').slideDown();
		var header = " แบบบันทึกรายละเอียดการวัด หัวข้อ " + name;
		//alert(header);
			$('#header_rubric_quality').html(header);
			$('#id_sub').val(ID);
			$('#save_rubric_quality').show();
			$('#save_edit_rubric_quality').hide();
			
			$('#rubric_quality').val("");
			$('#quality').val("");
			
	}

</script>
<div >
<h3 class="w3-center w3-text-blue">ตารางเกณฑ์รูบริค</h3>

	 
	<div id="form_rubric_quality" >
	<div class="w3-card-4">

<header id="header_rubric_quality" class="w3-container w3-orange w3-large">
  แบบบันทึกรายละเอียดการวัด
  
</header>

<div class="w3-container">
  <p><label class="w3-label w3-text-teal"><b>รายละเอียดการวัด</b></label>
  <input class="w3-input w3-border " id="id_sub" type="text" ><p>
	<textarea class="w3-input w3-border " id="rubric_quality" type="text" ></textarea><p>
	<label class="w3-label w3-text-teal"><b>น้ำหนักคะแนน</b></label>
	 
	<input class="w3-input w3-border " id="quality" type="text" ></p>
</div>

<footer class="w3-container w3-white">
 	<button id="save_rubric_quality" class="w3-btn w3-blue">บันทึก</button>
	<button id="save_edit_rubric_quality" class="w3-btn w3-green">บันทึกแก้ไข</button>
	<button id="btn_close_form_rubric_quality" class="w3-btn w3-red">ปิด</button>
	<p>
</footer>

</div></div>
	
	<br>
	<?php 
	$s = "SELECT count(*) FROM rubric_sub as a inner join rubric as b 
	on a.id_rubric = b.id inner join rubric_quality as c on a.id = c.id_rubric_sub 
	where b.id = '".$_POST['id']."'
	group by id_rubric_sub order by count(*) desc limit 1";
	$q = mysqli_query($link,$s);
	$rs = mysqli_fetch_array($q);
	 echo $rs['count(*)']; 
	?>
<table class="w3-table w3-striped w3-bordered w3-hoverable	">
    <tr class="w3-teal">
      <th>#</th>
      <th>หัวข้อการวัด</th>
      <th colspan="<?php echo $rs['count(*)']; ?>" class="w3-center">รายละเอียดการวัด(คะแนน)</th>
	 <th></th>
	  
    </tr>
	<?php
		$tb_couse ="select * from rubric_sub where id_rubric = '".$_POST['id']."' order by id desc";
		$q_couse = mysqli_query($link,$tb_couse);
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){
	
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row_couse['id']; ?>
	<!--  แสดงรายละเอียด -->
	<?php echo $row_couse['rubric_sub_name']; ?></td>
	<?php 
			$quality = "select * from rubric_quality where id_rubric_sub = '".$row_couse['id']."' order by quality asc";
			$q_quality = mysqli_query($link,$quality);
			$i=1;
			while($r_q = mysqli_fetch_array($q_quality)){ $i++; ?>
			<td class="w3-border-left"><?php echo $r_q['rubric_quality_name']."(".
			$r_q['quality'].")"; ?>
			
			<button onclick="del_rubric_sub('<?php echo $r_q['id']; ?>');" class="w3-btn w3-small w3-red">ลบ2</button>
			<button onclick="edit_rubric_sub('<?php echo $r_q['id']; ?>','<?php echo $r_q['rubric_quality_name'];?>',
			'<?php echo $r_q['quality'];?>');" class="w3-btn w3-small w3-orange">แก้ไข</button>
			</td>
			<?php
			}
			for($j=$i;$j<$rs['count(*)']+1;$j++){ ?> <td>-</td> <?php }
			
			?>
			
	<td>
	
	
	<button class="w3-btn w3-orange w3-small" 
	onclick="add_rubric_quality('<?php echo $row_couse['rubric_sub_name']; ?>','<?php echo $row_couse['id']; ?>');">
	เพิ่มรายละเอียดการวัด</button><p>
	<button id="btn_del_couse" onclick="del_rubric('<?php echo $row_couse['id']; ?>');" class="w3-btn w3-red w3-small">ลบ</button>
	</td>
	</tr> 
		<?php $i++; } ?>
		
		<br>
		</div>
		</table>