


<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell " style="text-shadow:1px 1px 0 #444">
<h3>เนื้อหาบทเรียน<b class="w3-text-white">  บทที่ <?php echo $_GET['u']; ?>
<?php if(isset($_GET['edit'])=='1'){ ?>
  <a class="w3-btn w3-red" href="index.php?u=<?php echo $_GET['u']; ?>&t=<?php echo $name; ?>">     ยกเลิก</a>
  <a id="save_edit" class="w3-btn w3-blue">บันทึก</a>
<?php }else{ 
		if($_SESSION["group_hw"] == "teacher"){
?>
  <a class="w3-btn w3-teal" href="index.php?u=<?php echo $_GET['u']; ?>&t=<?php echo $name; ?>&edit=1">     แก้ไข</a>
		<?php } } ?>
</h3>
</div>

</header>
<div id="show_text" class="w3-padding-16 w3-margin">
<p><iframe src="http://www.kruimron.com/ict/unit1/index.html" width="100%" height="700" frameborder="0" marginwidth="0" marginheight="0">กำลังโหลด...</iframe></p>

</div>