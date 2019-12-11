<?php include('db.php'); ?>
<option value="0">
  เลือกนักเรียน
</option>
<?php
$y = 60;
if($_REQUEST['level']>=3){$class= 4;}else{ $class=1; }


$year_in = ($y - $_REQUEST['level']) + $class;
  $s = "select * from tb_student59 where year_in = {$year_in} and class = {$class} and room = {$_REQUEST['room']} ";
  $q = mysqli_query($link,$s);
  echo $s;
  while( $rs = mysqli_fetch_array($q))
  { ?>
    <option value="<?php echo $rs['student_id'];?>"
      <?php if($rs['student_id']==$_POST['student_id']){ echo "selected"; } ?>
      ><?php echo $rs['ordinal']."-".$rs['student_id']." ".$rs['s_firstname']." ".$rs['s_lastname']; ?></option>
  <?php }

 ?>
