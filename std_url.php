<?php include('db.php'); ?>
<script src='js/tinymce/tinymce.min.js'></script>

 <script>
 tinymce.init({
  selector: 'textarea',
     setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    },
  height: 100,
  theme: 'modern',
  
 
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
<header class="w3-row w3-blue w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-indigo w3-cell">
<p>
</div>
<div class="w3-container  w3-blue w3-cell"><h3>เว็บสะสมผลงานนักเรียน

</h3>
</div>

</header><center>
<h3>ตารางข้อมูลเว็บไซต์สะสมผลงานนักเรียน ปีการศึกษา 25<?php echo $y; ?></h3>
<table class="w3-table" style="table-layout: fixed; width: 100%">
<thead class="w3-indigo"><tr>
<th>#</th><th>เลขที่</th><th>รหัส</th><th>ชื่อ-สกุล</th><th>ชั้น/ห้อง</th><th style="word-wrap: break-word">URL</th></tr></thead>



<?php
	$i =1;
	$s = "select * from tb_student59 order by room asc, ordinal asc";
	$q = mysqli_query($link,$s);
	while($rs = mysqli_fetch_array($q)){
	?>
	<tr <?php if($i%2==0){?> class="w3-pale-blue" <?php } ?>>
	<td><?php echo $i; ?> </td>
	<td><?php echo $rs['ordinal']; ?> </td>
	<td><?php echo $rs['student_id']; ?> </td>
	<td><?php echo $rs['s_firstname']." ".$rs['s_lastname']; ?> </td>
	<td><?php echo $rs['room']; ?> </td>
	<td style="word-wrap: break-word"><?php 
	$hw = "select * from send_hw where student_id = '".$rs['student_id']."' and id_hw = '23' ";
	$qhw = mysqli_query($link,$hw);
	$rs_hw = mysqli_fetch_array($qhw);
	
			//echo $rs_hw['comment']; 
	//echo urldecode($rs_hw['comment']);
	$url = $rs_hw['comment'];
	$url=trim($url); 



	  
  $url = preg_replace("/<div>(.*?)<\/div>/", "$1", $url);
  $url=str_ireplace("%20","-",$url);
	echo $url;
	 
     ?>              
	 </td>
	
	<tr>	
<?php $i++;	}  ?>
</table>
<?php

// Include the class definition file.



?>
