<?php include('db.php'); ?>
<?php

$unit_arr = array();
  $c = "SELECT *,a.id as id FROM tb_menu as a inner join tb_type as b on a.type = b.id  where sid <= 1 order by order_id";
  $qc = mysqli_query($link,$c);
//  echo $c;
  while( $rs =mysqli_fetch_array($qc))
  {
    array_push($unit_arr,$rs);
  }
?>
<div class="w3-container ">
  <p>
  <button class="w3-button w3-blue" id="btn_add" onclick="btn_add();">
    <i class="fa fa-plus"></i> เพิ่มเมนู</button>
</p>
<!--<h4>Level <?php echo $sid; ?></h4> -->


  <table class="w3-table w3-bordered w3-striped">
    <tr class="w3-teal w3-round">
      <th>
        ลำดับ
      </th>
      <th>
        ชื่อเมนู
      </th>
      <th>
        ประเภทเมนู
      </th>
      <th>
        แก้ไขชื่อเมนู
      </th>
      <th>
        ลบ
      </th>



    </tr>
    <?php
    $i = 1;
      foreach( $unit_arr as $rs){

     ?>
    <tr>
      <td>
        <?php echo $rs['order_id']; ?>
      </td>
      <td>
        <?php echo $rs['menu_name']; ?>
        <?php if($rs['type']==3){?>
          <a href="index.php?m=manage_sub_menu&sid=<?php echo $rs['id'];?>" class="w3-button w3-indigo w3-round">
            <i class="fas fa-tools"></i>
          </a>

        <?php } ?>
      </td>
      <td>
        <span class="w3-badge w3-yellow"><?php echo $rs['type_name']; ?></span>

      </td>
      <td>
        <?php

         ?>

      <button class="w3-button w3-orange" onclick="edit_menu('<?php echo $rs['id']; ?>','<?php echo $rs['menu_name']; ?>','<?php echo $rs['type']; ?>','<?php echo $rs['link_id']; ?>','<?php echo $rs['order_id']; ?>')"><i class="fa fa-edit"></i></button>
      </td>
      <td>
        <button class="w3-button w3-red" onclick="del_menu('<?php echo $rs['id']; ?>')"><i class="fa fa-trash"></i></button>
      </td>

    </tr>
  <?php $i++; } ?>
  </table>
</div>
<br />
