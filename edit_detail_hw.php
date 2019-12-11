<!DOCTYPE html>
<html>
    <head>
        <title>ระบบเช็คชื่อเข้าเรียน</title>
		 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
	<script src="./js/jquery-3.1.1.min.js"></script>
	
	  <script src="./js/jquery-ui.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		  <link href="http://202.143.191.92/hw/css/w3.css" rel="stylesheet">
		  
		   <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

 html, body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Prompt', serif;
 }


</style>
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
<script>
function save_edit_detail(){
	
	var result = confirm("ต้องการบันทึกการแก้ไขข้อมูล?");
	var txt = tinyMCE.activeEditor.getContent()
	alert(txt);
			if (result) {
			$.ajax({
			method: "POST",
			url: "add_hw2.php",
			data: { 
				mode: "edit_detail",
				id : $('#id_hw').val(),
				detail : txt
				}
			})
			.done(function(data) {
			$('#status').html(data);
						
			});	
			}
	
	
}


</script>
<?php include('db.php'); ?>



<?php $s = "select * from hw where id = '".$_GET['id']."' ";
$q =mysqli_query($link,$s);

$rs = mysqli_fetch_array($q);
 ?><center>
 <div id="status"></div>
 <h3><?php echo $rs['hw_name']; ?></h3>
 <input id="id_hw" type="hidden" value="<?php echo $_GET['id']; ?>">
<textarea id="detail_hw"><?php echo $rs['detail_hw']; ?></textarea><p><br>
  <button onclick="save_edit_detail();" id="btn_save_edit" class="w3-btn w3-orange" >บันทึกการแก้ไข</button>
  <button id="btn_close" onclick="window.close();" class="w3-btn w3-red">ปิด</button>