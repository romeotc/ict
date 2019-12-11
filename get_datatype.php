<?php
  include('db.php');
  $tid = $_REQUEST['tid'];
  $link_id = $_REQUEST['link_id'];
  $f = "select * from tb_type where id = '{$tid}'";
  //echo $f;
  //echo "<br />";
  $qf = mysqli_query($link,$f);
  $rsf = mysqli_fetch_array($qf);
  if($qf)
  {
      $tb = $rsf['tb_name'];
      //echo "q=".$tb;
    //  echo "<br />";
  }

  if($tid==1)
  {
     echo "เมนูนี้จะแสดงในหน้าแรก";
  }
  elseif($tid==2)
  {
    $name = 'topic';

  }
  elseif($tid==3)
  {
    $name = 'unit_name';

  }
  elseif($tid==4)
  {
    $name = 'test_name';

  }
  elseif($tid==6)
  {
    $name = 'topic';

  }
  $s = "select * from {$tb}";
  if($link_id>0){
    $s = "select * from {$tb} where id = {$link_id} ";
  }
  $q = mysqli_query($link,$s);
  //echo $s;
  if($tid>1){
 ?>
 <select class="w3-select w3-border" id="link_id2" >
   <option value="0">เลือกประเภทเมนู</option>
   <?php

     while($rs = mysqli_fetch_array($q)){ ?>
   <option value="<?php echo $rs['id']; ?>"
     <?php if($link_id>0 && $rs['id']==$link_id){ echo "selected"; }?>

     ><?php echo $rs[$name]; ?></option>
 <?php } ?>
 </select>
<?php } ?>
