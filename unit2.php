<?php include('db.php'); ?>
<?php
$unit_arr = array();
  $c = "select * from tb_unit order by order_id";
  $qc = mysqli_query($link,$c);
  while( $rs =mysqli_fetch_array($qc))
  {
    array_push($unit_arr,$rs);
  }
?>
<div class="w3-container ">
  <p>
  <button class="w3-button w3-blue" onclick="document.getElementById('id01').style.display='block'">
    <i class="fa fa-plus"></i> เพิ่มหน่วย</button>
</p>



  <table class="w3-table w3-bordered w3-striped">
    <tr class="w3-teal w3-round">
      <th>
        ลำดับ
      </th>
      <th>
        หน่วย
      </th>
      <th>
        แก้ไข
      </th>
      <th>
        ลบ
      </th>
      <th>
        จัดการเนื้อหา
      </th>


    </tr>
    <?php
      foreach( $unit_arr as $rs){

     ?>
    <tr>
      <td>
        <?php echo $rs['order_id']; ?>
      </td>
      <td>
        <?php echo $rs['unit_name']; ?>
      </td>
      <td>
        <?php
        $edit = "'".$rs['id']."','".$rs['unit_name']."','".$rs['order_id']."'";
         ?>
      <button class="w3-button w3-orange" onclick="edit_unit(<?php echo $edit; ?>)"><i class="fa fa-edit"></i></button>
      </td>
      <td>
        <button class="w3-button w3-red" onclick="del_unit('<?php echo $rs['id']; ?>')"><i class="fa fa-trash"></i></button>
      </td>
      <td>
        <a href="index.php?m=manage_con&id=<?php echo $rs['id']; ?>"
          class="w3-button w3-blue" onclick="manage_unit('<?php echo $rs['id']; ?>')">
          <i class="fas fa-tools"></i></a>
      </td>
    </tr>
  <?php } ?>
  </table>
</div>
<br />
