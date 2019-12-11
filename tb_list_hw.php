<?php
	include('db.php');

?>
<script>
function popup(ID) {
    window.open("edit_detail_hw.php?id=" + ID , "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=10,left=10,width=800,height=600");
}
</script>
<script src='js/tinymce/tinymce.min.js'></script>

 <script>
 tinymce.init({
  selector: '#detail_hw',
     setup: function (editor) {
      
		
    },
  height: 320,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
  
 });
	
 
 
 
 
  </script>
<div >
<h3 class="w3-center w3-text-blue">ตารางรายวิชา</h3>
<table class="w3-table w3-striped w3-bordered w3-hoverable	">
    <tr class="w3-teal">
      <th>#</th>
	 
      <th>ชื่อการบ้าน</th>
	   <th>รายละเอียด</th>
      <th>ห้อง</th>
	  <th>ส่งวันที่</th>
	  <th>สิ้นสุดการส่ง</th>
	  <th>เกณฑ์การวัดผล</th>
	  <th>เครื่องมือ</th>
    </tr> 
	<?php
		$tb_couse ="select *, a.id as hw_id from hw as a inner join tb_couse as b on a.id_couse = b.id 
		inner join rubric as c on a.id_rubric = c.id order by a.id desc";
		$q_couse = mysqli_query($link,$tb_couse);
		//echo $tb_couse;
		$i =1;
		while($row_couse = mysqli_fetch_array($q_couse)){
	
	?>
	
	
	<tr>
	<td><?php echo $i; ?><?php echo $row_couse['hw_id']; ?></td>
	
	<td><?php echo $row_couse['hw_name']; ?></td>
	<td><a onclick="popup('<?php echo $row_couse['hw_id']; ?>' )" class="w3-btn w3-blue">รายละเอียด </a></td>
	
	<td><?php echo $row_couse['room']; ?></td>
	<td><?php echo $row_couse['start_date']; ?></td>
	<td><?php echo $row_couse['end_date']; ?></td>
	<td><?php echo $row_couse['rubric_name']; ?></td>  
	<td>
	<button id="btn_edit_couse" class="w3-btn w3-orange w3-small" 
	onclick="edit_couse('<?php echo $row_couse['hw_id']; ?>','<?php echo $row_couse['id_couse']; ?>','<?php echo $row_couse['hw_name']; ?>',
	'<?php echo $row_couse['detail']; ?>','<?php echo $row_couse['room']; ?>','<?php echo $row_couse['score']; ?>',
	'<?php echo $row_couse['id_rubric']; ?>','<?php echo $row_couse['start_date']; ?>','<?php echo $row_couse['end_date']; ?>');">แก้ไข</button>
	<button id="btn_del_couse" onclick="del_couse('<?php echo $row_couse['hw_id']; ?>');" class="w3-btn w3-red w3-small">ลบ</button>
	</td>
	</tr> 
		<?php $i++; } ?>
		
		<br><br>
		</div>