<div>
<div class="w3-container w3-teal">
  <h3>แบบฟอร์มส่งงานรายวิชาเทคโนโลยีสารสนเทศ</h3>
</div>

<form class="w3-container">
<br>
	<label class="w3-label w3-text-teal"><b>เลือกวิชา</b></label>
	<select class="w3-select w3-border " name="option">
	<option value="" disabled selected>เลือกการบ้าน</option>
	<?php $couse = "select * from tb_couse";
			$q_couse = mysqli_query($link,$couse);
			while($row_couse = mysqli_fetch_array($q_couse)){
			?>
  <option value="<?php echo $row_couse['id']; ?>" ><?php echo $row_couse['couse_id']." ".$row_couse['couse_name']; ?></option>

			<?php } ?>
</select>
	<p>
	<label class="w3-label w3-text-teal"><b>เลือกการบ้าน</b></label>
	<select class="w3-select w3-border " name="option">
  <option value="" disabled selected>เลือกการบ้าน</option>
  <option value="1">ส่งโครงงาน</option>
  <option value="2">ส่งงานแก้คะแนนสอบกลางภาค</option>
  <option value="3">ส่ง URL Wordpress</option>
</select>
	<p>
  <label class="w3-label w3-text-teal"><b>ชื่อ-นามสกุล</b></label>
  <input class="w3-input w3-border " type="text">
	<p>
  <label class="w3-label w3-text-teal"><b>ห้อง</b></label>
  <select class="w3-select w3-border " name="option">
  <option value="" disabled selected>เลือกห้อง</option>
  <?php for($i=1;$i<=11;$i++){  ?>
  <option value="<?php echo $i; ?>"><?php echo "ห้อง ม.4/".$i; ?></option>
  <?php }?>
</select>
<p>
	 <label class="w3-label w3-text-teal"><b>เลขที่</b></label>
  <input class="w3-input w3-border " type="text">
	<p>
	
	
	<input type="file" name="filUpload">
	

	<p>
  <button class="w3-btn w3-blue-grey">ส่งงาน</button>
</form>

</div>