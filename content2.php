<?php include('db.php'); ?>
<?php
$unit_arr = array();
  $c = "select * from tb_content order by topic asc";
  $qc = mysqli_query($link,$c);
  while( $rs =mysqli_fetch_array($qc))
  {
    array_push($unit_arr,$rs);
  }
?>
<div class="w3-container ">
<script>
  function show_content(ID){
    document.getElementById('id01').style.display='block';
      var content = $('#data_content'+ID).text();
      $('#show_content').html(content);
  }
</script>



  <table class="w3-table w3-bordered w3-striped">
    <tr class="w3-teal w3-round">
      <th>
        ลำดับ
      </th>
      <th>
        หัวเรื่อง
      </th>
      <th>
        ดูตัวอย่าง
      </th>
      <th>
        แก้ไข
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
        <?php echo $i; ?>
      </td>
      <td>
        <h4><b class="w3-text-gray"><?php echo $rs['topic']; ?></b></h4>
      </td>
      <td>
        <button onclick="show_content(<?php echo $rs['id']; ?>)" class="w3-button w3-teal"><i class="fa fa-book"></i></button>
      </td>
      <td>
        <?php

         ?>
            <textarea type="hidden" id="data_content<?php echo $rs['id']; ?>"  style="display:none;"><?php echo $rs['content'];?></textarea>

      <button class="w3-button w3-orange" onclick="edit_content('<?php echo $rs['id']; ?>','<?php echo $rs['topic']; ?>')">
        <i class="fa fa-edit"></i></button>
      </td>
      <td>
          <button onclick="del_content(<?php echo $rs['id']; ?>)" class="w3-button w3-red"><i class="fa fa-trash"></i></button>
      </td>

    </tr>
  <?php $i++; } ?>
  </table>
</div>
<br />
<!-- The Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <p>ตัวอย่างเนื้อหา</p>
      <div class="w3-container" id="show_content" style="overflow: scroll;">

      </div>
    </div>
  </div>
</div>
