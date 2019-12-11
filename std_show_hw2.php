<script src='js/tinymce/tinymce.min.js'></script>

 <script>
 tinymce.init({
  selector: '#comment',
     setup: function (editor) {
      
		
    },
  height: 320,
  width: 600,
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
<script>
function save_edit_com(){
	
	var result = confirm("ต้องการบันทึกการแก้ไขข้อมูล?");
	var txt = tinyMCE.activeEditor.getContent()
	// alert(txt);
			if (result) {
			$.ajax({
			method: "POST",
			url: "send_hw2.php",
			data: { 
				mode: "edit_comment",
				id : $('#id_send').val(),
				id_hw : $('#id_hw').val(),
				comment : txt
				}
			})
			.done(function(data) {
			$.ajax({
			method: "POST",
			url: "std_show_hw3.php",
			data: { 
				id_send : $('#id_send').val()
				
				}
			})
			.done(function(data2) {
			$('#date_com').html(data2);
						
			});	
						
			});	
			}
	
	  
}			$('document').ready(function(){
			//alert($('#id_send').val());
						$.ajax({
			method: "POST",
			url: "std_show_hw3.php",
			data: { 
				id_send : $('#id_send').val()
				
				}
			})
			.done(function(data2) {
			$('#date_com').html(data2);
						
			});	
	
	
});
		
</script>
<?php
	include('db.php');
		$tb_couse ="select * from hw where id = '".$_POST['id_hw']."'";
		$q_couse = mysqli_query($link,$tb_couse);
		$rs = mysqli_fetch_array($q_couse);
		//echo $tb_couse;
	//echo $level;
?>

	
	<?php 
			$chk_file ="select * from send_hw where student_id = '".$_SESSION['student_id']."' 
			and id_hw = '".$_POST['id_hw']."' ";
			$q_chk = mysqli_query($link,$chk_file);
			$rs_file = mysqli_fetch_array($q_chk);
			?>
			<input type="hidden" value="<?php echo $rs_file['id']; ?>" id="id_send" >
			<?php
			if ($rs_file['filename']!="") {
			?>
			<a target="_blank" href="hw_file/<?php echo $rs_file['filename']; ?>" 
			class="w3-btn w3-green w3-small" >เปิดไฟล์</a>
			<a class="w3-btn w3-small w3-red" 
			onclick="del_file('<?php echo $rs_file['id']; ?>',
			'<?php echo $rs_file['id_hw']; ?>','<?php echo $rs_file['filename']; ?>');" >ลบ</a>
			<?php echo "ส่งวันที่  ".$rs_file['datetime']; ?>
			<?php
			}else{ ?>
	<form action="send_hw2.php" method="post" enctype="multipart/form-data">
	   <input type="file" name="filename" id="filename">
	<input type="hidden" id="mode" value="send" name="mode">
	<input type="hidden" value="<?php echo $rs['id']; ?>" id="id_hw" name="id_hw">
	<input type="hidden" value="<?php echo $rs_file['id']; ?>" id="id" name="id">
	 <input type="submit" class="w3-btn w3-blue w3-small" value="ส่ง" name="submit">
	</form>
		<?php } ?>
		<br><br>
	<div id="from_comment" class="w3-border w3-container w3-padding-16"><center>
		<h4 class="w3-center">ส่วนพิมพ์คำตอบ</h4>
		<h4 class="w3-center w3-text-red">แก้ไขล่าสุดเมื่อวันที่  :  <div id="date_com"></div> </h4>
	<textarea id="comment" rows="4" cols="50"><?php echo $rs_file['comment']; ?></textarea><p><br>
	  <button onclick="save_edit_com();" id="btn_save_edit" class="w3-btn w3-orange" >บันทึกการแก้ไข</button>
  <button id="btn_close" onclick="window.close();" class="w3-btn w3-red">ปิด</button>
		
	</div>
	