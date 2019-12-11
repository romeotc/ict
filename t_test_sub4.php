<?php 
	include('db.php');
	$s ="select * from  test_sub where id = '".$_GET['id']."' ";
	$q = mysqli_query($link,$s);
	$rs = mysqli_fetch_array($q);
	//echo $s;
?>
<div class="w3-card w3-light-gray">
<header class="w3-row w3-teal w3-animate-top" style="max-width:100%;" >
	<center><h4>โจทย์  </h4>
	</header>
<div class="w3-border w3-margin"><?php 
					

echo $rs['test_sub_name']; ?></div>
</div>
<?php for($i=1;$i<=4;$i++){ ?>
	<div class="w3-card w3-light-gray">
	<header class="w3-row w3-blue w3-animate-top" style="max-width:100%;" >
	<center><h4>ตัวเลือกที่  <?php echo $i; ?></h4>
	</header>
	<input type="hidden" id="order<?php echo $i; ?>" class="w3-input w3-border " value="<?php echo $i; ?>">
	<div class="w3-margin">
	<textarea class="w3-input w3-border w3-margin" id="choice_name<?php echo $i; ?>" ></textarea>
	<p>
	<label class="w3-label w3-text-teal w3-large"><b>คะแนน</b></label>
	<input type="text" id="score<?php echo $i; ?>" class="w3-input w3-border ">
	
	</div>
	</div>
	<p>
	<?php } ?>
	