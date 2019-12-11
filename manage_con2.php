<?php include('db.php');
$id = isset($_POST['id'])?$_POST['id']:'';
$s = "select * from tb_unit where id = {$id}";
$q = mysqli_query($link,$s);
  $rs = mysqli_fetch_array($q);


 ?>
 <p>
   <a href="index.php?m=unit" class="w3-button w3-orange">
     <i class="fas fa-chevron-circle-left"></i> กลับเมนูหลักเนื้อหา
   </a>
 </p>
<center>
  <h3>ชื่อหน่วย&nbsp;<b><u><?php echo $rs['unit_name']; ?></u></b></h3>
</center>
<div class="w3-container ">
  <center>


  <table class="w3-table-all w3-centered w3-bordered" style="width:90%">
    <tr class="w3-pink">
      <td style="width:30%">
        <input type="hidden" id="data_explan<?php echo $rs['id']; ?>" value="<?php echo $rs['explan'];?>">
       <button class="w3-button w3-orange w3-round" onclick="edit_data('<?php echo $rs['id']; ?>','explan')">
          <i class="fa fa-edit"></i>   สาระสำคัญ</button>
      </td>
      <td style="width:30%">
        <input type="hidden" id="data_indic<?php echo $rs['id']; ?>" value="<?php echo $rs['indic'];?>">
       <button class="w3-button w3-orange w3-round" onclick="edit_data('<?php echo $rs['id']; ?>','indic')">
          <i class="fa fa-edit"></i>   ตัวชี้วัด</button>
      </td>
      <td style="width:30%">
        <input type="hidden" id="data_goal<?php echo $rs['id']; ?>" value="<?php echo $rs['goal'];?>">
       <button class="w3-button w3-orange w3-round" onclick="edit_data('<?php echo $rs['id']; ?>','goal')">
          <i class="fa fa-edit"></i>   สาระการเรียนรู้</button>
      </td>
    </tr>
    <tr>
      <td>
        <?php if($rs['explan']==''){echo "ยังไม่มีข้อมูล"; }else{ echo $rs['explan']; } ?>
      </td>
      <td>
        <?php if($rs['indic']==''){echo "ยังไม่มีข้อมูล"; }else{ echo $rs['indic']; } ?>
      </td>
      <td>
        <?php if($rs['goal']==''){echo "ยังไม่มีข้อมูล"; }else{ echo $rs['goal']; } ?>
      </td>
    </tr>
  </table>
    </center>
  <hr />
</div>
