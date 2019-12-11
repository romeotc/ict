<?php include('db.php'); ?>
<?php $link_id = $_POST['link_id']; ?>
<?php
$s = "select * from tb_unit where id = {$link_id}";
//echo $s;
$q = mysqli_query($link,$s);
$rs = mysqli_fetch_array($q);
?>

<header class="w3-row w3-orange w3-animate-top" style="max-width:100%;" >
<div class=" w3-container  w3-deep-orange w3-cell">
<p>
</div>
<div class="w3-container  w3-orange w3-cell"><h3><i class='<?php echo $icon; ?>'></i>&nbsp;<b>บทเรียน <?php echo $rs['unit_name']; ?>
</h3>
</div>

</header>

<div class="w3-container w3-light-gray">


    <?php if($link_id!='' && $_POST['m']==''){

    ?>
    <h4><b>ตัวชี้วัด</b></h4>
    <div class="w3-container w3-border w3-round w3-white">
      <?php if($rs['indic']==''){ echo ""; }else{ echo $rs['indic']; }?>
    </div>
    <br />
    <h4><b>สาระสำคัญ</b></h4>
    <div class="w3-container w3-border w3-round w3-white">
      <?php if($rs['explan']==''){ echo ""; }else{ echo $rs['explan']; }?>
    </div>
    <br />
    <h4><b>สาระการเรียนรู้</b></h4>
    <div class="w3-container w3-border w3-round w3-white">
      <?php if($rs['goal']==''){ echo ""; }else{ echo $rs['goal']; }?>
    </div>
    <br />




</div>

  <?php } ?>
