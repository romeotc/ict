

<script src='js/tinymce/tinymce.min.js'></script>

 <script>
 tinymce.init({
  selector: 'textarea',
     setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
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
  $('document').ready(function(){
		$('#save_edit').click(function(){
			//text = $('textarea').val();
			//alert(text);
			var result = confirm("ยืนยันบันทึกข้อมูลที่แก้ไข?");
			if (result) {
			$.ajax({
			method: "POST",
			url: "conclusion2.php",
			data: {
				mode: "save",
				u : $('#intro_u').val(),
				s : $('#intro_s').val(),
				a : $('#intro_a').val(),
				text : $('textarea').val()
				}
			})
			.done(function(data) {
			$('#status_save').html(data);
			});
		}





	});
	});



  </script>

<?php include('db.php');


session_start();

$u = $_GET['u'];
$s = $_GET['s'];
$a = $_GET['a'];
$name = $u."-".$s."-".$a;
?>

<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3><?php $p = intval($_GET['u'].$_GET['s']); echo $sub[$p]."  "; ?>
<?php if(isset($_GET['edit'])=='1'){ ?>
  <a class="w3-btn w3-red" href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=<?php echo $_GET['a'];?>">     ยกเลิก</a>
  <a id="save_edit" class="w3-btn w3-blue">บันทึก</a>
<?php }else{
		if($_SESSION["group_hw"] == "teacher"){
?>
  <a class="w3-btn w3-teal" href="index.php?u=<?php echo $_GET['u']; ?>&s=<?php echo $_GET['s'];?>&a=<?php echo $_GET['a'];?>&edit=1">     แก้ไข</a>
		<?php } } ?>
</h3>
</div>

</header>
<div id="status_save"></div>

<?php
$s = "select * from tb_intro where name = '".$name."' ";
$q = mysqli_query($link,$s);
$rs = mysqli_fetch_array($q);

if($_SESSION["group_hw"] == "teacher"){

?>
 <p>

<?php
}
?>
<div id="show_text" class="my_text">

<?php
if($_GET['edit']=='1'){ ?>
<input id="intro_u" value="<?php echo $_GET['u']; ?>" type="hidden">

<input id="intro_s" value="<?php echo $_GET['s']; ?>" type="hidden">
<input id="intro_a" value="<?php echo $_GET['a']; ?>" type="hidden">

<textarea id="intro_text" ><?php echo $rs['text']; ?></textarea>


<?php
}else{ ?>

<div class="w3-margin" style="font-family: Maitree, serif;">
<?php echo $rs['text']; } ?>
</div>
</div>


<!-- Your embedded comments code -->
<div class="fb-comment-embed" data-href="http://ict.kruimron.com" data-width="560" data-include-parent="true">ff</div>
