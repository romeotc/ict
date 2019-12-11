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
		url: "t_test_sub2.php",
		data:
		{
			mode: "add_test_choice",
			id_sub : $('#id_sub').val(),
			choice_name : $('#choice_name').val(),
			score : $('#score').val()


		}
		})
		.done(function(data) {
			$('#add_couse_status').html(data);
			$('#test_choice').val("");

			$.ajax({
			method: "POST",
			url: "t_test_sub3.php",
			data: { mode: "list",
					id : $('#id_test').val()
			}
			})
			.done(function(data) {
			$('#table_couse').html(data);
			});
		});




	});
});
	function add_test_choice(name,ID){
		$('#form_rubric_quality').slideDown();
		var header = " แบบบันทึกรายละเอียดการวัด หัวข้อ " + name;
		//alert(header);
			$('#header_rubric_quality').html(header);
			$('#id_sub').val(ID);


	}


</script>
<div >

	<div id="form_rubric_quality" >
	<div class="w3-card-4">

<header id="header_rubric_quality" class="w3-container w3-orange w3-large">
  แบบบันทึกตัวเลือก

</header>

<div class="w3-container">
  <p><label class="w3-label w3-text-teal"><b>รายละเอียดตัวเลือก</b></label>
  <input class="w3-input w3-border " id="id_sub" type="text" ><p>
	<input class="w3-input w3-border " id="choice_name" type="text" ><p>
	<label class="w3-label w3-text-teal"><b>น้ำหนักคะแนน</b></label>

	<input class="w3-input w3-border " id="score" type="text" ></p>
</div>

<footer class="w3-container w3-white">
 	<button id="save_rubric_quality" class="w3-btn w3-blue">บันทึก</button>
	<button id="btn_close_form_rubric_quality" class="w3-btn w3-red">ปิด</button>
	<p>
</footer>

</div></div>


	<?php
	$s = "SELECT count(*) FROM rubric_sub as a inner join rubric as b
	on a.id_rubric = b.id inner join rubric_quality as c on a.id = c.id_rubric_sub
	where b.id = '".$_POST['id']."'
	group by id_rubric_sub order by count(*) desc limit 1";
	$q = mysqli_query($link,$s);
	$rs = mysqli_fetch_array($q);
	// echo $rs['count(*)'];
	?>
<table class="w3-table-all  w3-striped w3-bordered w3-centered">
    <tr class="w3-teal">
      <th class="w3-border">#</th>
      <th class="w3-border">คำถาม</th>
			<th class="w3-border">คำตอบ</th>
      <th class="w3-border">คะแนน</th>

			<th class="w3-border">แก้ไข</th>
			<th class="w3-border">ลบ</th>


    </tr>
	<?php
		$tb_couse ="select * from test_sub where id_test = '".$_POST['id']."' order by id asc";
		$q_couse = mysqli_query($link,$tb_couse);
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){

	?>
	<tr>
	<td class="w3-border"><?php echo $i; ?></td>
	<td class="w3-border">
		<?php echo $row_couse['test_sub_name'];	?>
	</td>
	<td class="w3-border">
			<span class="w3-badge w3-yellow"><?php echo $row_couse['answer'];	?></span>
	</td>
	<td class="w3-border">
		<span class="w3-badge w3-blue">	<?php echo $row_couse['score'];	?></span>
	</td>

	<td class="w3-border">



	<a
	<?php
	$json =  "'".$row_couse['id']."',";
	$json .= "'".$row_couse['test_sub_name']."',";
	$json .= "'".$row_couse['score']."',";
	$json .= "'".$row_couse['q1']."',";
	$json .= "'".$row_couse['q2']."',";
	$json .= "'".$row_couse['q3']."',";
	$json .= "'".$row_couse['q4']."',";
	$json .= "'".$row_couse['answer']."'";
	?>
	onclick="edit_test(<?php echo $json; ?>);"
	class="w3-button w3-orange"><i class="fa fa-edit"></i></a>
	
	</td>

	<td class="w3-border">
			<button id="btn_del_couse" onclick="del_rubric('<?php echo $row_couse['id']; ?>');" class="w3-btn w3-red ">
				<i class="fa fa-trash"></i>
			</button>
	</td>
	</tr>
		<?php $i++; } ?>


		</div>
		</table>
		<br />
